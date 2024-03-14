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
        $extraData = $description;
        $orderId = guidv4();
        //  String sb = "accessKey=" + accessKey +
        //         "&amount=" + amount +
        //         "&extraData=" + extraData +
        //         "&ipnUrl=" + appProperties.getHost() + momoConfig.getIpnUrl() +
        //         "&orderId=" + orderId +
        //         "&orderInfo=" + orderInfo +
        //         "&partnerCode=" + partnerCode +
        //         "&redirectUrl=" + appProperties.getHost() + momoConfig.getCallbackUrl() +
        //         "&requestId=" + paymentId +
        //         "&requestType=" + requestType.toString();
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
            $orderId,
            "captureMoMoWallet"
        );
        $signature = hash_hmac("sha256", $sb, $secretKey);
        //  JSONObject body = new JSONObject();
        // body.put("partnerCode", partnerCode);
        // body.put("partnerName", "Ngô Hữu Hoàng");
        // body.put("storeId", "CUAHANG_QUANAO");
        // body.put("requestId", paymentId);
        // body.put("amount", amount);
        // body.put("orderId", orderId);
        // body.put("orderInfo", orderInfo);
        // body.put("redirectUrl", appProperties.getHost() + momoConfig.getCallbackUrl());
        // body.put("ipnUrl", appProperties.getHost() + momoConfig.getIpnUrl());
        // body.put("lang", "vi");
        // body.put("extraData", extraData);
        // body.put("requestType", requestType.toString());
        // body.put("signature", signature);
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
        print(json_encode($response));
        return new  CreatePaymentResponse();
    }
}
