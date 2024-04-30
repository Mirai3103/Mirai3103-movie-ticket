<?php
namespace App\Services;

use App\Core\Database\Database;


class StatisticService
{
    public static function countTotalBill($params)
    {
        $ngayBatDau = getArrayValueSafe($params, 'tu-ngay', '');
        $ngayKetThuc = getArrayValueSafe($params, 'den-ngay', '');
        $sql = "SELECT COUNT(*) as total FROM HoaDon where 1=1 ";
        if ($ngayBatDau) {
            $sql .= " AND DATE(NgayGioThanhToan) >= DATE('$ngayBatDau')";
        }
        if ($ngayKetThuc) {
            $sql .= " AND DATE(NgayGioThanhToan) <= DATE('$ngayKetThuc')";
        }
        $total = Database::query($sql, []);
        return $total;
    }
    public static function sumTotalBill($params)
    {
        $ngayBatDau = getArrayValueSafe($params, 'tu-ngay', '');
        $ngayKetThuc = getArrayValueSafe($params, 'den-ngay', '');
        $sql = "SELECT SUM(TongTien) as total FROM HoaDon where 1=1 ";
        if ($ngayBatDau) {
            $sql .= " AND DATE(NgayGioThanhToan) >= DATE('$ngayBatDau')";
        }
        if ($ngayKetThuc) {
            $sql .= " AND DATE(NgayGioThanhToan) <= DATE('$ngayKetThuc')";
        }
        $total = Database::query($sql, []);
        return $total;
    }
    public static function billStatistic($params)
    {
        $ngayBatDau = getArrayValueSafe($params, 'tu-ngay', '');
        $ngayKetThuc = getArrayValueSafe($params, 'den-ngay', '');
        $sql = "SELECT COUNT(*) as total, SUM(TongTien) as totalMoney, DATE(NgayGioThanhToan) as `date` FROM HoaDon where 1=1 ";
        if ($ngayBatDau) {
            $sql .= " AND DATE(NgayGioThanhToan) >= DATE('$ngayBatDau')";
        }
        if ($ngayKetThuc) {
            $sql .= " AND DATE(NgayGioThanhToan) <= DATE('$ngayKetThuc')";
        }
        $sql .= " GROUP BY DATE(NgayGioThanhToan)";
        $total = Database::query($sql, []);
        return $total;
    }
    public static function sumOfEachFilmTag()
    {
        $sumEachFilmTagQuery = "SELECT COUNT(*) as total, HanCheDoTuoi FROM Phim GROUP BY HanCheDoTuoi";
        $result = Database::query($sumEachFilmTagQuery, []);
        // $sumEachGrupByCategoryQuery = "SELECT COUNT(*) as total, TheLoai.TenTheLoai, TheLoai.MaTheLoai
        // FROM Phim
        // JOIN CT_Phim_TheLoai ON Phim.MaPhim = CT_Phim_TheLoai.MaPhim
        // JOIN TheLoai ON CT_Phim_TheLoai.MaTheLoai = TheLoai.MaTheLoai
        // GROUP BY TheLoai.MaTheLoai, TheLoai.TenTheLoai";
        return $result;
    }
    public static function ticketStatistic($params)
    {
        $ngayBatDau = getArrayValueSafe($params, 'tu-ngay', '');
        $ngayKetThuc = getArrayValueSafe($params, 'den-ngay', '');
        $sql = "SELECT COUNT(*) as total, DATE(HoaDon.NgayGioThanhToan) as `date`, SUM(Ve.GiaVe) as totalMoney FROM Ve 
                JOIN HoaDon ON Ve.MaHoaDon = HoaDon.MaHoaDon
                WHERE 1=1 ";
        if ($ngayBatDau) {
            $sql .= " AND DATE(HoaDon.NgayGioThanhToan) >= DATE('$ngayBatDau')";
        }
        if ($ngayKetThuc) {
            $sql .= " AND DATE(HoaDon.NgayGioThanhToan) <= DATE('$ngayKetThuc')";
        }
        $sql .= " GROUP BY DATE(HoaDon.NgayGioThanhToan)";
        $total = Database::query($sql, []);
        return $total;
    }

    public static function countTotalTicket($params)
    {
        $ngayBatDau = getArrayValueSafe($params, 'tu-ngay', '');
        $ngayKetThuc = getArrayValueSafe($params, 'den-ngay', '');
        $sql = "SELECT COUNT(*) as total FROM Ve JOIN HoaDon ON Ve.MaHoaDon = HoaDon.MaHoaDon WHERE 1=1 ";
        if ($ngayBatDau) {
            $sql .= " AND DATE(HoaDon.NgayGioThanhToan) >= DATE('$ngayBatDau')";
        }
        if ($ngayKetThuc) {
            $sql .= " AND DATE(HoaDon.NgayGioThanhToan) <= DATE('$ngayKetThuc')";
        }
        $total = Database::query($sql, []);
        return $total;
    }

    // Tổng doanh thu các rạp chiếu

    public static function sumTotalRevenueEachCinema($params)
    {
        $ngayBatDau = getArrayValueSafe($params, 'tu-ngay', '');
        $ngayKetThuc = getArrayValueSafe($params, 'den-ngay', '');
        $subSql = "SELECT distinct HoaDon.MaHoaDon , HoaDon.TongTien, RapChieu.MaRapChieu  From HoaDon
                    join Ve on Ve.MaHoaDon = HoaDon.MaHoaDon
                    join SuatChieu on Ve.MaSuatChieu = SuatChieu.MaXuatChieu
                    join PhongChieu on PhongChieu.MaPhongChieu = SuatChieu.MaPhongChieu
                    join RapChieu on RapChieu.MaRapChieu = PhongChieu.MaRapChieu
                    where 1=1";
        if ($ngayBatDau) {
            $subSql .= " AND DATE(HoaDon.NgayGioThanhToan) >= DATE('$ngayBatDau')";
        }
        if ($ngayKetThuc) {
            $subSql .= " AND DATE(HoaDon.NgayGioThanhToan) <= DATE('$ngayKetThuc')";
        }
        $subSql .= " GROUP BY HoaDon.MaHoaDon ";

        $sql = "SELECT SUM(TongTien) as total, RapChieu.TenRapChieu FROM ($subSql) as subSql
               RIGHT JOIN RapChieu ON subSql.MaRapChieu = RapChieu.MaRapChieu
                WHERE 1=1 ";

        $sql .= " GROUP BY RapChieu.MaRapChieu";
        $total = Database::query($sql, []);
        return $total;
    }

    public static function sumTotalRevenueTicket($params)
    {
        $ngayBatDau = getArrayValueSafe($params, 'tu-ngay', '');
        $ngayKetThuc = getArrayValueSafe($params, 'den-ngay', '');
        $sql = "SELECT SUM(Ve.GiaVe) as totalMoney, DATE(HoaDon.NgayGioThanhToan) as `date`
                FROM Ve
                JOIN HoaDon ON Ve.MaHoaDon = HoaDon.MaHoaDon
                WHERE 1=1 ";
        if ($ngayBatDau) {
            $sql .= " AND DATE(HoaDon.NgayGioThanhToan) >= DATE('$ngayBatDau')";
        }
        if ($ngayKetThuc) {
            $sql .= " AND DATE(HoaDon.NgayGioThanhToan) <= DATE('$ngayKetThuc')";
        }
        $sql .= " GROUP BY DATE(HoaDon.NgayGioThanhToan)";
        $total = Database::query($sql, []);
        return $total;
    }
    public static function sumTotalRevenueFood($params)
    {
        $ngayBatDau = getArrayValueSafe($params, 'tu-ngay', '');
        $ngayKetThuc = getArrayValueSafe($params, 'den-ngay', '');
        $sql1 = "SELECT SUM(CT_HoaDon_ThucPham.ThanhTien) as totalMoney, DATE(HoaDon.NgayGioThanhToan) as `date`
                FROM CT_HoaDon_ThucPham
                JOIN HoaDon ON CT_HoaDon_ThucPham.MaHoaDon = HoaDon.MaHoaDon
                WHERE 1=1 ";
        if ($ngayBatDau) {
            $sql1 .= " AND DATE(HoaDon.NgayGioThanhToan) >= DATE('$ngayBatDau')";
        }
        if ($ngayKetThuc) {
            $sql1 .= " AND DATE(HoaDon.NgayGioThanhToan) <= DATE('$ngayKetThuc')";
        }
        $sql1 .= " GROUP BY DATE(HoaDon.NgayGioThanhToan)";

        $sql2 = "SELECT SUM(CT_HoaDon_Combo.ThanhTien) as totalMoney, DATE(HoaDon.NgayGioThanhToan) as `date`
                FROM CT_HoaDon_Combo
                JOIN HoaDon ON CT_HoaDon_Combo.MaHoaDon = HoaDon.MaHoaDon
                WHERE 1=1 ";
        if ($ngayBatDau) {
            $sql2 .= " AND DATE(HoaDon.NgayGioThanhToan) >= DATE('$ngayBatDau')";
        }
        if ($ngayKetThuc) {
            $sql2 .= " AND DATE(HoaDon.NgayGioThanhToan) <= DATE('$ngayKetThuc')";
        }
        $sql2 .= " GROUP BY DATE(HoaDon.NgayGioThanhToan)";
        $sql = "SELECT  SUM(totalMoney) as totalMoney,`date` from
                ( ($sql1) UNION ALL ($sql2) ) as subSql
                GROUP BY `date`";
        $total = Database::query($sql, []);
        return $total;
    }
}