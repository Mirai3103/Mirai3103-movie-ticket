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

        $cinemas = CinemaService::getAllCinemas([
        ]);
        $movies = PhimService::getTatCaPhim([
            'trang-thais' => [TrangThaiPhim::DangChieu->value, TrangThaiPhim::SapChieu->value],
        ]);
        $showStatuses = StatusService::getAllStatus('SuatChieu');
        return view('admin/show/index', [
            'cinemas' => $cinemas,
            'movies' => $movies,
            'showStatuses' => $showStatuses
        ]);
    }
    #[Route(path: '/api/suat-chieu', method: 'GET')]
    public static function getShows()
    {
        $shows = ShowService::getAllShows($_GET);
        return json(JsonResponse::ok($shows));
    }

    #[Route(path: '/admin/suat-chieu/them', method: 'GET')]
    public static function addView()
    {

        $cinemas = CinemaService::getAllCinemas([
        ]);
        $movies = PhimService::getTatCaPhim([
            'trang-thais' => [TrangThaiPhim::DangChieu->value, TrangThaiPhim::SapChieu->value],
        ]);
        $showStatuses = StatusService::getAllStatus('SuatChieu');
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
    #[Route(path: '/admin/suat-chieu/{id}/sua', method: 'GET')]
    public static function editView($id)
    {
        $canEdit = ShowService::canEditShow($id);
        if (!$canEdit) {
            redirect('admin/suat-chieu');
        }
        $show = ShowService::getShowById($id);
        $cinemas = CinemaService::getAllCinemas([
        ]);
        $currentCinema = CinemaService::getCinemaByRoomId($show['MaPhongChieu']);
        $movies = PhimService::getTatCaPhim([
            'trang-thais' => [TrangThaiPhim::DangChieu->value, TrangThaiPhim::SapChieu->value],
        ]);
        $showStatuses = StatusService::getAllStatus('SuatChieu');
        return view('admin/show/edit', [
            'show' => $show,
            'cinemas' => $cinemas,
            'movies' => $movies,
            'showStatuses' => $showStatuses,
            'currentCinema' => $currentCinema,
        ]);
    }

    #[Route(path: '/admin/suat-chieu/{id}/sua', method: 'POST')]
    public static function update($id)
    {
        return json(ShowService::editShow($id, request_body()));
    }
    #[Route(path: '/admin/suat-chieu/{id}/ban-ve', method: 'PATCH')]
    public static function toggleSellTicket($id)
    {
        return json(ShowService::toggleSellTicked($id));
    }
    #[Route(path: '/admin/suat-chieu/{id}', method: 'DELETE')]
    public static function delete($id)
    {
        return json(ShowService::deleteShow($id));
    }

    #[Route(path: '/admin/suat-chieu/{id}/can-edit', method: 'GET')]
    public static function canEdit($id)
    {
        return json(JsonResponse::ok([
            'canEdit' => ShowService::canEditShow($id)
        ]));
    }

}