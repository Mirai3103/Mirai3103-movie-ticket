<?php

use App\Core\App;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class UserController
{
    #[Route("/nguoi-dung/is-mail-exist", "POST")]
    public static function isMailExist()
    {
        $body = request_body();
        $email = $body['email'];
        return json(["message" => "Email hợp lệ"]);
    }
}