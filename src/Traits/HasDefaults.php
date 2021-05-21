<?php

namespace Omnipay\MyPay\Traits;

trait HasDefaults
{
    /**
     * @return string
     */
    public function getStoreUid()
    {
        return $this->getParameter('store_uid');
    }

    /**
     * 特約商店商務代號
     *
     * @param string $value
     * @return $this
     */
    public function setStoreUid($value)
    {
        return $this->setParameter('store_uid', $value);
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->getParameter('key');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    /**
     * @param string $value
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
