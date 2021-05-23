<?php

namespace Omnipay\MyPay\Traits;

trait HasStore
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
    public function getStoreKey()
    {
        return $this->getParameter('store_key');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setStoreKey($value)
    {
        return $this->setParameter('store_key', $value);
    }
}
