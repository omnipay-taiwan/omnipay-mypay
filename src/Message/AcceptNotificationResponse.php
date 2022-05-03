<?php

namespace Omnipay\MyPay\Message;

use Omnipay\Common\Message\NotificationInterface;

class AcceptNotificationResponse extends CompletePurchaseResponse implements NotificationInterface
{
    public function getReply()
    {
        return $this->isSuccessful() ? '8888' : '';
    }

    public function getTransactionStatus()
    {
        return $this->isSuccessful() ? self::STATUS_COMPLETED : self::STATUS_FAILED;
    }
}
