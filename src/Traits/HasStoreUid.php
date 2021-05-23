<?php

namespace Omnipay\MyPay\Traits;

trait HasStoreUid
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
}
