<?php

use App\Models\JsonResponse;
use App\Services\AccountService;
use Core\Attributes\Route;

class AccountController
{
    #[Route(path: '/admin', method: 'GET')]
    public static function home()
    {
        return view('admin/index');
    }
    #[Route(path: '/admin/tai-khoan', method: 'GET')]
    public static function index()
    {

        return view('admin/account/index');
    }
    #[Route(path: '/api/tai-khoan', method: 'GET')]
    public static function getAllAccount()
    {
        return json(JsonResponse::ok(AccountService::getAllAccount($_GET)));
    }
    #[Route(path: '/admin/tai-khoan/them', method: 'GET')]
    public static function add()
    {
        return view('admin/account/add');
    }
}