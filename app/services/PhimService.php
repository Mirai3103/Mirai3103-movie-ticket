<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Models\TrangThaiPhim;

class PhimService
{
    public static function getPhimDangChieu($page = 1, $limit = 20)
    {
        $query = "SELECT * FROM Phim WHERE TrangThai = ? LIMIT ? , ?;";
        $phims = Database::query($query, [TrangThaiPhim::DangChieu->value, ($page - 1) * $limit, $limit]);
        return $phims;
    }
    public static function getPhimSapChieu($page = 1, $limit = 20)
    {
        $query = "SELECT * FROM Phim WHERE TrangThai = ? LIMIT ? , ?;";
        $phims = Database::query($query, [TrangThaiPhim::SapChieu->value, ($page - 1) * $limit, $limit]);
        return $phims;
    }

    public static function getTatCaPhim($page = 1, $limit = 20)
    {
        $query = "SELECT * FROM Phim LIMIT ? , ?;";
        $phims = Database::query($query, [($page - 1) * $limit, $limit]);
        return $phims;
    }

    public static function getPhimById($id)
    {
        $query = "SELECT * FROM Phim WHERE MaPhim = ?;";
        $phim = Database::queryOne($query, [$id]);
        return $phim;
    }
    public static function getPhimByIds($ids)
    {
        $query = "SELECT * FROM Phim WHERE MaPhim IN (" . implode(",", $ids) . ");";
        $phims = Database::query($query, []);
        return $phims;
    }
}