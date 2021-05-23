<?php

namespace Omnipay\MyPay\Test\Message;

use Omnipay\MyPay\Message\PurchaseResponse;
use Omnipay\Tests\TestCase;

class PurchaseResponseTest extends TestCase
{
    public function test_purchase_success()
    {
        $httpResponse = $this->getMockHttpResponse('PurchaseSuccess.txt');

        $request = $this->getMockRequest();
        $request->shouldReceive('getLocale')->andReturnNull();
        $data = json_decode($httpResponse->getBody(), true);
        $response = new PurchaseResponse($request, $data);

        self::assertFalse($response->isSuccessful());
        self::assertTrue($response->isRedirect());
        self::assertEquals('86563', $response->getTransactionReference());
        self::assertEquals('資料正確', $response->getMessage());
        self::assertEquals('https://pay.usecase.cc/payment/86563.html', $response->getRedirectUrl());
    }
}
