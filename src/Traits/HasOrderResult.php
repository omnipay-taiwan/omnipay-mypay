<?php

namespace Omnipay\MyPay\Traits;

trait HasOrderResult
{
    /**
     * 支付類型
     * 1.一般2.定期3.紅利.
     *
     * @param int $value
     * @return $this
     */
    public function setTransType($value)
    {
        return $this->setParameter('trans_type', $value);
    }

    /**
     * @return int
     */
    public function getTransType()
    {
        return $this->getParameter('trans_type');
    }

    /**
     * 紅利資訊，JSON格式，欄位說明: type 1全額 2.部分
     * used 紅利折抵點數
     * amount 自付金額.
     *
     * @param string $value
     * @return $this
     */
    public function setRedeem($value)
    {
        $data = json_decode($value, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $data = $value;
        }

        return $this->setParameter('redeem', $data);
    }

    /**
     * @return mixed
     */
    public function getRedeem()
    {
        return $this->getParameter('redeem');
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setResultType($value)
    {
        return $this->setParameter('result_type', $value);
    }

    /**
     * @return int
     */
    public function getResultType()
    {
        return $this->getParameter('result_type');
    }

    /**
     * 資料內容所屬支付名稱.
     *
     * @param string $value
     * @return $this
     */
    public function setResultContentType($value)
    {
        return $this->setParameter('result_content_type', $value);
    }

    /**
     * @return string
     */
    public function getResultContentType()
    {
        return $this->getParameter('result_content_type');
    }

    /**
     * 資料內容(目前有資訊的支付方式有虛擬帳號、超商代碼).
     *
     * @param string $value
     * @return $this
     */
    public function setResultContent($value)
    {
        $data = json_decode($value, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $data = $value;
        }

        return $this->setParameter('result_content', $data);
    }

    /**
     * @return mixed
     */
    public function getResultContent()
    {
        return $this->getParameter('result_content');
    }
}
