<?php

namespace Omnipay\MyPay\Test\Message;

use Omnipay\MyPay\Message\Response;
use Omnipay\Tests\TestCase;

class ResponseTest extends TestCase
{
    public function testConstruct()
    {
        // response should decode URL format data
        $response = new Response($this->getMockRequest(), ['example' => 'value', 'foo' => 'bar']);
        $this->assertEquals(['example' => 'value', 'foo' => 'bar'], $response->getData());
    }

    public function testProPurchaseSuccess()
    {
        $httpResponse = $this->getMockHttpResponse('AuthorizeSuccess.txt');
        $data = json_decode($httpResponse->getBody(), true);
        $response = new Response($this->getMockRequest(), $data);

        $this->assertTrue($response->isSuccessful());
        $this->assertEquals('1234', $response->getTransactionReference());
        $this->assertNull($response->getMessage());
    }
}
