<?php

use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller(path: "/trang-chu")]
class HomeController
{
    #[Route("", "GET")]
    public function index()
    {
        return  view("home");
    }
    #[Route("/product/{id}", "GET")]
    public function product($params)
    {
        $id = $params[1];
        echo 'dynamic route with id: <br>';
        echo "Product id: $id";
    }
}
