<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Models\JsonResponse;
use App\Models\TrangThaiPhong;

class RoomService
{
    public static function getAllRooms($params)
    {
        $page = $params['page'] ?? 1;
        $limit = $params['limit'] ?? 10;
        $order = $params['order'] ?? 'ASC';
        $orderBy = $params['orderBy'] ?? 'MaPhongChieu';
        $keyword = $params['keyword'] ?? '';
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM PhongChieu WHERE TenPhongChieu LIKE " . "'%$keyword%'" . " ";
        if (isset($params['MaRapChieu']) && !empty($params['MaRapChieu'])) {
            $sql = $sql . "AND MaRapChieu = " . $params['MaRapChieu'] . " ";
        }

        $total = Database::count($sql, []);
        $sql = $sql . "ORDER BY $orderBy $order LIMIT $offset, $limit";
        $rooms = Database::query($sql, []);
        return [
            'total' => $total,
            'rooms' => $rooms
        ];
    }
    public static function setRoomStatus(int $id, int $status)
    {
        $sql = "UPDATE RapChieu SET TrangThai = ? WHERE MaRapChieu = ?";
        $result = Database::execute($sql, [$status, $id]);
        return $result;
    }
    public static function createRoom($data)
    {
        // MaPhongChieu
        // TenPhongChieu
        // ManHinh
        // ChieuDai
        // ChieuRong
        // MaRapChieu
        // TrangThai
        $params = [
            'TenPhongChieu' => $data['TenPhongChieu'],
            'ManHinh' => $data['ManHinh'],
            'ChieuDai' => $data['ChieuDai'],
            'ChieuRong' => $data['ChieuRong'],
            'MaRapChieu' => $data['MaRapChieu'],
            'TrangThai' => $data['TrangThai'] ?? TrangThaiPhong::DangBaoTri->value
        ];
        $result = Database::insert('PhongChieu', $params);
        if ($result) {
            return JsonResponse::ok([
                'MaPhongChieu' => $result
            ]);
        }
        return JsonResponse::error('Tạo phòng chiếu thất bại', 500);
    }

}