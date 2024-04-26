<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Dtos\JsonDataErrorRespose;
use App\Dtos\JsonResponse;
use App\Dtos\TrangThaiKhuyenMai;

class PromotionService
{

    public static function getPromotionByCode($code)
    {
        $query = "SELECT * FROM KhuyenMai WHERE MaKhuyenMai = ?";
        $promotion = Database::queryOne($query, [$code]);
        return $promotion;
    }
    public static function getAllDiscount()
    {
        $sql = "SELECT * FROM KhuyenMai";
        $discount = Database::query($sql, []);
        return $discount;
    }
    public static function getDiscountByDayEnd()
    {
        $sql = "SELECT * FROM KhuyenMai WHERE NgayKetThuc > NOW()";
        $discount = Database::query($sql, []);
        return $discount;
    }
    public static function createNewDiscount($data)
    {
        $params = [
            'MaKhuyenMai' => $data['MaKhuyenMai'],
            'TenKhuyenMai' => $data['TenKhuyenMai'],
            'MoTa' => $data['MoTa'],
            'NgayBatDau' => $data['NgayBatDau'],
            'NgayKetThuc' => $data['NgayKetThuc'],
            'GiamToiDa' => $data['GiamToiDa'],
            'TiLeGiam' => $data['TiLeGiam']
        ];
        $result = Database::insert('KhuyenMai', $params);
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Thêm mới thất bại', 500);
    }

    public static function updateDiscount($data, $id)
    {
        $params = [
            'TenKhuyenMai' => $data['TenKhuyenMai'],
            'MoTa' => $data['MoTa'],
            'NgayBatDau' => $data['NgayBatDau'],
            'NgayKetThuc' => $data['NgayKetThuc'],
            'GiamToiDa' => $data['GiamToiDa'],
            'TiLeGiam' => $data['TiLeGiam']
        ];
        $result = Database::update('KhuyenMai', $params, "MaKhuyenMai=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Cập nhật thất bại', 500);
    }

    public static function deleteDiscount($id)
    {
        $result = Database::delete('KhuyenMai', "MaKhuyenMai=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Xóa thất bại', 500);
    }


    public static function checkPromotion($code, $ticketTypeIds, $totalPrice)
    {
        $promotion = self::getPromotionByCode($code);
        if (!$promotion) {
            return JsonResponse::error("Không tìm thấy mã khuyến mãi");
        }
        if ($promotion['TrangThai'] != null && $promotion['TrangThai'] == TrangThaiKhuyenMai::An) {
            return JsonResponse::error("Khuyến mãi không còn hoạt động");
        }
        if ($promotion['NgayBatDau'] != null && $promotion['NgayBatDau'] > date('Y-m-d H:i:s')) {
            return JsonResponse::error("Không tìm thấy mã khuyến mãi");
        }
        if ($promotion['NgayKetThuc'] != null && $promotion['NgayKetThuc'] < date('Y-m-d H:i:s')) {
            return JsonResponse::error("Khuyến mãi đã hết hạn");
        }
        if ($promotion['GioiHanSuDung'] != null && $promotion['GioiHanSuDung'] <= 0) {
            return JsonResponse::error("Số lượng khuyến mãi đã hết");
        }
        $applyForTicketType = $promotion['MaLoaiVe'];
        if ($applyForTicketType != null && !in_array($applyForTicketType, $ticketTypeIds)) {
            return JsonResponse::error("Khuyến mãi không áp dụng cho loại vé bạn chọn");
        }
        $userId = $_SESSION['user']['MaNguoiDung'];
        $usageCount = self::countPromotionUsedByUser($userId, $code);
        if ($promotion['GioiHanTrenKhachHang'] != null && $usageCount >= $promotion['GioiHanTrenKhachHang']) {
            return JsonResponse::error("Bạn đã sử dụng hết số lần sử dụng khuyến mãi");
        }
        if ($promotion["GiaTriToiThieu"] != null && $totalPrice < $promotion["GiaTriToiThieu"]) {
            return JsonResponse::error("Tổng giá trị vé phải lớn hơn " . $promotion["GiaTriToiThieu"]);
        }
        $reducePrice = 0;
        $discountValue = $promotion['GiaTriGiam'];
        if ($discountValue > 100) {
            $reducePrice = $discountValue;
        } else {
            $reducePrice = $totalPrice * $discountValue / 100;
            $maxDiscount = $promotion['GiamToiDa'];
            if ($maxDiscount != null && $maxDiscount > 0) {
                $reducePrice = min($discountValue, $maxDiscount);
            }
        }
        $finalReducePrice = min($reducePrice, $totalPrice);
        return JsonResponse::ok([
            "reducePrice" => $finalReducePrice,
            "promotion" => $promotion
        ]);
    }
    private static function countPromotionUsedByUser($userId, $promotionId)
    {
        $query = "SELECT COUNT(*) FROM HoaDon WHERE MaKhuyenMai = ? AND MaNguoiDung = ?";
        $count = Database::queryOne($query, [$promotionId, $userId]);
        return $count;
    }
    public static function usePromotion($code)
    {

        $promotion = self::getPromotionByCode($code);
        if (!$promotion) {
            return JsonResponse::error("Không tìm thấy mã khuyến mãi");
        }
        if ($promotion['GioiHanSuDung'] == null) {
            return JsonResponse::ok();
        }
        Database::update("KhuyenMai", [
            "GioiHanSuDung" => $promotion['GioiHanSuDung'] - 1
        ], " MaKhuyenMai = '" . $promotion['MaKhuyenMai'] . "'");
        return JsonResponse::ok();

    }
}