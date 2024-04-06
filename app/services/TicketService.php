<?php
namespace App\Services;

use App\Core\Database\Database;
use App\Models\JsonResponse;

class TicketService
{
    private static $LOCK_TIME = 60 * 10;
    public static function isSeatLocked($seatId, $showId)
    {
        $ticket = Database::queryOne("SELECT * FROM Ve WHERE MaGhe = ? AND MaSuatChieu = ?", [$seatId, $showId]);
        // KhoaDen	type = timestamp	
        if ($ticket['KhoaDen'] == null)
            return false;
        $now = time();
        $lockTime = strtotime($ticket['KhoaDen']);
        return $now < $lockTime;
    }

    public static function isAnySeatsLocked($seatIds, $showId)
    {
        $seatIds = implode(",", $seatIds);
        $tickets = Database::query("SELECT * FROM Ve WHERE MaGhe IN ($seatIds) AND MaSuatChieu = ?", [$showId]);
        $now = time();
        foreach ($tickets as $ticket) {
            if ($ticket['KhoaDen'] == null)
                continue;
            $lockTime = strtotime($ticket['KhoaDen']);
            if ($now < $lockTime) {
                return true;
            }
        }
        return false;
    }



    public static function lockTicket($ticketId)
    {
        $lockTime = time() + self::$LOCK_TIME;
        Database::execute("UPDATE Ve SET KhoaDen = ? WHERE id = ?", [date('Y-m-d H:i:s', $lockTime), $ticketId]);
        return $lockTime;
    }
    public static function lockSeats($seatIds, $showId)
    {
        $seatIds = implode(",", $seatIds);
        $lockTime = time() + self::$LOCK_TIME;
        Database::execute("UPDATE Ve SET KhoaDen = ? WHERE MaGhe IN ($seatIds) AND MaSuatChieu = ?", [date('Y-m-d H:i:s', $lockTime), $showId]);
        return $lockTime;
    }

    public static function startCheckout($data)
    {

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
            Database::execute("UPDATE Ve SET MaLoaiVe = ? WHERE MaGhe = ? AND MaSuatChieu = ?", [$ve['MaLoaiVe'], $ve['MaGhe'], $data['MaXuatChieu']]);
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
            "lockTo" => $lockToTime
        ];
        $_SESSION['bookingData'] = $bookingData;
        return JsonResponse::ok($bookingData);
    }
    public static function getAllTicketsOfShow($showId)
    {
        return Database::query("SELECT * FROM Ve WHERE MaSuatChieu = ?", [$showId]);
    }

    public static function getTicketOfSeats($seatIds, $showId)
    {
        $seatIds = implode(",", $seatIds);
        $sql = "SELECT
        Ve.*,
        LoaiVe.TenLoaiVe
        FROM Ve JOIN LoaiVe ON Ve.MaLoaiVe = LoaiVe.MaLoaiVe
        WHERE Ve.MaSuatChieu = ? AND Ve.MaGhe IN ($seatIds)";
        return Database::query($sql, [$showId]);
    }


    public static function getTicketTypes()
    {
        return Database::query("SELECT * FROM LoaiVe", []);
    }
}