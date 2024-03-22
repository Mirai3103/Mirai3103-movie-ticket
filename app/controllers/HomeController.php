<?php

use App\Core\App;
use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller(path: "/trang-chu")]
class HomeController
{
    #[Route("", "GET")]
    public function index()
    {
        $phims = App::get('phimService')->getPhimDangChieu();
        return  view("home", ["phims" => $phims]);
    }
    #[Route("/product/{id}", "GET")]
    public function product($params)
    {
        $id = $params[1];
        echo 'dynamic route with id: <br>';
        echo "Product id: $id";
    }
    #[Route("/json", "GET")]
    public function json()
    {
        return json(["message" => "Hello world"]);
    }
    #[Route("/dang-nhap", "GET")]
    public function login()
    {
        return view("login");
    }
    #[Route("/lich-chieu", "GET")]
    public function lichChieu()
    {
        return view("lich-chieu");
    }
}
