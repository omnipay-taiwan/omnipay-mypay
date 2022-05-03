<?php

namespace Omnipay\MyPay\Test\Message;

use Omnipay\MyPay\Message\CompletePurchaseRequest;
use Omnipay\MyPay\Message\PurchaseRequest;
use Omnipay\Tests\TestCase;

class CompletePurchaseRequestTest extends TestCase
{
    /**
     * @var PurchaseRequest
     */
    private $request;

    public function setUp(): void
    {
        parent::setUp();

        $this->request = new CompletePurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize([
            'uid' => '86579',
            'key' => 'dee886ee19ddbb97e2968a1a8777fc7d',
            'prc' => '250',
            'finishtime' => '20210523141536',
            'cardno' => '490706******5101',
            'acode' => 'AA1234',
            'issuing_bank' => '合作金庫',
            'issuing_bank_uid' => '006',
            'transaction_mode' => '1',
            'supplier_name' => '高鉅金融',
            'supplier_code' => 'T0',
            'order_id' => 'd5jUed1tkQ9cDaD1',
            'user_id' => 'DoSuccess3D',
            'cost' => '1000',
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
        ]);
    }

    public function testGetData()
    {
        self::assertEquals([
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
            'result_content' => [],
            'echo_0' => null,
            'echo_1' => null,
            'echo_2' => null,
            'echo_3' => null,
            'echo_4' => null,
        ], $this->request->getData());
    }
}
