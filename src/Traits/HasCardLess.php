<?php

namespace Omnipay\MyPay\Traits;

trait HasCardLess
{
    /**
     * 無卡支付商品名稱代碼
     * 如為多金融服務商產品格式為JSON ["A1010001", "A2010001"]，但如產品名稱代碼
     * 為同金融服務商，則以第一筆為主。
     *
     * @param string $value
     * @return $this
     */
    public function setCardlessCode($value)
    {
        return $this->setParameter('cardless_code', $value);
    }

    /**
     * @return string|null
     */
    public function getCardlessCode()
    {
        return $this->getParameter('cardless_code');
    }

    /**
     * 串接『無卡分期』
     * [3,6,9,12] 帶入消費者可選擇之分期期數，JSON 陣列格式。
     *
     * @param string $value
     * @return $this
     */
    public function setCardlessInstallment($value)
    {
        return $this->setParameter('cardless_installment', $value);
    }

    /**
     * @return string|null
     */
    public function getCardlessInstallment()
    {
        return $this->getParameter('cardless_installment');
    }
}
