<?php

use App\Services\Payments\MomoPaymentStrategy;
use App\Services\Payments\PaymentStrategy;

enum PaymentType
{
    case Momo;
    case ZaloPay;
}

function getPaymentStrategy(PaymentType $type): PaymentStrategy
{
    switch ($type) {
        case PaymentType::Momo:
            return new MomoPaymentStrategy();
        case PaymentType::ZaloPay:
            throw new Exception("Not implemented");
    }
    throw new Exception("Not implemented");
}
