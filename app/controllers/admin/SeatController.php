<?php

use App\Models\JsonResponse;
use App\Services\SeatService;
use App\Services\SeatTypeService;
use App\Services\StatusService;
use Core\Attributes\Route;


class SeatController
{
    #[Route("/api/ghe/tao-nhieu", "POST")]
    public static function createManySeats()
    {
        $data = request_body();
        $result = SeatService::createSeats($data);
        return json($result);
    }
    #[Route("/api/ghe/cap-nhat-nhieu", "PUT")]
    public static function updateManySeats()
    {
        $data = request_body();
        $result = SeatService::updateOfRoom($data);
        return json($result);
    }
    #[Route("/api/loai-ghe", "GET")]
    public static function getAllSeatType()
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
    #[Route("/api/suat-chieu/{id}/ghe", "GET")]
    public static function getSeatsByShowId($id)
    {
        return json(JsonResponse::ok(SeatService::getAllOfShow($id)));
    }

    #[Route("/admin/loai-ghe", "GET")]
    public static function index()
    {
        $seatTypes = SeatTypeService::getAllSeatType();
        $seatTypesStatus = StatusService::getAllStatus('LoaiGhe');
        return view('admin/loai-ghe/index', [
            'seatTypes' => $seatTypes,
            'seatTypesStatus' => $seatTypesStatus
        ]);
    }

    #[Route("/api/loai-ghe/{id}", "GET")]
    public static function getSeatTypeById($id)
    {
        $seatType = SeatTypeService::getSeatTypeById($id);
        return json($seatType);
    }


    #[Route("/ajax/loai-ghe", "POST")]
    public static function create()
    {
        $result = SeatTypeService::createNewSeatType($_POST);
        return json($result);
    }
    #[Route("/ajax/loai-ghe/{id}/sua", "POST")]
    public static function update($id)
    {
        $result = SeatTypeService::updateSeatType($_POST, $id);
        return json($result);
    }
    #[Route("/ajax/loai-ghe/{id}/toggleHienThi", "POST")]
    public static function toggleHienThi($id)
    {
        $result = SeatTypeService::toggleHideSeatType($id);
        return json($result);
    }
}