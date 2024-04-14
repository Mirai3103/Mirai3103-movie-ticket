<?php

use App\Models\JsonResponse;
use App\Services\CinemaService;
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
    #[Route(path: '/admin/suat-chieu/them', method: 'GET')]
    public static function add()
    {
        return view('admin/show/add');
    }
}