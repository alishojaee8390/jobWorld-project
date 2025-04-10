<?php

require_once __DIR__ . '/../vendor/autoload.php'; // آدرس API زرین پال

class ZarinPal {
    private $merchantId;
    private $sandboxUrl;
    private $productionUrl;

    public function __construct($merchantId, $sandbox = true) {
        $this->merchantId = '123456789123456789123456789123456789';
        $this->sandboxUrl = 'https://sandbox.zarinpal.com/pg/v4/payment/request.json';
        $this->productionUrl = 'https://api.zarinpal.com/pg/v4/payment/request.json';
    }

    public function requestPayment($amount, $callbackUrl, $description, $orderId) {
        // ساختار درخواست
        $params = [
            'merchant_id' => $this->merchantId,
            'amount' => $amount,
            'callback_url' => $callbackUrl,
            'description' => $description,
            'metadata' => [
                'order_id' => strval($orderId), // شناسه سفارش به عنوان رشته
            ]
        ];

        // ارسال درخواست به API زارین‌پال
        $client = new GuzzleHttp\Client();
        $response = $client->post($this->sandboxUrl, ['json' => $params]);
        $result = json_decode($response->getBody(), true);

        if ($result['Code'] == 100) {
            // اگر درخواست موفق بود، لینک پرداخت را برمی‌گردانیم
            return $result['data']['authority'];
        } else {
            throw new Exception("خطا در درخواست پرداخت: " . $result['Message']);
        }
    }

    public function verifyPayment($authority, $amount) {
        // درخواست تأیید پرداخت
        $params = [
            'merchant_id' => $this->merchantId,
            'amount' => $amount,
            'authority' => $authority,
        ];

        $client = new GuzzleHttp\Client();
        $response = $client->post($this->sandboxUrl . '/verify.json', ['json' => $params]);
        $result = json_decode($response->getBody(), true);

        if ($result['Code'] == 100) {
            // پرداخت موفق
            return $result['data'];
        } else {
            throw new Exception("خطا در تأیید پرداخت: " . $result['Message']);
        }
    }
}


?>
