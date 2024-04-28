<?php

use App\Services\OrderService;
use Core\Attributes\Route;

class BillController
{
    #[Route(path: '/admin/hoa-don', method: 'GET')]
    public static function index()
    {
        return view('admin/bill/index');
    }
    #[Route(path: '/admin/hoa-don/{id}', method: 'GET')]
    public static function detail($id)
    {
        $order = OrderService::getOrderById($id);
        return view('admin/bill/detail', ['order' => $order]);
    }
    #[Route("/api/hoa-don", "GET")]
    public static function getAllOrder()
    {
        $orders = OrderService::searchOrder($_GET);
        return json($orders);
    }
    #[Route("/api/hoa-don/{id}", "GET")]
    public static function getOrder($id)
    {
        $order = OrderService::getOrderById($id);
        return json($order);
    }
    #[Route("/api/nguoi-dung/hoa-don", "GET")]

    public static function getMyOrder()
    {
        needLogin();
        return view("admin/order/my-order");
    }
}