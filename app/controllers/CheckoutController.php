<?php

use App\Core\App;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class CheckoutController
{

    #[Route("/thanh-toan", "GET")]
    public static function index()
    {
        return view("checkout");
    }
    #[Route("/thanh-toan/success", "GET")]
    public static function success()
    {
        return view("checkout-success");
    }
    #[Route("/thanh-toan", "POST")]
    public static function store()
    {

        $data = request_body();
        $payment_method = PaymentType::tryFrom($data['payment_method']);
        if (is_null($payment_method)) {
            return json(["message" => "Phương thức thanh toán không hợp lệ"], 400);
        }
        $paymentStrategy = getPaymentStrategy($payment_method);
        $payment = $paymentStrategy->createPayment(guidv4(), "100000", "thanh toan ve xem phim");
        return json($payment);
    }
}