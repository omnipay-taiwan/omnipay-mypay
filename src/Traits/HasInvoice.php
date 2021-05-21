<?php

namespace Omnipay\MyPay\Traits;

trait HasInvoice
{
    /**
     * 是否開立發票
     * 0.不開立 1.開立 2.依系統設定(預設).
     *
     * @param int $value
     * @return $this
     */
    public function setIssueInvoiceState($value)
    {
        return $this->setParameter('issue_invoice_state', $value);
    }

    /**
     * @return int|null
     */
    public function getIssueInvoiceState()
    {
        return $this->getParameter('issue_invoice_state');
    }

    /**
     * 1: 應稅 2:零稅率 3: 免稅
     * 電子發票特店模式方始有效.
     *
     * @param int $value
     * @return $this
     */
    public function setInvoiceRatetype($value)
    {
        return $this->setParameter('invoice_ratetype', $value);
    }

    /**
     * @return int|string
     */
    public function getInvoiceRatetype()
    {
        return $this->getParameter('invoice_ratetype');
    }

    /**
     * 電子發票選擇實體發票時，帶入預設發票抬頭.
     *
     * @param string $value
     * @return $this
     */
    public function setInvoiceB2bTitle($value)
    {
        return $this->setParameter('invoice_b2b_title', $value);
    }

    /**
     * @return string|null
     */
    public function getInvoiceB2bTitle()
    {
        return $this->getParameter('invoice_b2b_title');
    }

    /**
     * 若選擇實體發票，發票抬頭無法異動。
     * 0可以異動 1無法異動(預設0可以異動).
     *
     * @param int $value
     * @return $this
     */
    public function setInvoiceB2bTitleForce($value)
    {
        return $this->setParameter('invoice_b2b_title_force', $value);
    }

    /**
     * @return int|null
     */
    public function getInvoiceB2bTitleForce()
    {
        return $this->getParameter('invoice_b2b_title_force');
    }

    /**
     * 電子發票選擇實體發票時，帶入預設統一編號
     *
     * @param string $value
     * @return $this
     */
    public function setInvoiceB2bId($value)
    {
        return $this->setParameter('invoice_b2b_id', $value);
    }

    /**
     * @return string|null
     */
    public function getInvoiceB2bId()
    {
        return $this->getParameter('invoice_b2b_id');
    }

    /**
     * 若選擇實體發票，統一編號無法異動。
     * 0可以異動 1無法異動(預設0可以異動).
     *
     * @param int $value
     * @return $this
     */
    public function setInvoiceB2bIdForce($value)
    {
        return $this->setParameter('invoice_b2b_id_force', $value);
    }

    /**
     * @return int|null
     */
    public function getInvoiceB2bIdForce()
    {
        return $this->getParameter('invoice_b2b_id_force');
    }

    /**
     * 電子發票選擇實體發票時，帶入預設地址
     *
     * @param string $value
     * @return $this
     */
    public function setInvoiceB2bAddress($value)
    {
        return $this->setParameter('invoice_b2b_address', $value);
    }

    /**
     * @return string|null
     */
    public function getInvoiceB2bAddress()
    {
        return $this->getParameter('invoice_b2b_address');
    }

    /**
     * 若選擇實體發票，預設地址無法異動。
     * 0可以異動 1無法異動(預設0可以異動).
     *
     * @param int $value
     * @return $this
     */
    public function setInvoiceB2bAddressForce($value)
    {
        return $this->setParameter('invoice_b2b_address_force', $value);
    }

    /**
     * @return int|null
     */
    public function getInvoiceB2bAddressForce()
    {
        return $this->getParameter('invoice_b2b_address_force');
    }
}
