

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
    #[Route("success", "GET")]
    public function success()
    {
        return  view("checkout-success");
    }
    #[Route("", "POST")]
    public function store()
    {

        $data = request_body();
        $payment_method = PaymentType::tryFrom($data['payment_method']);
        if (is_null($payment_method)) {
            return json(["message" => "Phương thức thanh toán không hợp lệ"], 400);
        }
        $paymentStrategy = getPaymentStrategy($payment_method);
        $payment = $paymentStrategy->createPayment(guidv4(), "100000", "Thanh toán vé xem phim");
        return json($payment);
    }
}
