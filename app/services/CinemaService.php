<?php
namespace App\Services;

use App\Core\Database\Database;
use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;

class CinemaService
{
    public static function getCinemasInIds($ids)
    {
        $sql = "SELECT MaRapChieu, TenRapChieu FROM RapChieu WHERE MaRapChieu IN (" . implode(",", $ids) . ")";
        $cinemas = Database::query($sql, []);
        return $cinemas;
    }
    public static function getAllCinemas()
    {
        $cinemas = Database::findAll("RapChieu", ["MaRapChieu", "TenRapChieu"]);
        return $cinemas;
    }
    public static function getCinemaById($id)
    {
        $sql = "SELECT * FROM RapChieu WHERE MaRapChieu = ?";
        $cinema = Database::queryOne($sql, [$id]);
        return $cinema;
    }


}