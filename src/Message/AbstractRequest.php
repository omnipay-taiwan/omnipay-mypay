<?php

namespace Omnipay\MyPay\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Omnipay\MyPay\Encryption;
use Omnipay\MyPay\Traits\HasDefaults;

/**
 * Abstract Request.
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    use HasDefaults;

    protected $liveEndpoint = 'https://pay.usecase.cc/api/init';
    protected $testEndpoint = 'https://mypay.tw/api/init';

    public function sendData($data)
    {
        $url = $this->getEndpoint();
        $headers = ['Content-Type' => 'application/x-www-form-urlencoded'];
        $body = $this->createBody(new Encryption($this->getKey()), $data);
        $response = $this->httpClient->request('POST', $url, $headers, http_build_query($body));

        return $this->createResponse(json_decode((string) $response->getBody(), true));
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }

    /**
     * @param Encryption $encryption
     * @param array $data
     * @return array
     */
    abstract protected function createBody(Encryption $encryption, array $data);
}
