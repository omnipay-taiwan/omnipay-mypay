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
    /**
     * @var string
     */
    private $storeKey = 'Xd668CSjnXQLD26Hia8vapkOgGXAv68s';

    public function setUp()
    {
        parent::setUp();

        $httpRequest = Request::createFromGlobals();
        $httpRequest->server->set('REMOTE_ADDR', '127.0.0.1');
        $this->gateway = new Gateway($this->getHttpClient(), $httpRequest);
        $this->encryption = new Encryption($this->storeKey);
        $this->gateway->initialize([
            'store_uid' => $this->storeUid,
            'store_key' => $this->storeKey,
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

    public function test_complete_purchase()
    {
        $options = [
            'key' => 'dee886ee19ddbb97e2968a1a8777fc7d',
            'prc' => '250',
            'finishtime' => '20210523141536',
            'uid' => '86579',
            'order_id' => 'd5jUed1tkQ9cDaD1',
            'user_id' => 'DoSuccess3D',
            'cost' => '1000.00',
            'currency' => 'TWD',
            'actual_cost' => '1000',
            'actual_currency' => 'TWD',
            'love_cost' => '0',
            'retmsg' => '付款完成',
            'pfn' => 'CREDITCARD',
            'trans_type' => '1',
            'redeem' => null,
            'payment_name' => null,
            'nois' => null,
            'group_id' => null,
            'bank_id' => null,
            'expired_date' => null,
            'result_type' => '4',
            'result_content_type' => 'CREDITCARD',
            'result_content' => '{}',
            'echo_0' => null,
            'echo_1' => null,
            'echo_2' => null,
            'echo_3' => null,
            'echo_4' => null,
        ];

        $response = $this->gateway->completePurchase($options)->send();

        self::assertTrue($response->isSuccessful());
        self::assertEquals('250', $response->getCode());
        self::assertEquals('付款完成', $response->getMessage());
        self::assertEquals('d5jUed1tkQ9cDaD1', $response->getTransactionId());
        self::assertEquals('86579', $response->getTransactionReference());
    }

    public function test_accept_notification()
    {
        $options = [
            'key' => 'dee886ee19ddbb97e2968a1a8777fc7d',
            'prc' => '250',
            'finishtime' => '20210523141536',
            'uid' => '86579',
            'order_id' => 'd5jUed1tkQ9cDaD1',
            'user_id' => 'DoSuccess3D',
            'cost' => '1000.00',
            'currency' => 'TWD',
            'actual_cost' => '1000',
            'actual_currency' => 'TWD',
            'love_cost' => '0',
            'retmsg' => '付款完成',
            'pfn' => 'CREDITCARD',
            'trans_type' => '1',
            'redeem' => null,
            'payment_name' => null,
            'nois' => null,
            'group_id' => null,
            'bank_id' => null,
            'expired_date' => null,
            'result_type' => '4',
            'result_content_type' => 'CREDITCARD',
            'result_content' => '{}',
            'echo_0' => null,
            'echo_1' => null,
            'echo_2' => null,
            'echo_3' => null,
            'echo_4' => null,
        ];

        $response = $this->gateway->acceptNotification($options);

        self::assertEquals('8888', $response->getMessage());
    }

    public function test_fetch_transaction()
    {
        $this->setMockHttpResponse('FetchTransactionSuccess.txt');

        $options = [
            'uid' => '86579',
            'key' => 'dee886ee19ddbb97e2968a1a8777fc7d',
        ];
        $response = $this->gateway->fetchTransaction($options)->send();

        self::assertTrue($response->isSuccessful());
        self::assertEquals('250', $response->getCode());
        self::assertEquals('付款完成', $response->getMessage());
        self::assertEquals('d5jUed1tkQ9cDaD1', $response->getTransactionId());
        self::assertEquals('86579', $response->getTransactionReference());
    }
}
