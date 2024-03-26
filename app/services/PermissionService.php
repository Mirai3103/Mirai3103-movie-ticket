<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;


class PermissionService
{
    public static function getAllPermissions()
    {
        $permissions = Database::findAll("Quyen");
        return $permissions;
    }
}
