<?php

use App\Core\App;
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
    // /nguoi-dung/thong-tin Post, Get
    // /api/nguoi-dung/mat-khau Post
}