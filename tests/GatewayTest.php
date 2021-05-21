<?php

namespace Omnipay\MyPay\Test;

use Omnipay\MyPay\Encryption;
use Omnipay\MyPay\Gateway;
use Omnipay\MyPay\Item;
use Omnipay\Tests\GatewayTestCase;
use Symfony\Component\HttpFoundation\Request;

class GatewayTest extends GatewayTestCase
{
    /** @var Gateway */
    protected $gateway;
    /**
     * @var Encryption
     */
    private $encryption;
    /**
     * @var string
     */
    private $storeUid = '398800730001';

    public function setUp()
    {
        parent::setUp();

        $httpRequest = Request::createFromGlobals();
        $httpRequest->server->set('REMOTE_ADDR', '127.0.0.1');
        $this->gateway = new Gateway($this->getHttpClient(), $httpRequest);
        $key = 'Xd668CSjnXQLD26Hia8vapkOgGXAv68s';
        $this->encryption = new Encryption($key);
        $this->gateway->initialize([
            'store_uid' => $this->storeUid,
            'key' => $key,
            'locale' => 'en',
        ]);
    }

    public function test_purchase()
    {
        $this->setMockHttpResponse('PurchaseSuccess.txt');

        $response = $this->gateway->purchase([
            'transaction_id' => '1234567890',
            'amount' => 10,
            'user_id' => 'phper',
            'items' => [
                new Item(['id' => '0886449', 'name' => '商品名稱', 'quantity' => 1, 'price' => 10]),
            ],
        ])->send();

        self::assertFalse($response->isSuccessful());
        self::assertTrue($response->isRedirect());
        self::assertEquals('86563', $response->getTransactionReference());
        self::assertEquals('資料正確', $response->getMessage());
        self::assertEquals('https://pay.usecase.cc/payment/86563.html?locale=en', $response->getRedirectUrl());

        $body = (string) $this->getMockClient()->getLastRequest()->getBody();
        parse_str($body, $params);
        $service = $this->encryption->decrypt($params['service']);
        $options = $this->encryption->decrypt($params['encry_data']);

        self::assertEquals($this->storeUid, $params['store_uid']);
        self::assertEquals(['service_name' => 'api', 'cmd' => 'api/orders'], $service);
        self::assertEquals([
            'store_uid' => '398800730001',
            'user_id' => 'phper',
            'cost' => 10,
            'order_id' => '1234567890',
            'ip' => '127.0.0.1',
            'pfn' => 'all',
            'item' => 1,
            'i_0_id' => '0886449',
            'i_0_name' => '商品名稱',
            'i_0_cost' => 10,
            'i_0_amount' => 1,
            'i_0_total' => 10,
        ], $options);
    }
}
