<?php

use App\Core\Logger;
use App\Models\JsonResponse;
use App\Models\TrangThaiPhim;
use App\Services\CinemaService;
use App\Services\PhimService;
use App\Services\RoomService;
use App\Services\SeatService;
use App\Services\SeatTypeService;
use App\Services\ShowService;
use App\Services\StatusService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class ShowController
{
    #[Route(path: '/admin/suat-chieu', method: 'GET')]
    public static function index()
    {

        return view('admin/show/index');
    }
    #[Route(path: '/api/suat-chieu', method: 'GET')]
    public static function getShows()
    {
        $shows = ShowService::getAllShows($_GET);
        return json(JsonResponse::ok($shows));
    }

    #[Route(path: '/admin/suat-chieu/them', method: 'GET')]
    public static function add()
    {

        $cinemas = CinemaService::getAllCinemas([
        ]);
        $movies = PhimService::getTatCaPhim([
            'trang-thais' => [TrangThaiPhim::DangChieu->value, TrangThaiPhim::SapChieu->value],
        ]);
        $showStatuses = StatusService::getAllStatus('SuatChieu');
        Logger::info(count($cinemas));
        return view('admin/show/add', [
            'cinemas' => $cinemas,
            'movies' => $movies,
            'showStatuses' => $showStatuses
        ]);
    }
    #[Route(path: '/admin/suat-chieu/them', method: 'POST')]
    public static function save()
    {

        return json(ShowService::createShow(request_body()));
    }
}