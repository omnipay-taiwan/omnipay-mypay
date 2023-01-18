<?php

namespace Omnipay\MyPay\Traits;

trait HasKey
{
    /**
     * @return string
     */
    public function getKey()
    {
        return $this->getParameter('key');
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }
}
