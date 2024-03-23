<?php

use App\Core\App;
use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller(path: "/nguoi-dung")]
class UserController
{
    #[Route("/is-mail-exist", "POST")]
    public function isMailExist()
    {
        $body = request_body();
        $email = $body['email'];

        return json(["message" => "Email hợp lệ"]);
    }
}
