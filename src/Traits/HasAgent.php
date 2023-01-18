<?php

namespace Omnipay\MyPay\Traits;

use Omnipay\MyPay\Message\PurchaseRequest;

trait HasAgent
{
    /**
     * 經銷商發動交易才能使用
     * 經銷商代收費是否含簡訊費 (0.不含 1.含).
     *
     * @param  int  $value
     * @return $this
     */
    public function setAgentSmsFeeType($value)
    {
        return $this->setParameter('agent_sms_fee_type', $value);
    }

    public function getAgentSmsFeeType()
    {
        return $this->getParameter('agent_sms_fee_type');
    }

    /**
     * 經銷商發動交易才能使用
     * 經銷商代收費是否含手續費 (0.不含 1.含).
     *
     * @param  int  $value
     * @return $this
     */
    public function setAgentChargeFeeType($value)
    {
        return $this->setParameter('agent_charge_fee_type', $value);
    }

    public function getAgentChargeFeeType()
    {
        return $this->getParameter('agent_charge_fee_type');
    }

    /**
     * 經銷商發動交易才能使用
     * 經銷商收取費用，限用金額，不能使用%.
     *
     * @param $value
     * @return PurchaseRequest
     */
    public function setAgentChargeFee($value)
    {
        return $this->setParameter('agent_charge_fee', $value);
    }

    public function getAgentChargeFee()
    {
        return $this->getParameter('agent_charge_fee');
    }
}
