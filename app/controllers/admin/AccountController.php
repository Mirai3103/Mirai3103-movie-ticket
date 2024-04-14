<?php

use Core\Attributes\Route;

class AccountController
{
    #[Route(path: '/admin/tai-khoan', method: 'GET')]
    public static function index()
    {
        return view('admin/account/index');
    }
    #[Route(path: '/admin/tai-khoan/them', method: 'GET')]
    public static function add()
    {
        return view('admin/account/add');
    }
}