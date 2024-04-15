<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Core\Database\QueryBuilder;
use App\Core\Request;
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
    public static function getPublicMovies($page = 1, $limit = 20)
    {
        $query = "SELECT * FROM Phim WHERE TrangThai != ? LIMIT ? , ?;";
        $phims = Database::query($query, [TrangThaiPhim::NgungChieu->value, ($page - 1) * $limit, $limit]);
        return $phims;
    }



    public static function getTatCaPhim($query = [])
    {
        $queryBuilder = new QueryBuilder();
        $keyword = getArrayValueSafe($query, 'tu-khoa');
        $statuses = getArrayValueSafe($query, 'trang-thais');
        $ngayPhatHanhTu = getArrayValueSafe($query, 'ngay-phat-hanh-tu');
        $ngayPhatHanhDen = getArrayValueSafe($query, 'ngay-phat-hanh-den');
        $page = ifNullOrEmptyString(getArrayValueSafe($query, 'trang'), 1);
        $limit = ifNullOrEmptyString(getArrayValueSafe($query, 'limit'), 10);
        $offset = ($page - 1) * $limit;
        $queryBuilder->select(['Phim.*'])
            ->from('Phim')
            ->where('1', '=', '1');
        if (!isNullOrEmptyString($keyword)) {
            $queryBuilder->and();
            $queryBuilder->startGroup();
            $queryBuilder->where('TenPhim', 'LIKE', "%$keyword%");
            $queryBuilder->orWhere('DaoDien', 'LIKE', "%$keyword%");
            $queryBuilder->orWhere('NgonNgu', 'LIKE', "%$keyword%");
            $queryBuilder->endGroup();
        }
        if (!isNullOrEmptyArray($statuses)) {
            $queryBuilder->and();
            $queryBuilder->where('TrangThai', 'IN', $statuses);
        }
        if (!isNullOrEmptyString($ngayPhatHanhTu)) {
            $queryBuilder->andWhere('NgayPhatHanh', '>=', $ngayPhatHanhTu);
        }
        if (!isNullOrEmptyString($ngayPhatHanhDen)) {
            $queryBuilder->andWhere('NgayPhatHanh', '<=', $ngayPhatHanhDen);
        }
        $total = $queryBuilder->count();
        $queryBuilder->limit($limit, $offset);
        $phims = $queryBuilder->get();
        Request::setQueryCount($total);
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