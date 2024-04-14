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
    public static function createNewSeatType($data)
    {
        $params = [
            'MaLoaiGhe' => $data['MaLoaiGhe'],
            'TenLoaiGhe' => $data['TenLoaiGhe'],
            'MoTa' => $data['MoTa'],
            'GiaVe' => $data['GiaVe'],
            'Dai' => $data['Dai'],
            'Rong' => $data['Rong'],
            'Mau' => $data['Mau'],
            //       'TrangThai' => $data['TrangThai'] ?? TrangThai::DangHoatDong->value
        ];
        $result = Database::insert('LoaiGhe', $params);
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Tạo loại ghế thất bại', 500);
    }

    public static function updateSeatType($data, $id)
    {
        $params = [
            'TenLoaiGhe' => $data['TenLoaiGhe'],
            'MoTa' => $data['MoTa'],
            'GiaVe' => $data['GiaVe'],
            'Dai' => $data['Dai'],
            'Rong' => $data['Rong'],
            'Mau' => $data['Mau'],
            //    'TrangThai' => $data['TrangThai'] ?? TrangThai::DangHoatDong->value
        ];
        $result = Database::update('LoaiGhe', $data, "MaLoaiGhe=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Cập nhật thất bại', 500);
    }

    public static function deleteSeatType($id)
    {
        $result = Database::delete('LoaiGhe', "MaLoaiGhe=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error("Xóa thất bại", 500);
    }

}