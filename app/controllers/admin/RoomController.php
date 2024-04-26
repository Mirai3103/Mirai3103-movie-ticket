<?php

use App\Dtos\JsonResponse;
use App\Services\CinemaService;
use App\Services\RoomService;
use App\Services\SeatService;
use App\Services\SeatTypeService;
use App\Services\StatusService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class RoomController
{
    #[Route("/admin/phong-chieu", "GET")]
    public static function index()
    {
        $results = RoomService::getAllRooms($_GET);
        $cinemas = CinemaService::getAllCinemas();
        return view("admin/room/index", [
            'rooms' => $results['rooms'],
            'total' => $results['total'],
            'cinemas' => $cinemas
        ]);
    }
    #[Route("/api/phong-chieu", "GET")]
    public static function getRooms()
    {
        $results = RoomService::getAllRooms($_GET);
        header("X-Total-Count: " . $results['total']);
        return json(JsonResponse::ok($results['rooms']));
    }

    #[Route("/admin/phong-chieu/them", "GET")]
    public static function create()
    {
        $cinemas = CinemaService::getAllCinemas();
        $status = StatusService::getAllStatus('PhongChieu');
        $seatTypes = SeatTypeService::getAllSeatType();
        return view("admin/room/create", [
            'cinemas' => $cinemas,
            'statuses' => $status,
            'seatTypes' => $seatTypes
        ]);
    }
    #[Route("/api/phong-chieu", "POST")]
    public static function createRoom()
    {
        $data = request_body();
        $result = RoomService::createRoom($data);
        return json($result);
    }
    #[Route("/admin/phong-chieu/{id}/sua", "GET")]
    public static function update($id)
    {
        $cinemas = CinemaService::getAllCinemas();
        $status = StatusService::getAllStatus('PhongChieu');
        $seatTypes = SeatTypeService::getAllSeatType();
        $seats = SeatService::getSeatsByRoomId(intval($id));
        $room = RoomService::getRoomById(intval($id));
        return view("admin/room/update", [
            'cinemas' => $cinemas,
            'statuses' => $status,
            'seatTypes' => $seatTypes,
            'seats' => $seats,
            'room' => $room
        ]);
    }
    #[Route("/admin/phong-chieu/{id}/sua", "POST")]
    public static function updateRoom($id)
    {
        $data = request_body();
        $result = RoomService::updateRoom(intval($id), $data);
        return json($result);
    }

    #[Route("/api/phong-chieu/ids", "POST")]
    public static function getRoomsByIds()
    {
        $data = request_body();
        $ids = $data['ids'];
        $rooms = RoomService::getRoomByIds($ids);
        return json(JsonResponse::ok($rooms));
    }
    #[Route("/admin/rap-chieu/{id}/phong-chieu", "GET")]
    public static function getRoomsByCinemaId($id)
    {
        $rooms = RoomService::getAllRoomOfCinema(intval($id), $_GET);
        return json(JsonResponse::ok($rooms));
    }
}