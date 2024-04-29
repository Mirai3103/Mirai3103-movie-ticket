<?php

use App\Services\PromotionService;
use Core\Attributes\Route;

class DiscountController
{
    #[Route(path: '/admin/khuyen-mai', method: 'GET')]
    public static function index()
    {
        return view('admin/discount/index');
    }
    #[Route(path: '/admin/khuyen-mai/them', method: 'GET')]
    public static function add()
    {
        return view('admin/discount/add');
    }
    #[Route(path: '/admin/khuyen-mai/{id}/sua', method: 'GET')]
    public static function edit($id)
    {
        $promotion = PromotionService::getPromotionByCode($id);
        return view('admin/discount/edit', ['promotion' => $promotion]);
    }
    #[Route(path: '/api/admin/khuyen-mai/{id}/sua', method: 'PUT')]
    public static function update($id)
    {
    }
    #[Route(path: '/api/admin/khuyen-mai/{id}/xoa', method: 'DELETE')]
    public static function delete($id)
    {
    }
    #[Route(path: '/api/admin/khuyen-mai/them', method: 'POST')]
    public static function store()
    {
    }
    #[Route(path: '/api/admin/khuyen-mai', method: 'GET')]
    public static function getAll()
    {
    }
    #[Route(path: '/api/admin/khuyen-mai/chuyen-trang-thai', method: 'PATCH')]
    public static function toggleHide()
    {
    }

}