<?php

namespace Omnipay\MyPay\Traits;

trait HasOrderInfo
{
    use HasCost;

    /**
     * @param  string  $value
     * @return $this
     */
    public function setOrderId($value)
    {
        return $this->setTransactionId($value);
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->getTransactionId();
    }

    /**
     * 可使用方式有三種，第一種為建議方案
     * 1. 所有支付:pfn=all 導入mypay頁面讓消費 者選擇付款方式，在後台有開啟服務的支付工具都會顯示。
     * 2. 多種支付:pfn=1,3,5 導入mypay頁面讓 消費者選擇付款方式，只會顯示有值的支 付工具。
     * 3. 單一支付:pfn=1，如pfn=1為信用卡
     *
     * @param  string  $value
     * @return $this
     */
    public function setPfn($value)
    {
        return $this->setParameter('pfn', $value);
    }

    /**
     * @return string
     */
    public function getPfn()
    {
        return $this->getParameter('pfn') ?: 'all';
    }

    /**
     * 該消費者在特店中註冊帳號名稱
     * 電子錢包交易、定期定額交易必要欄位
     * 黑名單機制:被列入黑名單，則無法進行交易。
     * 風險管理機制:在特店模式中，可設定該帳號的
     * 交易次數、單筆金額與交易上限;若採代收代付
     * 模式，則無法自行設定。
     *
     * @param  string  $value
     * @return $this
     */
    public function setUserId($value)
    {
        return $this->setParameter('user_id', $value);
    }

    /**
     * @return string|null
     */
    public function getUserId()
    {
        return $this->getParameter('user_id');
    }

    /**
     * 1.定期定額式付費編號
     * 2.定期分期式付費編號 (若有傳送此編號，主動回報時將會回傳此編號， 否則傳送系統產生之編號).
     *
     * @param  string  $value
     * @return $this
     */
    public function setGroupId($value)
    {
        return $this->setParameter('group_id', $value);
    }

    /**
     * @return string|null
     */
    public function getGroupId()
    {
        return $this->getParameter('group_id');
    }
}
