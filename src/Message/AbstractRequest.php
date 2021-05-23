<?php

namespace Omnipay\MyPay\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Omnipay\Common\Message\ResponseInterface;
use Omnipay\MyPay\Encryption;
use Omnipay\MyPay\Traits\HasStore;

/**
 * Abstract Request.
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    use HasStore;

    protected $liveEndpoint = 'https://pay.usecase.cc/api/init';
    protected $testEndpoint = 'https://mypay.tw/api/init';

    public function sendData($data)
    {
        $url = $this->getEndpoint();
        $headers = ['Content-Type' => 'application/x-www-form-urlencoded'];
        $body = $this->createBody(new Encryption($this->getStoreKey()), $data);
        $response = $this->httpClient->request('POST', $url, $headers, http_build_query($body));

        return $this->createResponse(json_decode((string) $response->getBody(), true));
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    /**
     * @param Encryption $encryption
     * @param array $data
     * @return array
     */
    abstract protected function createBody(Encryption $encryption, array $data);

    /**
     * @param array $data
     * @return ResponseInterface
     */
    abstract protected function createResponse($data);
}
