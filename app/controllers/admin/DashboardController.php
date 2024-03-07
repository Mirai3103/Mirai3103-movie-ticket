<?php

use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller(path: "/admin")]
class DashboardController
{
    #[Route("", "GET")]
    public function index()
    {
        require_once "src/views/admin/index.php";
    }
    #[Route("/{id1}/check/{id2}", "GET")]
    public function product($params)
    {
        print_r($params);
        echo "/{id1}/check/{id2}", "GET";
    }
    #[Route("/{id1}", "GET")]
    public function edit($params)
    {
        print_r($params);
        echo "/{id1}", "GET";
    }
}
