<?php

namespace Omnipay\MyPay\Message;

use Omnipay\Common\Message\AbstractResponse;

class RefundResponse extends AbstractResponse
{
    /**
     * Is the response successful?
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getCode() === 'B200';
    }

    /**
     * Response Message.
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return $this->data['msg'];
    }

    /**
     * Response code.
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return $this->data['code'];
    }

    /**
     * Gateway Reference.
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        return $this->data['uid'];
    }
}
