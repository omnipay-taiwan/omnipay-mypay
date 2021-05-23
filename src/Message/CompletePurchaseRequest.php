<?php

namespace Omnipay\MyPay\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;
use Omnipay\MyPay\Traits\HasEcho;
use Omnipay\MyPay\Traits\HasKey;
use Omnipay\MyPay\Traits\HasOrderInfo;
use Omnipay\MyPay\Traits\HasStoreUid;

class CompletePurchaseRequest extends BaseAbstractRequest
{
    use HasStoreUid;
    use HasKey;
    use HasOrderInfo;
    use HasEcho;

    public function setPrc($value)
    {
        return $this->setParameter('prc', $value);
    }

    public function getPrc()
    {
        return $this->getParameter('prc');
    }

    public function setCardno($value)
    {
        return $this->setParameter('cardno', $value);
    }

    public function getCardno()
    {
        return $this->getParameter('cardno');
    }

    public function setAcode($value)
    {
        return $this->setParameter('acode', $value);
    }

    public function getAcode()
    {
        return $this->getParameter('acode');
    }

    public function setUid($value)
    {
        return $this->setParameter('uid', $value);
    }

    public function getUid()
    {
        return $this->getParameter('uid');
    }

    public function setActualCost($value)
    {
        return $this->setParameter('actual_cost', $value);
    }

    public function getActualCost()
    {
        return $this->getParameter('actual_cost');
    }

    public function setActualCurrency($value)
    {
        return $this->setParameter('actual_currency', $value);
    }

    public function getActualCurrency()
    {
        return $this->getParameter('actual_currency');
    }

    public function setLoveCost($value)
    {
        return $this->setParameter('love_cost', $value);
    }

    public function getLoveCost()
    {
        return $this->getParameter('love_cost');
    }

    public function setRetmsg($value)
    {
        return $this->setParameter('retmsg', $value);
    }

    public function getRetmsg()
    {
        return $this->getParameter('retmsg');
    }

    public function setTransType($value)
    {
        return $this->setParameter('trans_type', $value);
    }

    public function getTransType()
    {
        return $this->getParameter('trans_type');
    }

    public function setRedeem($value)
    {
        return $this->setParameter('redeem', $value);
    }

    public function getRedeem()
    {
        return $this->getParameter('redeem');
    }

    public function setFinishtime($value)
    {
        return $this->setParameter('finishtime', $value);
    }

    public function getFinishtime()
    {
        return $this->getParameter('finishtime');
    }

    public function setPaymentName($value)
    {
        return $this->setParameter('payment_name', $value);
    }

    public function getPaymentName()
    {
        return $this->getParameter('payment_name');
    }

    public function setNois($value)
    {
        return $this->setParameter('nois', $value);
    }

    public function getNois()
    {
        return $this->getParameter('nois');
    }

    public function setBankId($value)
    {
        return $this->setParameter('bank_id', $value);
    }

    public function getBankId()
    {
        return $this->getParameter('bank_id');
    }

    public function setExpiredDate($value)
    {
        return $this->setParameter('expired_date', $value);
    }

    public function getExpiredDate()
    {
        return $this->getParameter('expired_date');
    }

    public function setResultType($value)
    {
        return $this->setParameter('result_type', $value);
    }

    public function getResultType()
    {
        return $this->getParameter('result_type');
    }

    public function setResultContentType($value)
    {
        return $this->setParameter('result_content_type', $value);
    }

    public function getResultContentType()
    {
        return $this->getParameter('result_content_type');
    }

    public function setResultContent($value)
    {
        $data = json_decode($value, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $data = $value;
        }

        return $this->setParameter('result_content', $data);
    }

    public function getResultContent()
    {
        return $this->getParameter('result_content');
    }

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

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}
