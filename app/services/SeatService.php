<?php


namespace App\Services;

use App\Core\Database\Database;
use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Models\TrangThaiPhong;

class SeatService
{
    public static function createSeat($data)
    {
        $params = [
            'MaPhongChieu' => $data['MaPhongChieu'],
            'MaLoaiGhe' => $data['MaLoaiGhe'],
            'SoGhe' => $data['SoGhe'],
            'TrangThai' => $data['TrangThai'] ?? TrangThaiPhong::DangHoatDong->value
        ];
        $result = Database::insert('Ghe', $params);
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Tạo ghế thất bại', 500);
    }
    public static function createSeats($data)
    {
        $cleanData = array_map(function ($seat) {
            return [
                'MaPhongChieu' => $seat['MaPhongChieu'],
                'MaLoaiGhe' => $seat['MaLoaiGhe'],
                'SoGhe' => $seat['SoGhe'],
                'TrangThai' => $seat['TrangThai'] ?? TrangThaiPhong::DangHoatDong->value,
                "X" => $seat["X"],
                "Y" => $seat["Y"]
            ];
        }, $data);
        $result = Database::insertMany('Ghe', $cleanData);
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Tạo ghế thất bại', 500);
    }
}