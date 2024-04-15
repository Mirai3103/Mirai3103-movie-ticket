<?php
namespace App\Services;

use App\Core\Database\Database;
use App\Core\Database\QueryBuilder;
use App\Core\Logger;
use App\Core\Request;
use App\Models\JsonResponse;

class CinemaService
{
    public static function getCinemasInIds($ids)
    {
        $sql = "SELECT MaRapChieu, TenRapChieu FROM RapChieu WHERE MaRapChieu IN (" . implode(",", $ids) . ")";
        $cinemas = Database::query($sql, []);
        return $cinemas;
    }


    public static function getAllCinemas($query = [])
    {
        // $cinemas = Database::findAll("RapChieu", ["MaRapChieu", "TenRapChieu"]);
        // return $cinemas;
        $queryBuilder = new QueryBuilder();
        $keyword = getArrayValueSafe($query, 'tu-khoa');
        $statuses = getArrayValueSafe($query, 'trang-thais');
        $page = ifNullOrEmptyString(getArrayValueSafe($query, 'trang'), 1);
        $limit = ifNullOrEmptyString(getArrayValueSafe($query, 'limit'), 10);
        $offset = ($page - 1) * $limit;
        $queryBuilder->select(['RapChieu.*'])
            ->from('RapChieu')
            ->where('1', '=', '1');
        if (!isNullOrEmptyString($keyword)) {
            $queryBuilder->and();
            $queryBuilder->startGroup();
            $queryBuilder->where('TenRapChieu', 'LIKE', "%$keyword%");
            $queryBuilder->orWhere('DiaChi', 'LIKE', "%$keyword%");
            $queryBuilder->endGroup();
        }
        if (!isNullOrEmptyArray($statuses)) {
            $queryBuilder->and();
            $queryBuilder->where('TrangThai', 'IN', $statuses);
        }
        Logger::info($queryBuilder->__toString());
        $total = $queryBuilder->count();
        $queryBuilder->limit($limit, $offset);
        $cinemas = $queryBuilder->get();
        Request::setQueryCount($total);
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

    public static function createNewCinema($data)
    {
        $params = [
            'MaRapChieu' => $data['MaRapChieu'],
            'TenRapChieu' => $data['TenRapChieu'],
            'DiaCchi' => $data['DiaChi'],
            'HinhAnh' => $data['HinhAnh'],
            'MoTa' => $data['MoTa'],
            // 'TrangThai' => $data['TrangThai'] ?? TrangThai::DangHoatDong->value
        ];
        $result = Database::insert('RapChieu', $params);
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Thêm mới thất bại', 500);
    }

    public static function updateCinema($data, $id)
    {
        $params = [
            'TenRapChieu' => $data['TenRapChieu'],
            'DiaCchi' => $data['DiaChi'],
            'HinhAnh' => $data['HinhAnh'],
            'MoTa' => $data['MoTa'],
            // 'TrangThai' => $data['TrangThai'] ?? TrangThai::DangHoatDong->value
        ];
        $result = Database::update('RapChieu', $params, "MaRapChieu=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Cập nhật thất bại', 500);
    }

    public static function deleteCinema($id)
    {
        $result = Database::delete('RapChieu', "MaRapChieu=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Xóa thất bại', 500);
    }
}