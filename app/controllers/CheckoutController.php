<?php

use App\Core\App;
use App\Core\Database\Database;
use App\Models\JsonResponse;
use App\Services\ComboService;
use App\Services\SeatService;
use App\Services\ShowService;
use App\Services\TicketService;
use Core\Attributes\Controller;
use Core\Attributes\Route;

class CheckoutController
{

    #[Route("/api/start-checkout", "POST")]
    public static function startCheckout()
    {
        $data = request_body();


        $result = TicketService::startCheckout($data);

        return json($result);
    }
    #[Route("/thanh-toan", "GET")]
    public static function index()
    {
        // $bookingData = [
        //     'MaXuatChieu' => $data['MaXuatChieu'],
        //     'TongTien' => $totalPrice,
        //     "DanhSachVe" => $SeatIds,
        //     "ThucPhams" => $data['ThucPhams'],
        //     "Combos" => $data['Combos'],
        //     "lockTo" => $lockToTime
        // ];
        // Phim
        // Rap
        // SuatChieu
        // Ve, Ghe, Loai Ve
        // 

        if (!is_array($_SESSION['bookingData'])) {
            redirect("");
        }
        $bookingData = $_SESSION['bookingData'];
        $lockToTime = $bookingData['lockTo'];
        $now = time();
        if ($now > $lockToTime) {
            redirect("");
        }
        $show = ShowService::getShowInfoById($bookingData['MaXuatChieu']);
        $tickets = TicketService::getTicketOfSeats($bookingData['DanhSachVe'], $bookingData['MaXuatChieu']);
        $seats = SeatService::getSeatByIds($bookingData['DanhSachVe']);
        $foods = ComboService::getFoodByIds(array_map(fn($item) => $item['MaThucPham'], $bookingData['ThucPhams']));
        $combos = ComboService::getComboByIds(array_map(fn($item) => $item['MaCombo'], $bookingData['Combos']));
        return view("checkout", [
            "show" => $show,
            "bookingData" => $bookingData,
            "tickets" => $tickets,
            "seats" => $seats,
            "foods" => $foods,
            "combos" => $combos
        ]);
    }

    #[Route("/thanh-toan/success", "GET")]
    public static function success()
    {
        // toDo: clear session
        // toDo: save booking data to database
        return view("checkout-success");
    }
    #[Route("/thanh-toan", "POST")]
    public static function store()
    {

        $data = request_body();
        $bookingData = $_SESSION['bookingData'];
        $payment_method = PaymentType::tryFrom($data['payment_method']);
        if (is_null($payment_method)) {
            return json(["message" => "Phương thức thanh toán không hợp lệ"], 400);
        }
        $totalPrice = $bookingData['TongTien'];
        $displayText = "Thanh toán vé xem phim";
        $paymentStrategy = getPaymentStrategy($payment_method);
        $tempId = guidv4();
        $_SESSION['bookingData']['id'] = $tempId;
        $payment = $paymentStrategy->createPayment($tempId, $totalPrice, $displayText);
        return json($payment);
    }
}