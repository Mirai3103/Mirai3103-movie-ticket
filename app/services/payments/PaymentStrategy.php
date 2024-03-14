<?php

namespace App\Services\Payments;

use App\Services\Payments\Models\CreatePaymentResponse;

interface PaymentStrategy
{
    public function createPayment(string $orderId, string $amount, string $description): CreatePaymentResponse;
}
