<?php
use Core\Attributes\Route;

class FilmCategoryController
{
    #[Route("/admin/the-loai", "GET")]
    public static function quanLyTheLoaiPhim()
    {
        return view("admin/the-loai-phim/index");
    }
}