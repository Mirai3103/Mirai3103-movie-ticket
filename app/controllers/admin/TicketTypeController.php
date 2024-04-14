<?php

use Core\Attributes\Route;

class TicketTypeController
{


    #[Route("/admin/loai-ve", "GET")]
    public static function index()
    {
        return view('admin/loai-ve/index');
    }

}