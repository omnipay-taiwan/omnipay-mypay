<?php

namespace Omnipay\MyPay\Traits;

trait HasLocale
{
    /**
     * @param  string  $value
     * @return $this
     */
    public function setLocale($value)
    {
        return $this->setParameter('locale', $value);
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->getParameter('locale');
    }
}
