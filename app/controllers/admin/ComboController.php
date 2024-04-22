<?php

use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Services\CinemaService;
use App\Services\ComboService;
use App\Services\RoomService;
use App\Services\StatusService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class ComboController
{
    #[Route("/admin/combo", "GET")]
    public static function index()
    {
        $statuses = StatusService::getAllStatus('Combo');
        return view("admin/combo/index", ['statuses' => $statuses]);
    }
    #[Route("/api/combo", "POST")]
    public static function create()
    {
        $result = ComboService::createNewFoodnDrink($_POST);
        return json($result);
    }
    #[Route("/api/combo/{id}", "GET")]
    public static function get($id)
    {
        $product = ComboService::getFoodnDrinkById($id);
        return json(JsonResponse::ok($product));
    }

    #[Route("/api/combo/{id}", "POST")]
    public static function update($id)
    {
        $result = ComboService::updateFoodnDrink($_POST, $id);
        return json($result);
    }
    #[Route("/api/combo/{id}/delete", "POST")]
    public static function tryDelete($id)
    {
        $result = ComboService::deleteFoodnDrink($id);
        return json($result);
    }
    #[Route("/ajax/combo", "GET")]
    public static function getProducts()
    {
        $products = ComboService::getAllFoodnDrink($_GET);
        $statuses = StatusService::getAllStatus('Combo');
        return ajax("admin/combo/table-row", ['products' => $products, 'statuses' => $statuses]);
    }

}