<?php

namespace Omnipay\MyPay\Traits;

trait HasUid
{
    /**
     * MYPAY LINK之交易流水號
     *
     * @param  string  $value
     * @return $this
     */
    public function setUid($value)
    {
        return $this->setTransactionReference($value);
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->getTransactionReference();
    }
}
