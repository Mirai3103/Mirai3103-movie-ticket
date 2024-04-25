<?php

use App\Services\StatusService;
use App\Services\TicketService;
use Core\Attributes\Route;

class TicketTypeController
{


    #[Route("/admin/loai-ve", "GET")]
    public static function index()
    {
        $ticketTypes = TicketService::getTicketTypes();
        $ticketTypesStatus = StatusService::getAllStatus('LoaiVe');
        return view('admin/loai-ve/index', [
            'ticketTypes' => $ticketTypes,
            'ticketTypesStatus' => $ticketTypesStatus
        ]);
    }
    #[Route("/api/loai-ve", "GET")]
    public static function getTicketTypes()
    {
        $ticketTypes = TicketService::getTicketTypes();
        return json($ticketTypes);
    }
    #[Route("/api/loai-ve/{id}", "GET")]
    public static function getTicketTypeById($id)
    {
        $ticketType = TicketService::getTicketTypeById($id);
        return json($ticketType);
    }


    #[Route("/ajax/loai-ve", "POST")]
    public static function create()
    {
        $result = TicketService::createNewTicketType($_POST);
        return json($result);
    }
    #[Route("/ajax/loai-ve/{id}/sua", "POST")]
    public static function update($id)
    {
        $result = TicketService::updateTicketType($_POST, $id);
        return json($result);
    }
    #[Route("/ajax/loai-ve/{id}/toggleHienThi", "POST")]
    public static function toggleHienThi($id)
    {
        $result = TicketService::toggleHideTicketType($id);
        return json($result);
    }

}