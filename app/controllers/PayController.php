<?php

use App\Core\App;
use Core\Attributes\Controller;
use Core\Attributes\Route;


#[Controller(path: "/pay")]
class PayController
{
    #[Route("/momo", "GET")]
    public function index()
    {
        include_once "app/services/payments/index.php";

        $paymentStrategy = getPaymentStrategy(PaymentType::Momo);
        // $paymentStrategy->createPayment(guidv4(), "100000", "Thanh toán vé xem phim");
        return  view("pay");
    }
}
