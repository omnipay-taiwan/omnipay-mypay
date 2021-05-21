<?php

namespace Omnipay\MyPay;

use Omnipay\Common\Item as BaseItem;

class Item extends BaseItem
{
    /**
     * @param string $value
     * @return Item
     */
    public function setId($value)
    {
        return $this->setParameter('id', $value);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->getParameter('id');
    }
}
