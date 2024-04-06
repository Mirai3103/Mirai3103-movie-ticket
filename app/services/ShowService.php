<?php
namespace App\Services;

use App\Core\Database\Database;
use App\Core\Database\QueryBuilder;

class ShowService
{
    public static function getUpcomingShowsOfMovie($movieId)
    {
        $now = date('Y-m-d H:i:s');
        $next7Days = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($now)));
        $sql = "SELECT * FROM SuatChieu WHERE MaPhim = ? AND NgayGioChieu BETWEEN ? AND ?";
        $shows = Database::query($sql, [$movieId, $now, $next7Days]);
        return $shows;
    }
    // trả về danh sách phim
    // lọc theo các tiêu chí
    //      1. Keyword => tên phim, mã phim, tên đạo diễn, 
    //      2. Thể loại -> select
    //      3. Quốc gia -> select
    //      4. Khoảng thời gian -> min: now, max: user input  -> tìm suất chiếu phim đó trong ngày đó
    //      5. Thời lượng -> min: 0, max: user input
    //      7. Định dạng -> select
    //      8. Rạp -> select -> rạp nào có suất chiếu phim đó
    //      9.  Sắp xếp -> select theo tên, ngày chiếu, thời lượng,

    public static function advanceSearch($queryInput)
    {
        $keyword = $queryInput['tu-khoa'] ?? '';
        $genre = $queryInput['the-loai'] ?? '';
        $timeRangeFrom = $queryInput['thoi-gian-tu'] ?? '';
        $timeRangeTo = $queryInput['thoi-gian-den'] ?? '';
        $durationFrom = $queryInput['thoi-luong-tu'] ?? '0';
        $durationTo = $queryInput['thoi-luong-den'] ?? '0';
        $format = $queryInput['dinh-dang'] ?? '';
        $cinema = $queryInput['rap'] ?? '';
        $sort = $queryInput['sap-xep'] ?? '';
        $sortBy = $queryInput['theo'] ?? '';
        $page = $queryInput['page'] ?? 1;
        $limit = $queryInput['limit'] ?? 20;
        $sql = "Select Phim.MaPhim from Phim ";
        $sql .= "LEFT JOIN ct_phim_theloai ON ct_phim_theloai.MaPhim = phim.MaPhim ";
        $sql .= "WHERE 1=1 ";
        if (!empty($keyword)) {
            $sql .= "AND (Phim.TenPhim LIKE '%$keyword%' OR Phim.DaoDien LIKE '%$keyword%') ";
        }
        if (!empty($genre)) {
            $sql .= "AND ct_phim_theloai.MaTheLoai = $genre ";
        }
        $sql .= "AND Phim.ThoiLuong >= $durationFrom ";
        if ($durationTo != '0') {
            $sql .= "AND Phim.ThoiLuong <= $durationTo ";
        }
        if (!empty($format)) {
            $sql .= "AND Phim.DinhDang = $format ";
        }
        if (!empty($cinema)) {
            $sql .= "AND EXISTS (SELECT * FROM SuatChieu WHERE SuatChieu.MaPhim = Phim.MaPhim AND SuatChieu.MaRap = $cinema) ";
        }
        if (!empty($timeRangeFrom)) {
            $sql .= "AND EXISTS (SELECT * FROM SuatChieu WHERE SuatChieu.MaPhim = Phim.MaPhim AND SuatChieu.NgayGioChieu >= '$timeRangeFrom') ";
        }
        if (!empty($timeRangeTo)) {
            $sql .= "AND EXISTS (SELECT * FROM SuatChieu WHERE SuatChieu.MaPhim = Phim.MaPhim AND SuatChieu.NgayGioChieu <= '$timeRangeTo') ";
        }
        $sql .= "GROUP BY Phim.MaPhim ";
        echo $sql;
        die();
        // giờ tìm các phim trong danh sách phim trên in ids
        $movies = Database::query($sql, []);
        $ids = array_map(function ($movie) {
            return $movie['MaPhim'];
        }, $movies);
        $sql = "SELECT * FROM Phim WHERE MaPhim IN (" . implode(",", $ids) . ") ";
        if (!empty($sort)) {
            $sql .= "ORDER BY $sort $sortBy ";
        }
        $sql .= "LIMIT " . ($page - 1) * $limit . ", $limit";
        $movies = Database::query($sql, []);
        return $movies;
    }

    public static function getShowInfoById($maSuatChieu)
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder->select([
            'SuatChieu.MaXuatChieu',
            'SuatChieu.NgayGioChieu',
            'SuatChieu.NgayGioKetThuc',
            'Phim.TenPhim',
            'Phim.HinhAnh',
            'Phim.MaPhim',
            'PhongChieu.TenPhongChieu',
            'RapChieu.TenRapChieu',
            'RapChieu.DiaChi',
        ])->from('SuatChieu')
            ->join('Phim', 'SuatChieu.MaPhim = Phim.MaPhim')
            ->join('PhongChieu', 'SuatChieu.MaPhongChieu = PhongChieu.MaPhongChieu')
            ->join('RapChieu', 'PhongChieu.MaRapChieu = RapChieu.MaRapChieu')
            ->where('SuatChieu.MaXuatChieu', '=', $maSuatChieu);
        $show = $queryBuilder->first();
        return $show;
    }
    public static function getShowById($id)
    {
        $sql = "SELECT * FROM SuatChieu WHERE MaXuatChieu = ?";
        $show = Database::queryOne($sql, [$id]);
        return $show;
    }
}