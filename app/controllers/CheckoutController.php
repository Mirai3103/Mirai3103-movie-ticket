

<?php

use App\Core\App;
use Core\Attributes\Controller;
use Core\Attributes\Route;

#[Controller(path: "/thanh-toan")]
class CheckoutController
{

    #[Route("", "GET")]
    public function index()
    {
        return  view("checkout");
    }
}
