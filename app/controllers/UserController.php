<?php

use App\Core\App;
use App\Core\Request;
use App\Models\JsonResponse;
use App\Services\AccountService;
use App\Services\UserService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class UserController
{
    #[Route("/api/nguoi-dung/is-mail-exist", "POST")]
    public static function isMailExist()
    {
        $body = request_body();
        $email = $body['email'];
        $result = UserService::isMailExist($email);
        return json(JsonResponse::ok($result));
    }



    #[Route("/nguoi-dung/lich-su-dat-ve", "GET")]
    public static function hienThiLichSuDatVe()
    {
        $userId = Request::getUser()['MaNguoiDung'];
        // $user = UserService::
        return view("nguoi-dung/lich-su-dat-ve/index");
    }

    #[Route("/nguoi-dung/thong-tin", "GET")]
    public static function hienThiThongTinNguoiDung()
    {
        $userId = Request::getUser()['MaNguoiDung'];
        $user = UserService::getUserInfo($userId);
        return view("nguoi-dung/thong-tin/index", [
            "userif" => $user
        ]);
    }

    #[Route("/api/nguoi-dung/thong-tin", "POST")]
    public static function capnhatnguoidung()
    {
        $userId = Request::getUser()['MaNguoiDung'];
        $newInfo = request_body();
        $result = UserService::updateUser($userId, $newInfo);
        if ($result) {
            return json(JsonResponse::ok());
        } else {
            return json(JsonResponse::error('Cập nhật người dùng thất bại'));
        }
    }

    #[Route('/api/nguoi-dung/mat-khau', 'POST')]
    public static function doimatkhaunguoidung()
    {
        $userId = Request::getUser()['MaNguoiDung'];

        $matKhauCu = $_POST["matKhauCu"];
        $matKhauMoi = $_POST["matKhauMoi"];
        $xacThucMatKhauMoi = $_POST["xacThucMatKhauMoi"];

        if ($matKhauMoi !== $xacThucMatKhauMoi) {
            return json(JsonResponse::error("Mật khẩu không trùng khớp"));
        }

        $result = AccountService::updatePassword($userId, $matKhauCu, $matKhauMoi);
        if ($result) {
            return json(JsonResponse::ok());
        } else {
            return json(JsonResponse::error("Thay đổi mật khẩu thất bại"));
        }
    }


}