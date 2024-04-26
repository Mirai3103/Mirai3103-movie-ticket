<?php
namespace App\Services;

use App\Core\Database\Database;
use App\Dtos\JsonResponse;

class CategoryService
{
    public static function getAllCategories()
    {
        $sql = "SELECT * FROM TheLoai";
        $categories = Database::query($sql, []);
        return $categories;
    }

    public static function getCategoriesByMovieId($id)
    {
        $sql = "SELECT TheLoai.* FROM TheLoai JOIN CT_Phim_TheLoai ON TheLoai.MaTheLoai = CT_Phim_TheLoai.MaTheLoai WHERE CT_Phim_TheLoai.MaPhim = ?";
        $categories = Database::query($sql, [$id]);
        return $categories;
    }

    // insert
    public static function createNewCategory($data)
    {
        $params = [
            'MaTheLoai' => $data['MaTheLoai'],
            'TenTheLoai' => $data['TenTheLoai'],
            // 'TrangThai' => $data['TrangThai'] ?? TrangThai::DangHoatDong->value
        ];
        $result = Database::insert('TheLoai', $params);
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Thêm mới thất bại', 500);
    }


    public static function updateCategory($data, $id)
    {
        $params = [
            'TenTheLoai' => $data['TenTheLoai'],
            // 'TrangThai' => $data['TrangThai'] ?? TrangThai::DangHoatDong->value
        ];
        $result = Database::update('TheLoai', $params, "MaTheLoai=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Không thể cập nhật', 500);
    }

    public static function deleteCategory($id)
    {
        $result = Database::delete('TheLoai', "MaTheLoai=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Xóa thất bại', 500);
    }

}