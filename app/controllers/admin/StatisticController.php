<?php

use App\Core\Logger;
use App\Dtos\JsonResponse;
use App\Dtos\TrangThaiPhim;
use App\Services\CinemaService;
use App\Services\PhimService;
use App\Services\RoomService;
use App\Services\SeatService;
use App\Services\SeatTypeService;
use App\Services\ShowService;
use App\Services\StatisticService;
use App\Services\StatusService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class StatisticController
{
    #[Route(path: '/api/tong-quan/hoa-don', method: 'GET')]
    public static function countTotalBill()
    {
        $params = $_GET;
        $total = StatisticService::countTotalBill($params);
        return json(JsonResponse::ok($total));
    }
    #[Route(path: '/api/tong-quan/hoa-don/chi-tiet', method: 'GET')]
    public static function billStatistic()
    {
        $params = $_GET;
        $total = StatisticService::billStatistic($params);
        return json(JsonResponse::ok($total));
    }
    #[Route(path: '/api/tong-quan/hoa-don/tong-tien', method: 'GET')]
    public static function sumTotalBill()
    {
        $params = $_GET;
        $total = StatisticService::sumTotalBill($params);
        return json(JsonResponse::ok($total));
    }
    #[Route(path: '/api/tong-quan/phim/theo-gioi-han-do-tuoi', method: 'GET')]
    public static function sumOfEachFilmTag()
    {
        $result = StatisticService::sumOfEachFilmTag();
        return json(JsonResponse::ok($result));
    }
    #[Route(path: '/api/tong-quan/ve', method: 'GET')]
    public static function countTotalTicket()
    {
        $params = $_GET;
        $total = StatisticService::countTotalTicket($params);
        return json(JsonResponse::ok($total));
    }
    #[Route(path: '/api/tong-quan/ve/chi-tiet', method: 'GET')]
    public static function ticketStatistic()
    {
        $params = $_GET;
        $total = StatisticService::ticketStatistic($params);
        return json(JsonResponse::ok($total));
    }
}