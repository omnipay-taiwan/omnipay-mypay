<?php

namespace Omnipay\MyPay\Traits;

trait HasCost
{
    /**
     * @param  string|int  $value
     * @return $this
     */
    public function setCost($value)
    {
        return $this->setAmount($value);
    }

    /**
     * @return string
     */
    public function getCost()
    {
        return $this->getAmount();
    }
}
