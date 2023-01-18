<?php

namespace Omnipay\MyPay\Traits;

trait HasRegular
{
    /**
     * 如未使用到定期定額付費，不需傳此參數，使用 此參數時，pfn須設14
     * 定期定額付費，期數單位:
     * W:每週扣款一次
     * F:雙週扣款一次
     * M:每月扣款一次
     * S:每季扣款一次
     * H:每半年扣款一次
     * A:每年扣款一次
     *
     * @param  string  $value
     * @return $this
     */
    public function setRegular($value)
    {
        return $this->setParameter('regular', $value);
    }

    /**
     * @return string|null
     */
    public function getRegular()
    {
        return $this->getParameter('regular');
    }

    /**
     * 如未使用到定期定額付費，不需傳此參數
     * 總期數(如為 12 期即代入 12，如果不設定終止期，請代入 0.
     *
     * @param  string  $value
     * @return $this
     */
    public function setRegularTotal($value)
    {
        return $this->setParameter('regular_total', $value);
    }

    /**
     * @return string|null
     */
    public function getRegularTotal()
    {
        return $this->getParameter('regular_total');
    }

    /**
     * 定期扣款起扣日(若未指定日期、或早於今日，則 將判定為當日扣款)
     * (格式為 YYYYMMDD，如 20090916).
     *
     * @param  string  $value
     * @return $this
     */
    public function setRegularFirstChargeDate($value)
    {
        return $this->setParameter('regular_first_charge_date', $value);
    }

    /**
     * @return string|null
     */
    public function getRegularFirstChargeDate()
    {
        return $this->getParameter('regular_first_charge_date');
    }
}
