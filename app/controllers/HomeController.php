<?php

use App\Core\App;
use App\Services\PhimService;
use App\Services\UserService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller(path: "/trang-chu")]
class HomeController
{
    #[Route("", "GET")]
    public function index()
    {
        $phims = PhimService::getPhimDangChieu();
        $commingMovies = PhimService::getPhimSapChieu();
        return  view("home", ["phims" => $phims, "commingMovies" => $commingMovies]);
    }
    #[Route("/dang-nhap", "GET")]
    public function login()
    {
        if (isset($_SESSION['user'])) {
            return redirect("trang-chu");
        }
        return view("login");
    }

    #[Route("/dang-nhap", "POST")]
    public function loginPost()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $loginResult = UserService::login($username, $password);
        if ($loginResult->isSuccessful()) {
            $_SESSION['user'] = $loginResult->data;
            if (isset($_POST['remember'])) {
                setcookie("user", json_encode($loginResult->data), time() + 86400 * 30);
            }
            return redirect("trang-chu");
        }
        return view("login", ["error" => $loginResult->message]);
    }


    #[Route("/dang-ky", "POST")]
    public function register()
    {
        $body = request_body();
        return json(UserService::register($body));
    }
    #[Route("/lich-chieu", "GET")]
    public function lichChieu()
    {
        return view("lich-chieu");
    }
}
