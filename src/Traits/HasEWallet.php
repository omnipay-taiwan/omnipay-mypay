<?php

namespace Omnipay\MyPay\Traits;

trait HasEWallet
{
    /**
     * 啟用電子錢包
     * 0.關閉 1.開啟 (預設關閉).
     *
     * @param  int  $value
     * @return $this
     */
    public function setEnableEwallet($value)
    {
        return $this->setParameter('enable_ewallet', $value);
    }

    /**
     * @return int|null
     */
    public function getEnableEwallet()
    {
        return $this->getParameter('enable_ewallet');
    }

    /**
     * 消費者完成電子錢包卡號綁定後，直接使用本參數，系統會自動從綁定卡號扣款
     * 若使用本參數，pfn將自動限制為信用卡與海外 信用卡兩種交易
     * (虛擬卡號在消費者啟用電子錢 包時，會背景告知相關資訊，請參閱回傳格式(4) 電子錢包回傳格式).
     *
     * @param  string  $value
     * @return $this
     */
    public function setVirtualPan($value)
    {
        return $this->setParameter('virtual_pan', $value);
    }

    /**
     * @return string|null
     */
    public function getVirtualPan()
    {
        return $this->getParameter('virtual_pan');
    }

    /**
     * 1.支付頁面模式，mypay顯示結果(預設) 2.背景發動扣款(直接回傳交易回報參數).
     *
     * @param  int  $value
     * @return $this
     */
    public function setEwalletType($value)
    {
        return $this->setParameter('ewallet_type', $value);
    }

    /**
     * @return int|null
     */
    public function getEwalletType()
    {
        return $this->getParameter('ewallet_type');
    }
}
