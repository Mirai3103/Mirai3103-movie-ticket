<?php

use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Services\CinemaService;
use App\Services\RoomService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class ProductController {
    #[Route("/admin/san-pham","GET")]
    public static function abc() {
        return view("admin/san-pham/index");
    }
}