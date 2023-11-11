<?php

namespace Omnipay\MyPay\Message;

use JsonException;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Omnipay\MyPay\Traits\HasStore;

class CompletePurchaseRequest extends BaseAbstractRequest
{
    use HasStore;

    /**
     * @return array
     * @throws JsonException
     */
    public function getData()
    {
        $data = $this->httpRequest->request->all();
        if (array_key_exists('result_content', $data)) {
            $data['result_content'] = json_decode($data['result_content'], true);
        }

        return $data;
    }

    /**
     * @param  array  $data
     * @return CompletePurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
