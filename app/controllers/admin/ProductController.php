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
        $statuses = StatusService::getAllStatus('ThucPham');
        return view("admin/san-pham/index", ['statuses' => $statuses]);
    }
    #[Route("/api/san-pham", "POST")]
    public static function create()
    {
        $result = ComboService::createNewFoodnDrink($_POST);
        return json($result);
    }
    #[Route("/api/san-pham/{id}", "GET")]
    public static function get($id)
    {
        $product = ComboService::getFoodnDrinkById($id);
        return json(JsonResponse::ok($product));
    }

    #[Route("/api/san-pham/{id}", "POST")]
    public static function update($id)
    {
        $result = ComboService::updateFoodnDrink($_POST, $id);
        return json($result);
    }
    #[Route("/ajax/san-pham", "GET")]
    public static function getProducts()
    {
        $products = ComboService::getAllFoodnDrink($_GET);
        $statuses = StatusService::getAllStatus('ThucPham');
        return ajax("admin/san-pham/table-row", ['products' => $products, 'statuses' => $statuses]);
    }

}