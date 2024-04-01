<?php
namespace App\Services;

use App\Core\Database\Database;

class CategoryService
{
    public static function getAllCategories()
    {
        $sql = "SELECT * FROM theloai";
        $categories = Database::query($sql, []);
        return $categories;
    }

    public static function getCategoriesByMovieId($id)
    {
        $sql = "SELECT TheLoai.* FROM TheLoai JOIN CT_Phim_TheLoai ON TheLoai.MaTheLoai = CT_Phim_TheLoai.MaTheLoai WHERE CT_Phim_TheLoai.MaPhim = ?";
        $categories = Database::query($sql, [$id]);
        return $categories;
    }
}