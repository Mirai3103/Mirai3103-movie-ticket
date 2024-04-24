<?php

use App\Core\App;
use App\Core\Request;
use App\Models\JsonResponse;
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



    #[Route("/api/nguoi-dung/lich-su-dat-ve", "GET")]
    public static function abc()
    {
        $userId = Request::getUser()['MaNguoiDung'];
        // $user = UserService::
        return view("nguoi-dung/lich-su-dat-ve/index");
    }

    #[Route("/api/nguoi-dung/thong-tin", "GET")]
    public static function hienThiThongTinNguoiDung()
    {
        $userId = Request::getUser()['MaNguoiDung'];
        $user = UserService::getUserInfo($userId);
        return view("nguoi-dung/thong-tin/index", [
            "userif"=>$user
        ]);
    }

    #[Route("/api/nguoi-dung/thong-tin", "POST")]
    public static function capnhatnguoidung()
    {
        $userId = Request::getUser()['MaNguoiDung'];
        $newInfo = request_body() ;
        $result = UserService::updateUser($userId, $newInfo);
        return view("nguoi-dung/thong-tin/index", [
            "userif"=>$user
        ]);
    }
    // /nguoi-dung/thong-tin Post, Get
    // /api/nguoi-dung/mat-khau Post

}