<?php

use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Services\CinemaService;
use App\Services\PhimService;
use App\Services\RoomService;
use App\Services\ShowService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class MovieController
{

    #[Route("/api/phim/tim-kiem-nang-cao", "POST")]
    public static function advancedSearch()
    {
        $data = request_body();
        // example data
        //  {
        //             'tu-khoa': keyword,
        //             'the-loais': theloais,
        //             'raps': rapchieus,
        //             'thoi-gian-tu': showFrom,
        //             'thoi-gian-den': showTo,
        //             'thoi-luong-tu': durrationFrom,
        //             'thoi-luong-den': durrationTo,
        //             'sap-xep': sortBy,
        //             'thu-tu': sort
        //         }
        $phims = ShowService::advanceSearch($data) ?? [];
        return json(JsonResponse::ok($phims));
    }

}