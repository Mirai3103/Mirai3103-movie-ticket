<?php

use App\Services\PhimService;
use App\Services\UserService;
use Core\Attributes\Route;


class HomeController
{
    #[Route("/", "GET")]
    public static function index()
    {
        $phims = PhimService::getPhimDangChieu();
        $commingMovies = PhimService::getPhimSapChieu();
        return view("home", ["phims" => $phims, "commingMovies" => $commingMovies]);
    }
    #[Route("/trang-chu", "GET")]
    public static function home()
    {
        return view("home");
    }
    #[Route("/dang-nhap", "GET")]
    public static function login()
    {
        if (isset($_SESSION['user'])) {
            return redirect("trang-chu");
        }
        return view("login");
    }

    #[Route("/dang-nhap", "POST")]
    public static function loginPost()
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
    public static function register()
    {
        $body = request_body();
        return json(UserService::register($body));
    }
    #[Route("/trang-chu/lich-chieu", "GET")]
    public static function lichChieu()
    {
        return view("lich-chieu");
    }
    #[Route("/dang-xuat", "GET")]
    public static function logout()
    {
        unset($_SESSION['user']);
        setcookie("user", "", time() - 3600);
        return redirect("trang-chu");
    }
}