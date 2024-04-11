<?php
namespace App\Services;

use App\Core\Database\Database;
use App\Models\JsonResponse;
use App\Models\TrangThaiHoaDon;

class OrderService
{

    public static function startCheckout($data)
    {
        $tempId = uid();
        $DanhSachVe = $data['DanhSachVe'];
        $SeatIds = array_map(function ($item) {
            return $item['MaGhe'];
        }, $DanhSachVe);
        if (TicketService::isAnySeatsLocked($SeatIds, $data['MaXuatChieu'])) {
            return JsonResponse::error("Có vé đã bị đặt trong lúc bạn chọn, vui lòng chọn lại", 409);
        }

        $lockToTime = TicketService::lockSeats($SeatIds, $data['MaXuatChieu']);
        // tiền vé = tiền xuất chiếu + tiền loại ghế + tiền loại vé
        // tiền combo = tiền combo * số lượng
        // tiền thức ăn = tiền thức ăn * số lượng
        // tổng tiền = tiền vé + tiền combo + tiền thức ăn
        // tính tiền vé 
        foreach ($DanhSachVe as $ve) {
            Database::execute("UPDATE Ve SET MaLoaiVe = ?, MaHoaDon = ?
             WHERE MaGhe = ? AND MaSuatChieu = ?",
                [$ve['MaLoaiVe'], $tempId, $ve['MaGhe'], $data['MaXuatChieu']]
            );
        }
        $SeatIdsIn = implode(",", $SeatIds);
        $sql = "SELECT 
        LoaiVe.GiaVe+LoaiGhe.GiaVe+SuatChieu.GiaVe as GiaVe
         FROM Ve JOIN LoaiVe ON Ve.MaLoaiVe = LoaiVe.MaLoaiVe 
        JOIN Ghe ON Ve.MaGhe = Ghe.MaGhe 
        JOIN LoaiGhe ON Ghe.MaLoaiGhe = LoaiGhe.MaLoaiGhe
        JOIN SuatChieu ON Ve.MaSuatChieu = SuatChieu.MaXuatChieu
        WHERE Ve.MaSuatChieu = ? and Ve.MaGhe IN ($SeatIdsIn)";
        $ticketPrice = Database::query($sql, [$data['MaXuatChieu']]);

        $ticketPrice = array_reduce($ticketPrice, function ($acc, $item) {
            return $acc + $item['GiaVe'];
        }, 0);

        $comboPrice = ComboService::calCombosPrice($data['Combos']);
        $foodPrice = ComboService::calFoodsPrice($data['ThucPhams'] ?? []);
        $totalPrice = $ticketPrice + $comboPrice + $foodPrice;
        // set session 
        $bookingData = [
            'MaXuatChieu' => $data['MaXuatChieu'],
            'TongTien' => $totalPrice,
            "DanhSachVe" => $SeatIds,
            "ThucPhams" => $data['ThucPhams'],
            "Combos" => $data['Combos'],
            "lockTo" => $lockToTime,
            'id' => $tempId
        ];
        $_SESSION['bookingData'] = $bookingData;

        return JsonResponse::ok($bookingData);
    }

    public static function saveOrder($data)
    {
        $uid = $data['id'];
        // check if order exists
        $order = Database::queryOne("SELECT * FROM HoaDon WHERE MaHoaDon = ?", [$uid]);
        if ($order) {
            return $uid;
        }
        $TongTien = $data['TongTien'];
        $NgayGioThanhToan = date('Y-m-d H:i:s');
        $Thue = 0;
        $PhuongThucThanhToan = $data['payment_method'];
        $MaNguoiDung = null;
        if (isset($_SESSION['user'])) {
            $MaNguoiDung = $_SESSION['user']['MaNguoiDung'];
        }
        $MaKhuyenMai = null;
        if (isset($data['MaKhuyenMai'])) {
            $MaKhuyenMai = $data['MaKhuyenMai'];
        }
        $TrangThai = TrangThaiHoaDon::ThanhCong->value;
        Database::insert("HoaDon", [
            'MaHoaDon' => $uid,
            'TongTien' => $TongTien,
            'NgayGioThanhToan' => $NgayGioThanhToan,
            'Thue' => $Thue,
            'PhuongThucThanhToan' => $PhuongThucThanhToan,
            'MaNguoiDung' => $MaNguoiDung,
            'MaKhuyenMai' => $MaKhuyenMai,
            'TrangThai' => $TrangThai
        ]);
        $danhSachVe = $data['DanhSachVe'];
        foreach ($danhSachVe as $ve) {
            Database::execute("UPDATE Ve SET MaHoaDon = ? WHERE MaGhe = ? AND MaSuatChieu = ?", [$uid, $ve['MaGhe'], $data['MaXuatChieu']]);
        }
        $combos = $data['Combos'];
        foreach ($combos as $combo) {
            Database::insert("CT_HoaDon_Combo", [
                'MaHoaDon' => $uid,
                'MaCombo' => $combo['MaCombo'],
                'SoLuong' => $combo['SoLuong']
            ]);
        }
        $thucPhams = $data['ThucPhams'];
        foreach ($thucPhams as $thucPham) {
            Database::insert("CT_HoaDon_ThucPham", [
                'MaHoaDon' => $uid,
                'MaThucPham' => $thucPham['MaThucPham'],
                'SoLuong' => $thucPham['SoLuong']
            ]);
        }
        return $uid;
    }
}