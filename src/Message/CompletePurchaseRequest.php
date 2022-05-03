<?php

namespace Omnipay\MyPay\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Omnipay\MyPay\Traits\HasEcho;
use Omnipay\MyPay\Traits\HasKey;
use Omnipay\MyPay\Traits\HasOrderInfo;
use Omnipay\MyPay\Traits\HasOrderResult;
use Omnipay\MyPay\Traits\HasStore;
use Omnipay\MyPay\Traits\HasUid;

class CompletePurchaseRequest extends BaseAbstractRequest
{
    use HasStore;
    use HasKey;
    use HasUid;
    use HasOrderInfo;
    use HasOrderResult;
    use HasEcho;

    /**
     * 交易回傳碼(參閱附錄二).
     *
     * @param string $value
     * @return $this
     */
    public function setPrc($value)
    {
        return $this->setParameter('prc', $value);
    }

    /**
     * @return string
     */
    public function getPrc()
    {
        return $this->getParameter('prc');
    }

    /**
     * 卡號/VA/超商代碼
     *
     * @param string $value
     * @return $this
     */
    public function setCardno($value)
    {
        return $this->setParameter('cardno', $value);
    }

    /**
     * @return string
     */
    public function getCardno()
    {
        return $this->getParameter('cardno');
    }

    /**
     * 銀行交易授權碼
     *
     * @param string $value
     * @return $this
     */
    public function setAcode($value)
    {
        return $this->setParameter('acode', $value);
    }

    /**
     * @return string
     */
    public function getAcode()
    {
        return $this->getParameter('acode');
    }

    /**
     * 實際交易金額.
     *
     * @param string $value
     * @return $this
     */
    public function setActualCost($value)
    {
        return $this->setParameter('actual_cost', $value);
    }

    /**
     * @return string
     */
    public function getActualCost()
    {
        return $this->getParameter('actual_cost');
    }

    /**
     * 實際交易幣別.
     *
     * @param string $value
     * @return $this
     */
    public function setActualCurrency($value)
    {
        return $this->setParameter('actual_currency', $value);
    }

    /**
     * @return string
     */
    public function getActualCurrency()
    {
        return $this->getParameter('actual_currency');
    }

    /**
     * 愛心捐款金額(幣別同實際交易幣別).
     *
     * @param string $value
     * @return $this
     */
    public function setLoveCost($value)
    {
        return $this->setParameter('love_cost', $value);
    }

    /**
     * @return string
     */
    public function getLoveCost()
    {
        return $this->getParameter('love_cost');
    }

    /**
     * 回傳訊息.
     *
     * @param string $value
     * @return $this
     */
    public function setRetmsg($value)
    {
        return $this->setParameter('retmsg', $value);
    }

    /**
     * @return string
     */
    public function getRetmsg()
    {
        return $this->getParameter('retmsg');
    }

    /**
     * 交易完成時間(YYYYMMDDHHmmss).
     *
     * @param string $value
     * @return $this
     */
    public function setFinishtime($value)
    {
        return $this->setParameter('finishtime', $value);
    }

    /**
     * @return string
     */
    public function getFinishtime()
    {
        return $this->getParameter('finishtime');
    }

    /**
     * 扣款名稱(定期定額/定期分期交易專用).
     *
     * @param string $value
     * @return $this
     */
    public function setPaymentName($value)
    {
        return $this->setParameter('payment_name', $value);
    }

    /**
     * @return string
     */
    public function getPaymentName()
    {
        return $this->getParameter('payment_name');
    }

    /**
     * 期數 (定期定額/定期分期交易專用).
     *
     * @param int $value
     * @return $this
     */
    public function setNois($value)
    {
        return $this->setParameter('nois', $value);
    }

    /**
     * @return int|null
     */
    public function getNois()
    {
        return $this->getParameter('nois');
    }

    /**
     * 銀行代碼 虛擬帳號資訊.
     *
     * @param string $value
     * @return $this
     */
    public function setBankId($value)
    {
        return $this->setParameter('bank_id', $value);
    }

    /**
     * @return string
     */
    public function getBankId()
    {
        return $this->getParameter('bank_id');
    }

    /**
     * 有效日期虛擬帳號、超商代碼、無卡分期資訊.
     *
     * @param string $value
     * @return $this
     */
    public function setExpiredDate($value)
    {
        return $this->setParameter('expired_date', $value);
    }

    /**
     * @return string|null
     */
    public function getExpiredDate()
    {
        return $this->getParameter('expired_date');
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'key' => $this->getKey(),
            'prc' => $this->getPrc(),
            'finishtime' => $this->getFinishtime(),
            'uid' => $this->getUid(),
            'order_id' => $this->getOrderId(),
            'user_id' => $this->getUserId(),
            'cost' => $this->getCost(),
            'currency' => $this->getCurrency(),
            'actual_cost' => $this->getActualCost(),
            'actual_currency' => $this->getActualCurrency(),
            'love_cost' => $this->getLoveCost(),
            'retmsg' => $this->getRetmsg(),
            'pfn' => $this->getPfn(),
            'trans_type' => $this->getTransType(),
            'redeem' => $this->getRedeem(),
            'payment_name' => $this->getPaymentName(),
            'nois' => $this->getNois(),
            'group_id' => $this->getGroupId(),
            'bank_id' => $this->getBankId(),
            'expired_date' => $this->getExpiredDate(),
            'result_type' => $this->getResultType(),
            'result_content_type' => $this->getResultContentType(),
            'result_content' => $this->getResultContent(),
            'echo_0' => $this->getEcho0(),
            'echo_1' => $this->getEcho1(),
            'echo_2' => $this->getEcho2(),
            'echo_3' => $this->getEcho3(),
            'echo_4' => $this->getEcho4(),
        ];
    }

    /**
     * @param array $data
     * @return CompletePurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
