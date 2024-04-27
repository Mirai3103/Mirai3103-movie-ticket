<?php
use App\Services\CategoryService;
use Core\Attributes\Route;

class FilmCategoryController
{
    #[Route("/admin/the-loai", "GET")]
    public static function quanLyTheLoaiPhim()
    {
        return view("admin/the-loai-phim/index");
    }
    #[Route("/api/the-loai", "GET")]
    public static function getApiTheLoai()
    {
        $theLoai = CategoryService::getAllCategories();
        return json($theLoai);
    }
    #[Route("/api/the-loai", "POST")]
    public static function postApiTheLoai()
    {
        $data = request_body();
        $result = CategoryService::createNewCategory($data);
        return json($result);
    }
    #[Route("/api/the-loai/{id}", "PUT")]
    public static function putApiTheLoai($id)
    {
        $data = request_body();
        $result = CategoryService::updateCategory($id, $data);
        return json($result);
    }
    #[Route("/api/the-loai/{id}", "DELETE")]
    public static function deleteApiTheLoai($id)
    {
        $result = CategoryService::deleteCategory($id);
        return json($result);
    }

}