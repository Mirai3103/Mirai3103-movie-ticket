<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;


class SeatTypeService
{
    public static function getAllSeatType()
    {
        $sql = "SELECT * FROM LoaiGhe";
        $seatType = Database::query($sql, []);
        return $seatType;
    }
    public static function getSeatTypeByIds($ids)
    {
        $sql = "SELECT * FROM LoaiGhe WHERE MaLoaiGhe IN (" . implode(",", $ids) . ")";
        $seatType = Database::query($sql, []);
        return $seatType;
    }
}