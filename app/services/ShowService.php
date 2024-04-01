<?php
namespace App\Services;

use App\Core\Database\Database;

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

}