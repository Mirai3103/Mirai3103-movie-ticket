<?php

use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Services\CinemaService;
use App\Services\ComboService;
use App\Services\RoomService;
use App\Services\StatusService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class ProductController
{
    #[Route("/admin/san-pham", "GET")]
    public static function index()
    {

        return view("admin/san-pham/index");
    }

    #[Route("/ajax/san-pham", "GET")]
    public static function getProducts()
    {
        $products = ComboService::getAllFoodnDrink($_GET);
        $statuses = StatusService::getAllStatus('ThucPham');
        return ajax("admin/san-pham/table-row", ['products' => $products, 'statuses' => $statuses]);    
    }

}