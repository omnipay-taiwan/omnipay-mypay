<?php

namespace Omnipay\MyPay\Test\Message;

use Omnipay\MyPay\Message\FetchTransactionRequest;
use Omnipay\Tests\TestCase;

class FetchTransactionRequestTest extends TestCase
{
    /**
     * @var FetchTransactionRequest
     */
    private $request;

    public function setUp()
    {
        parent::setUp();

        $this->request = new FetchTransactionRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize([
            'uid' => '86579',
            'key' => 'dee886ee19ddbb97e2968a1a8777fc7d',
        ]);
    }

    public function testGetData()
    {
        self::assertEquals([
            'uid' => '86579',
            'key' => 'dee886ee19ddbb97e2968a1a8777fc7d',
        ], $this->request->getData());
    }
}
