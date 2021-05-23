<?php

namespace Omnipay\MyPay\Test\Message;

use Omnipay\Common\Item;
use Omnipay\MyPay\Message\PurchaseRequest;
use Omnipay\MyPay\User;
use Omnipay\MyPay\Voucher;
use Omnipay\Tests\TestCase;
use Symfony\Component\HttpFoundation\Request;

class PurchaseRequestTest extends TestCase
{
    /**
     * @var PurchaseRequest
     */
    private $request;

    public function setUp()
    {
        parent::setUp();

        $httpRequest = Request::createFromGlobals();
        $httpRequest->server->set('REMOTE_ADDR', '127.0.0.1');
        $this->request = new PurchaseRequest($this->getHttpClient(), $httpRequest);
        $this->request->initialize([
            'store_uid' => '398800730001',
            'key' => 'Xd668CSjnXQLD26Hia8vapkOgGXAv68s',
            'transaction_id' => '1234567890',
            'amount' => 10,
            'user_id' => 'phper',
            'pfn' => 'all',
            'items' => [
                new Item(['name' => '商品名稱', 'quantity' => 1, 'price' => 10]),
            ],
            'vouchers' => [
                new Voucher([
                    'quantity' => 1,
                    'price' => 100,
                    'cost' => 100,
                    'assure_start' => '2021-01-01',
                    'assure_end' => '2021-01-02',
                    'validity_start' => '2021-01-01',
                    'validity_end' => '2021-01-02',
                ]),
            ],
            'user_data' => [new User(['user_id' => 'phper'])],
        ]);
    }

    public function test_get_data()
    {
        self::assertEquals([
            'store_uid' => '398800730001',
            'user_id' => 'phper',
            'cost' => 10,
            'order_id' => '1234567890',
            'ip' => '127.0.0.1',
            'pfn' => 'all',
            'item' => 1,
            'i_0_id' => 'cffc597b139c38b7f737ddfe6f8c11a8',
            'i_0_name' => '商品名稱',
            'i_0_cost' => 10,
            'i_0_amount' => 1,
            'i_0_total' => 10,
            'voucher_item' => 1,
            'v_0_count' => 1,
            'v_0_price' => 100,
            'v_0_cost' => 100,
            'v_0_assure_start' => '2021-01-01',
            'v_0_assure_end' => '2021-01-02',
            'v_0_validity_start' => '2021-01-01',
            'v_0_validity_end' => '2021-01-02',
            'voucher_total_count' => 1,
            'voucher_total_price' => 100,
            'user_data' => [
                ['user_id' => 'phper', 'ip' => '127.0.0.1'],
            ],
        ], $this->request->getData());
    }
}
