<?php

namespace Omnipay\MyPay\Test\Message;

use Omnipay\MyPay\Message\CompletePurchaseRequest;
use Omnipay\MyPay\Message\PurchaseRequest;
use Omnipay\Tests\TestCase;

class CompletePurchaseRequestTest extends TestCase
{
    /**
     * @var string
     */
    private $storeUid = '398800730001';

    /**
     * @var string
     */
    private $storeKey = 'Xd668CSjnXQLD26Hia8vapkOgGXAv68s';

    /**
     * @var PurchaseRequest
     */
    private $request;

    public function setUp(): void
    {
        parent::setUp();
        $data = [
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
        ];

        $httpRequest = $this->getHttpRequest();
        $httpRequest->request->add($data);
        $this->request = new CompletePurchaseRequest($this->getHttpClient(), $httpRequest);
        $this->request->initialize([
            'store_uid' => $this->storeUid,
            'store_key' => $this->storeKey,
            'locale' => 'en',
        ]);
    }

    public function testGetData()
    {
        self::assertEquals([
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
            'result_content' => [],
            'echo_0' => null,
            'echo_1' => null,
            'echo_2' => null,
            'echo_3' => null,
            'echo_4' => null,
        ], $this->request->getData());
    }
}
