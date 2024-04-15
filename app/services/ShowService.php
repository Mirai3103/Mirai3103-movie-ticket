<?php
namespace App\Services;

use App\Core\Database\Database;
use App\Core\Database\QueryBuilder;
use App\Core\Request;

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
    //  {
    //             'tu-khoa': keyword,
    //             'the-loais': theloais,
    //             'raps': rapchieus,
    //             'thoi-gian-tu': showFrom,
    //             'thoi-gian-den': showTo,
    //             'thoi-luong-tu': durrationFrom,
    //             'thoi-luong-den': durrationTo,
    //             'sap-xep': sortBy,
    //             'thu-tu': sort
    //         }
    public static function advanceSearch($queryInput)
    {
        $keyword = getArrayValueSafe($queryInput, 'tu-khoa');
        $genre = getArrayValueSafe($queryInput, 'the-loais', []);
        $timeRangeFrom = ifNullOrEmptyString(getArrayValueSafe($queryInput, 'thoi-gian-tu'), date('Y-m-d'));
        $timeRangeTo = getArrayValueSafe($queryInput, 'thoi-gian-den');
        $durationFrom = getArrayValueSafe($queryInput, 'thoi-luong-tu');
        $durationTo = getArrayValueSafe($queryInput, 'thoi-luong-den');
        $cinema = getArrayValueSafe($queryInput, 'rapchieus', []);
        $sortDir = ifNullOrEmptyString(getArrayValueSafe($queryInput, 'thu-tu'), 'ASC');
        $sortBy = ifNullOrEmptyString(getArrayValueSafe($queryInput, 'sap-xep'), 'Phim.TenPhim');
        $page = ifNullOrEmptyString(getArrayValueSafe($queryInput, 'trang'), 1);
        $limit = ifNullOrEmptyString(getArrayValueSafe($queryInput, 'limit'), 10);

        $sql = "Select Phim.MaPhim from Phim ";
        $sql .= "LEFT JOIN CT_Phim_TheLoai ON CT_Phim_TheLoai.MaPhim = Phim.MaPhim ";
        $sql .= "WHERE 1=1 ";
        if (!isNullOrEmptyString($keyword)) {
            $sql .= "AND (Phim.TenPhim LIKE '%$keyword%' OR Phim.DaoDien LIKE '%$keyword%') ";
        }
        if (!isNullOrEmptyArray($genre)) {
            $sql .= "AND CT_Phim_TheLoai.MaTheLoai IN (" . implode(",", $genre) . ") ";
        }
        if (!empty($durationFrom))
            $sql .= "AND Phim.ThoiLuong >= $durationFrom ";
        if (!empty($durationTo)) {
            $sql .= "AND Phim.ThoiLuong <= $durationTo ";
        }

        if (!isNullOrEmptyArray($cinema)) {
            $sql .= "AND EXISTS (SELECT * FROM SuatChieu JOIN PhongChieu ON SuatChieu.MaPhongChieu = PhongChieu.MaPhongChieu WHERE SuatChieu.MaPhim = Phim.MaPhim AND PhongChieu.MaRapChieu in ($cinema)) ";
        }
        if (!isNullOrEmptyString($timeRangeFrom)) {
            $sql .= "AND EXISTS (SELECT * FROM SuatChieu WHERE SuatChieu.MaPhim = Phim.MaPhim AND DATE(SuatChieu.NgayGioChieu) >= DATE('$timeRangeFrom')) ";
        }
        if (!isNullOrEmptyString($timeRangeTo)) {
            $sql .= "AND EXISTS (SELECT * FROM SuatChieu WHERE SuatChieu.MaPhim = Phim.MaPhim AND DATE(SuatChieu.NgayGioChieu) <= DATE('$timeRangeTo')) ";
        }
        $sql .= "GROUP BY Phim.MaPhim ";
        //     	Select Phim.MaPhim from Phim 
        //  JOIN CT_Phim_TheLoai ON CT_Phim_TheLoai.MaPhim = Phim.MaPhim 
        //  WHERE CT_Phim_TheLoai.MaTheLoai IN (6, 7)
        // AND (Phim.TenPhim LIKE '%%' OR Phim.DaoDien LIKE '%%') 
        // AND Phim.ThoiLuong >= 120
        // AND EXISTS (SELECT * FROM SuatChieu Join PhongChieu on SuatChieu.MaPhongChieu = PhongChieu.MaPhongChieu WHERE SuatChieu.MaPhim = Phim.MaPhim AND PhongChieu.MaRapChieu in (1))
        // GROUP BY Phim.MaPhim
        // HAVING COUNT(DISTINCT CT_Phim_TheLoai.MaTheLoai) = 2;
        if (!isNullOrEmptyArray($genre)) {
            $count = count($genre);
            $sql .= "HAVING COUNT(DISTINCT CT_Phim_TheLoai.MaTheLoai) = $count ";
        }
        $movies = Database::query($sql, []);
        $ids = array_map(function ($movie) {
            return $movie['MaPhim'];
        }, $movies);
        if (isNullOrEmptyArray($ids)) {
            Request::setQueryCount(0);
            return [];
        }
        $sql = "SELECT MaPhim,TenPhim,NgayPhatHanh,HanCheDoTuoi,HinhAnh,ThoiLuong,NgonNgu,DaoDien ,DinhDang,Trailer FROM Phim WHERE MaPhim IN (" . implode(",", $ids) . ") ";
        $count = Database::count($sql, []);
        Request::setQueryCount($count);
        if (!isNullOrEmptyString($sortBy)) {
            $sql .= "ORDER BY $sortBy $sortDir ";
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