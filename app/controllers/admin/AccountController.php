<?php

use App\Models\JsonResponse;
use App\Models\LoaiTaiKhoan;
use App\Models\TrangThaiTaiKhoan;
use App\Services\AccountService;
use App\Services\RoleService;
use App\Services\StatusService;
use App\Services\UserService;
use Core\Attributes\Route;

class AccountController
{

    #[Route(path: '/admin/tai-khoan', method: 'GET')]
    public static function index()
    {
        $statuses = StatusService::getAllStatus('TaiKhoan');
        $roles = RoleService::getAllRole();
        return view('admin/account/index', ['statuses' => $statuses, 'roles' => $roles]);
    }
    #[Route(path: '/api/tai-khoan', method: 'GET')]
    public static function getAllAccount()
    {
        return json(JsonResponse::ok(AccountService::getAllAccount($_GET)));
    }
    #[Route(path: '/admin/tai-khoan/them', method: 'GET')]
    public static function addView()
    {
        $employees = UserService::getAllUser([
            'co-tai-khoan' => false,
            'limit' => 10000
        ]);
        $roles = RoleService::getAllRole();
        return view('admin/account/add', ['employees' => $employees, 'roles' => $roles]);
    }
    #[Route(path: '/admin/tai-khoan/them', method: 'POST')]
    public static function add()
    {
        $data = request_body();

        $result = AccountService::createNewAccount($data);
        return json($result);
    }
    #[Route(path: '/api/tai-khoan/{id}/set-password', method: 'PATCH')]
    public static function setPassword($id)
    {
        $data = request_body();
        return json(AccountService::setPassword($id, $data));
    }
    #[Route(path: '/api/tai-khoan/{id}/nhom-quyen', method: 'PATCH')]
    public static function setRole($id)
    {
        $data = request_body();
        return json(AccountService::setRole($id, $data));
    }
    #[Route(path: '/api/tai-khoan/{id}', method: 'DELETE')]
    public static function delete($id)
    {
        return json(AccountService::deleteAccount($id));
    }
    #[Route(path: '/api/tai-khoan/{id}/chuyen-trang-thai', method: 'PATCH')]
    public static function changeStatus($id)
    {
        return json(AccountService::toggleLockAccount($id));
    }
}