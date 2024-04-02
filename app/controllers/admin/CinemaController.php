<?php

use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Services\CinemaService;
use App\Services\RoomService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class CinemaController
{

    #[Route("/api/rap", "GET")]
    public static function getCinemas()
    {
        $results = CinemaService::getAllCinemas();
        return json(JsonResponse::ok($results));
    }
    #[Route("/api/rap/ids", "POST")]
    public static function getCinemasInIds()
    {
        if (!isset(request_body()["ids"])) {
            return json(new JsonResponse(400, "Missing ids"));
        }
        $results = CinemaService::getCinemasInIds(request_body()["ids"]);
        return json(JsonResponse::ok($results));
    }
    #[Route("/api/phong-chieu/ids/rap", "POST")]
    public static function getCinemasByRoomIds()
    {
        if (!isset(request_body()["roomIds"])) {
            return json(new JsonResponse(400, "Missing roomIds"));
        }
        $results = CinemaService::getCinemasByRoomIds(request_body()["roomIds"]);
        return json(JsonResponse::ok($results));
    }

}