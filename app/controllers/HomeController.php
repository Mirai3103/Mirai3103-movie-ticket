<?php

use App\Core\Database\QueryBuilder;
use App\Services\CategoryService;
use App\Services\PhimService;
use App\Services\SeatTypeService;
use App\Services\ShowService;
use App\Services\TicketService;
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
        $phims = PhimService::getPhimDangChieu();
        $commingMovies = PhimService::getPhimSapChieu();
        return view("home", ["phims" => $phims, "commingMovies" => $commingMovies]);
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
    #[Route("/phim/{id}", "GET")]
    public static function chiTietPhim($id)
    {
        $id = intval($id);
        $phim = PhimService::getPhimById($id);
        $categories = CategoryService::getCategoriesByMovieId($id);
        $upcomingShows = ShowService::getUpcomingShowsOfMovie($id);
        $ticketTypes = TicketService::getTicketTypes();
        $seatTypes = SeatTypeService::getAllSeatType();
        return view("chi-tiet", [
            "phim" => $phim,
            "categories" => $categories,
            "upcomingShows" => $upcomingShows,
            "ticketTypes" => $ticketTypes,
            "seatTypes" => $seatTypes
        ]);
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
    #[Route("/trang-chu/tim-kiem", "GET")]
    public static function search()
    {
        return view("tim-kiem");
    }
    #[Route("/dang-xuat", "GET")]
    public static function logout()
    {
        unset($_SESSION['user']);
        setcookie("user", "", time() - 3600);
        return redirect("trang-chu");
    }
    #[Route("/test", "GET")]
    public static function test()
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder->select(
            [
                'PhongChieu.MaPhongChieu' => 'PhongChieu.MaPhongChieu',
                'PhongChieu.TenPhongChieu' => 'PhongChieu.TenPhongChieu',
                'PhongChieu.ManHinh' => 'PhongChieu.ManHinh',
                'PhongChieu.ChieuDai' => 'PhongChieu.ChieuDai',
                'PhongChieu.ChieuRong' => 'PhongChieu.ChieuRong',
                'RapChieu.MaRapChieu' => 'RapChieu.MaRapChieu',
                'RapChieu.TenRapChieu' => 'RapChieu.TenRapChieu',
                'RapChieu.DiaChi' => 'RapChieu.DiaChi',
                'RapChieu.TrangThai' => 'RapChieu.TrangThai'
            ]
        )->from('PhongChieu')
            ->join('RapChieu', 'PhongChieu.MaRapChieu = RapChieu.MaRapChieu');
        $data = $queryBuilder->get();
        return json($queryBuilder->parseMany($data, [
            'root' => 'RapChieu',
            'embed' => ['PhongChieu'],
            "groupBy" => "MaRapChieu"
        ]));

    }

}