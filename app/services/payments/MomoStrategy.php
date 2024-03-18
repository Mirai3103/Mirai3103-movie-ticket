<?php

namespace App\Services\Payments;

use App\Core\App;
use App\Services\Payments\Models\CreatePaymentResponse;

class MomoPaymentStrategy implements PaymentStrategy
{
    public function createPayment(string $requestId, string $amount, string $description): CreatePaymentResponse
    {
        $momo_config = App::get('config')['momo'];
        $partnerCode = $momo_config['partner-code'];
        $accessKey = $momo_config['access-key'];
        $secretKey = $momo_config['secret-key'];
        $extraData = "";
        $orderId = guidv4();

        $sb = sprintf(
            "accessKey=%s&amount=%s&extraData=%s&ipnUrl=%s&orderId=%s&orderInfo=%s&partnerCode=%s&redirectUrl=%s&requestId=%s&requestType=%s",
            $accessKey,
            $amount,
            $extraData,
            $momo_config['ipn-url'],
            $orderId,
            $description,
            $partnerCode,
            $momo_config['callback-url'],
            $requestId,
            "captureWallet"
        );
        $signature = hash_hmac("sha256", $sb, $secretKey);
        $body = array(
            "partnerCode" => $partnerCode,
            "partnerName" => "Pixel Cinema",
            "storeId" => "PIXEL_CINEMA",
            "requestId" => $requestId,
            "amount" => $amount,
            "orderId" => $orderId,
            "orderInfo" => $description,
            "redirectUrl" => $momo_config['callback-url'],
            "ipnUrl" => $momo_config['ipn-url'],
            "lang" => "vi",
            "extraData" => $extraData,
            "requestType" => "captureWallet",
            "signature" => $signature
        );

        $response = execPostRequest("https://test-payment.momo.vn/v2/gateway/api/create", json_encode($body));
        $response = json_decode($response, true);

        $result = new CreatePaymentResponse();
        $result->isRedirect = true;
        $result->redirectUrl = $response['payUrl'];
        $result->mobileUrl = $response['deeplink'];
        $result->orderId = $response['orderId'];
        $result->paymentId = $response['requestId'];
        return $result;
    }
}
