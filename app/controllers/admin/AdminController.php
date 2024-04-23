<?php

use App\Core\Logger;
use App\Models\JsonResponse;
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

        return view("admin/cai-dat-website/index");
    }
    #[Route("/api/cai-dat-website/banners", "POST")]
    public static function updateBanners()
    {
        ConfigService::updateBanners(request_body());
        return json(JsonResponse::ok());
    }
    #[Route("/api/cai-dat-website/info", "POST")]
    public static function updateInfo()
    {
        ConfigService::updateWebsiteConfig(request_body());
        return json(JsonResponse::ok());
    }
    #[Route("/admin/logs", "GET")]
    public static function getLogs()
    {
        echo nl2br(Logger::getLogs());
        die(200);
    }

}