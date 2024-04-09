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
    #[Route("/pay/callback/momo", "GET")]
    public static function momoCallback()
    {
        $paymentStrategy = getPaymentStrategy(PaymentType::Momo);
        $paymentStrategy->callback($_GET);
        echo "Momo callback";
    }
    #[Route("/pay/callback/zalopay", "GET")]
    public static function zalopayCallback()
    {
        // $paymentStrategy = getPaymentStrategy(PaymentType::ZaloPay);
        // $paymentStrategy->callback();
    }

}