<?php

namespace Omnipay\MyPay;

use Omnipay\Common\Helper;
use Omnipay\Common\ParametersTrait;
use Symfony\Component\HttpFoundation\ParameterBag;

class Voucher
{
    use ParametersTrait;

    /**
     * Voucher constructor.
     */
    public function __construct(array $parameters = null)
    {
        $this->initialize($parameters);
    }

    /**
     * @return $this
     */
    public function initialize(array $parameters = null)
    {
        $this->parameters = new ParameterBag;
        Helper::initialize($this, $parameters);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->getParameter('quantity');
    }

    /**
     * 票券張數.
     *
     * @param  string|int  $value
     * @return Voucher
     */
    public function setQuantity($value)
    {
        return $this->setParameter('quantity', $value);
    }

    public function getPrice()
    {
        return $this->getParameter('price');
    }

    /**
     * 面額.
     *
     * @param  string|int  $value
     * @return Voucher
     */
    public function setPrice($value)
    {
        return $this->setParameter('price', $value);
    }

    public function getCost()
    {
        return $this->getParameter('cost');
    }

    /**
     * 每張票券實際交易金額.
     *
     * @param  string|int  $value
     * @return Voucher
     */
    public function setCost($value)
    {
        return $this->setParameter('cost', $value);
    }

    /**
     * @return string|int
     */
    public function getCount()
    {
        return $this->getQuantity();
    }

    /**
     * 票券張數.
     *
     * @param  string|int  $value
     * @return Voucher
     */
    public function setCount($value)
    {
        return $this->setQuantity($value);
    }

    /**
     * 履約保證起始.
     *
     * @param  string  $value
     * @return Voucher
     */
    public function setAssureStart($value)
    {
        return $this->setParameter('assure_start', $value);
    }

    public function getAssureStart()
    {
        return $this->getParameter('assure_start');
    }

    /**
     * 履約保證結束
     *
     * @param  string  $value
     * @return Voucher
     */
    public function setAssureEnd($value)
    {
        return $this->setParameter('assure_end', $value);
    }

    public function getAssureEnd()
    {
        return $this->getParameter('assure_end');
    }

    /**
     * 票券有效起始時間.
     *
     * @param  string  $value
     * @return Voucher
     */
    public function setValidityStart($value)
    {
        return $this->setParameter('validity_start', $value);
    }

    public function getValidityStart()
    {
        return $this->getParameter('validity_start');
    }

    /**
     * 票券有效結束時間.
     *
     * @param  string  $value
     * @return Voucher
     */
    public function setValidityEnd($value)
    {
        return $this->setParameter('validity_end', $value);
    }

    public function getValidityEnd()
    {
        return $this->getParameter('validity_end');
    }
}
