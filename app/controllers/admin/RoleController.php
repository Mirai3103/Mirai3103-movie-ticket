<?php

use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Services\CinemaService;
use App\Services\PermissionService;
use App\Services\PhimService;
use App\Services\RoleService;
use App\Services\RoomService;
use App\Services\ShowService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class RoleController
{

    #[Route("/admin/nhom-quyen", "GET")]
    public static function index()
    {
        $roles = RoleService::getAllRole();
        return view('admin/role/index', ['roles' => $roles]);
    }
    #[Route("/admin/nhom-quyen/them", "GET")]
    public static function add()
    {
        $permissions = PermissionService::getAllPermissions();
        return view('admin/role/add', ['permissions' => $permissions]);
    }
    #[Route("/admin/nhom-quyen/them", "POST")]
    public static function save()
    {
        $data = request_body();
        $result = RoleService::addRole([
            "Quyen" => $data['permissions'],
            "TenNhomQuyen" => $data['tennhomquyen'],
            "MoTa" => $data['description']
        ]);
        if ($result) {
            return JsonResponse::ok([
                "MaNhomQuyen" => $result
            ]);
        } else {
            return json(JsonResponse::error("Thêm nhóm quyền thất bại"));
        }
    }
    #[Route("/admin/nhom-quyen/{id}/sua", "GET")]
    public static function edit($id)
    {
        $role = RoleService::getRoleById($id);
        $permissions = PermissionService::getAllPermissions();
        return view('admin/role/update', ['role' => $role, 'permissions' => $permissions]);
    }
    #[Route("/admin/nhom-quyen/{id}/sua", "PUT")]
    public static function update($id)
    {
        $data = request_body();
        RoleService::updateRole([
            "Quyen" => $data['permissions
            '],
            "MaNhomQuyen" => $id,
            "TenNhomQuyen" => $data['tennhomquyen'],
            "MoTa" => $data['description']
        ]);
        return JsonResponse::ok();

    }


}