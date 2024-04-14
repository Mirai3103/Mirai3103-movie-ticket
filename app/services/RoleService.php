<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Models\TrangThaiKhuyenMai;

class RoleService
{

    public static function getAllRole()
    {
        $roles = Database::findAll("NhomQuyen");
        return $roles;
    }
    public static function getRoleById($id)
    {
        $role = Database::queryOne("SELECT * FROM NhomQuyen WHERE MaNhomQuyen = ?", [$id]);
        return $role;
    }
    public static function addRole($role)
    {
        $permissionIds = $role['Quyen'];
        $id = Database::insert("NhomQuyen", [
            'TenNhomQuyen' => $role['TenNhomQuyen'],
            'MoTa' => $role['MoTa']
        ]);
        self::addListPermissionToRole($id, $permissionIds);
    }
    public static function addListPermissionToRole($roleId, $permissionIds)
    {
        foreach ($permissionIds as $permissionId) {
            Database::insert("CT_NhomQuyen_Quyen", [
                'MaNhomQuyen' => $roleId,
                'MaQuyen' => $permissionId
            ]);
        }
    }
    public static function updateRole($role)
    {
        $permissionIds = $role['Quyen'];
        Database::update(
            "NhomQuyen",
            [
                'TenNhomQuyen' => $role['TenNhomQuyen'],
                'MoTa' => $role['MoTa']
            ],
            "MaNhomQuyen = " . $role["MaNhomQuyen"]
        );
        Database::execute("DELETE FROM CT_NhomQuyen_Quyen WHERE MaNhomQuyen = ?", [$role["MaNhomQuyen"]]);
        self::addListPermissionToRole($role["MaNhomQuyen"], $permissionIds);
    }
    public static function deleteRole($id)
    {
        Database::execute("DELETE FROM NhomQuyen WHERE MaNhomQuyen = ?", [$id]);

    }

}