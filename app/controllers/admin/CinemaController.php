<?php

use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Services\CinemaService;
use App\Services\RoomService;
use App\Services\StatusService;
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
    #[Route("/admin/rap-chieu","GET")]
    public static function quanLyRap(){
        $cinemaStatuses = StatusService::getAllStatus('RapChieu');
        return view("admin/rap-chieu/index",[

            'cinemaStatuses' => $cinemaStatuses
        ]);
    }

    #[Route("/ajax/rap-chieu","GET")]
    public static function getTableRowAjax(){
        $results = CinemaService::getAllCinemas($_GET);
        $cinemaStatuses = StatusService::getAllStatus('RapChieu');
        return ajax("admin/rap-chieu/table-row", [
            'cinemas' => $results,
            'cinemaStatuses' => $cinemaStatuses
        ]);
    }
    #[Route("/ajax/rap-chieu","POST")]
    public static function createCinema(){
        $result = CinemaService::createNewCinema($_POST);
            return json($result);
    }
}