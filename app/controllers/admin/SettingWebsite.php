<?php

use App\Models\JsonResponse;
use App\Services\SeatService;
use App\Services\SeatTypeService;
use App\Services\StatusService;
use Core\Attributes\Route;

class SettingWebsite {
    #[Route("/api/cai-dat-website", "GET")]
    public function abc() {
        return view("admin/cai-dat-website/index");
    }
}