<?php

use App\Core\App;
use Core\Attributes\Controller;
use Core\Attributes\Route;


class PayController
{
    #[Route("/pay/momo", "GET")]
    public static function index()
    {

        $paymentStrategy = getPaymentStrategy(PaymentType::Momo);
        // $paymentStrategy->createPayment(guidv4(), "100000", "Thanh toán vé xem phim");
        return view("pay");
    }
}