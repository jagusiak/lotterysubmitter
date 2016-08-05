<?php

require __DIR__ . '/vendor/autoload.php';

use Jagusiak\LotteryApi;

try {
    $response = LotteryApi\LotteryApi::getInstance()
            ->fillLoterry()
            ->setNIP($_POST['vat-number'])
            ->setYear(date('Y'))
            ->setMonth(date('m'))
            ->setDay($_POST['day'])
            ->setBrand(isset($_POST['brand']) ? $_POST['brand'] : '')
            ->setPhone($_POST['phone'])
            ->setPrice(floatval($_POST['price']))
            ->setReceiptNumber($_POST['receipt-number'])
            ->setDeviceNumber($_POST['device-number'])
            ->setEmail($_POST['email'])
            ->usePersonalImage(true)
            ->submit();
    echo json_encode(array('success' => true, 'content' => $response['message']));
} catch (Exception $e) {
    echo json_encode(array('success' => false, 'content' => 'Receipt not sent: ' . $e->getMessage() ));
}