<?php

namespace Omnipay\MyPay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Response
 */
class Response extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['success']);
    }

    public function getTransactionReference()
    {
        if (isset($this->data['reference'])) {
            return $this->data['reference'];
        }
    }

}
