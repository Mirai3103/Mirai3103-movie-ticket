<?php
namespace App\Services;

use App\Core\Database\Database;
use App\Core\Database\QueryBuilder;

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
    public static function getCinemasByRoomIds($roomIds)
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder->select(
            [
                'PhongChieu.MaPhongChieu' => 'PhongChieu.MaPhongChieu',
                'PhongChieu.TenPhongChieu' => 'PhongChieu.TenPhongChieu',
                'PhongChieu.ManHinh' => 'PhongChieu.ManHinh',
                'PhongChieu.ChieuDai' => 'PhongChieu.ChieuDai',
                'PhongChieu.ChieuRong' => 'PhongChieu.ChieuRong',
                'RapChieu.MaRapChieu' => 'RapChieu.MaRapChieu',
                'RapChieu.TenRapChieu' => 'RapChieu.TenRapChieu',
                'RapChieu.DiaChi' => 'RapChieu.DiaChi',
                'RapChieu.TrangThai' => 'RapChieu.TrangThai'
            ]
        )->from('RapChieu')
            ->join('PhongChieu', 'RapChieu.MaRapChieu = PhongChieu.MaRapChieu')
            ->where('PhongChieu.MaPhongChieu', 'IN', "(" . implode(",", $roomIds) . ")");
        $data = $queryBuilder->get();
        return $queryBuilder->parseMany($data, [
            'root' => 'RapChieu',
            'embed' => ['PhongChieu']
        ]);

    }


}