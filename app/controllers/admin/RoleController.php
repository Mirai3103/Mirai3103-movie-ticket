<?php

use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Services\CinemaService;
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
        return view('admin/role/add');
    }
    #[Route("/admin/nhom-quyen/{id}/sua", "GET")]
    public static function edit($id)
    {
        $role = RoleService::getRoleById($id);
        return view('admin/role/edit', ['role' => $role]);
    }


}