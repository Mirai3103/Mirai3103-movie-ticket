<?php

use App\Core\Logger;
use App\Dtos\JsonResponse;
use App\Dtos\Permission;
use App\Services\ConfigService;
use Core\Attributes\Route;

class AdminController
{
    #[Route(path: '/admin', method: 'GET')]
    public static function home()
    {
        needEmployee();
        return view('admin/index');
    }
    #[Route("/admin/cai-dat-website", "GET")]
    public static function setting()
    {
        needAnyPermissionOrDie([Permission::CONFIG_WEBSITE]);

        return view("admin/cai-dat-website/index");
    }
    #[Route("/api/cai-dat-website/banners", "POST")]
    public static function updateBanners()
    {
        needAnyPermissionOrDie([Permission::CONFIG_WEBSITE]);
        ConfigService::updateBanners(request_body());
        return json(JsonResponse::ok());
    }
    #[Route("/api/cai-dat-website/info", "POST")]
    public static function updateInfo()
    {
        needAnyPermissionOrDie([Permission::CONFIG_WEBSITE]);
        ConfigService::updateWebsiteConfig(request_body());
        return json(JsonResponse::ok());
    }
    #[Route("/admin/logs", "GET")]
    public static function getLogs()
    {
        needAnyPermissionOrDie([Permission::CONFIG_WEBSITE]);
        echo nl2br(Logger::getLogs());
        die(200);
    }

}