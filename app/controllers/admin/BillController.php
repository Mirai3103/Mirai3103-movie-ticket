<?php

use Core\Attributes\Route;

class BillController
{
    #[Route(path: '/admin/hoa-don', method: 'GET')]
    public static function index()
    {
        return view('admin/bill/index');
    }
    #[Route(path: '/admin/hoa-don/{id}', method: 'GET')]
    public static function detail()
    {
        return view('admin/bill/detail');
    }
}