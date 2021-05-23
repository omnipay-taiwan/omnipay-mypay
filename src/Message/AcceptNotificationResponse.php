<?php

namespace Omnipay\MyPay\Message;

class AcceptNotificationResponse extends CompletePurchaseResponse
{
    /**
     * Response Message.
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return $this->isSuccessful() ? '8888' : '';
    }
}
