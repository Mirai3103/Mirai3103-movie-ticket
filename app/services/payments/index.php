<?php

use App\Services\Payments\MomoPaymentStrategy;
use App\Services\Payments\PaymentStrategy;

enum PaymentType: string
{
    case Momo = 'momo';
    case ZaloPay = 'zalopay';
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
