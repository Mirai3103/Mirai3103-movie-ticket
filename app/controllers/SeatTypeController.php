<?php

use App\Models\JsonResponse;
use App\Services\SeatTypeService;
use Core\Attributes\Route;


class SeatTypeController
{
    #[Route("/api/loai-ghe", "GET")]
    public static function index()
    {

        return json(JsonResponse::ok(SeatTypeService::getAllSeatType()));
    }
    #[Route("/api/loai-ghe/ids", "POST")]
    public static function getSeatTypeByIds()
    {
        if (!isset(request_body()['ids'])) {
            return json(new JsonResponse(400, "Missing ids parameter"));
        }
        return json(JsonResponse::ok(SeatTypeService::getSeatTypeByIds(request_body()['ids'])));
    }
}