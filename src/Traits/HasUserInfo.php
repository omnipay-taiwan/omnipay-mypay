<?php

namespace Omnipay\MyPay\Traits;

trait HasUserInfo
{
    /**
     * 消費者姓名
     * 電子錢包交易必要欄位.
     *
     * @param  string  $value
     * @return $this
     */
    public function setUserName($value)
    {
        return $this->setParameter('user_name', $value);
    }

    /**
     * @return string|null
     */
    public function getUserName()
    {
        return $this->getParameter('user_name');
    }

    /**
     * 消費者真實姓名，電子錢包交易必要欄位
     * 若直接帶入消費者可減少填寫次數.
     *
     * @param  string  $value
     * @return $this
     */
    public function setUserRealName($value)
    {
        return $this->setParameter('user_real_name', $value);
    }

    /**
     * @return string|null
     */
    public function getUserRealName()
    {
        return $this->getParameter('user_real_name');
    }

    /**
     * 消費者地址
     *
     * @param  string  $value
     * @return $this
     */
    public function setUserAddress($value)
    {
        return $this->setParameter('userAddress', $value);
    }

    /**
     * @return string|null
     */
    public function getUserAddress()
    {
        return $this->getParameter('user_address');
    }

    /**
     * 消費者身份證字號
     * 直接帶入可減少填寫次數.
     *
     * @param  string  $value
     * @return $this
     */
    public function setUserSn($value)
    {
        return $this->setParameter('user_sn', $value);
    }

    /**
     * @return string|null
     */
    public function getUserSn()
    {
        return $this->getParameter('user_sn');
    }

    /**
     * 消費者家用電話(白天電話).
     *
     * @param  string  $value
     * @return $this
     */
    public function setUserPhone($value)
    {
        return $this->setParameter('user_phone', $value);
    }

    /**
     * @return string|null
     */
    public function getUserPhone()
    {
        return $this->getParameter('user_phone');
    }

    /**
     * 行動電話國碼(預設886)電子錢包交易必要欄位
     * 直接帶入可減少填寫次數.
     *
     * @param  string  $value
     * @return $this
     */
    public function setUserCellphoneCode($value)
    {
        return $this->setParameter('user_cellphone_code', $value);
    }

    /**
     * @return string|null
     */
    public function getUserCellphoneCode()
    {
        return $this->getParameter('user_cellphone_code');
    }

    /**
     * 消費者行動電話
     * 直接帶入可減少填寫次數.
     *
     * @param  string  $value
     * @return $this
     */
    public function setUserCellphone($value)
    {
        return $this->setParameter('user_cellphone', $value);
    }

    /**
     * @return string|null
     */
    public function getUserCellphone()
    {
        return $this->getParameter('user_cellphone');
    }

    /**
     * 消費者 E-Mail，電子錢包交易必要欄位
     * 直接帶入可減少填寫次數.
     *
     * @param  string  $value
     * @return $this
     */
    public function setUserEmail($value)
    {
        return $this->setParameter('user_email', $value);
    }

    /**
     * @return string|null
     */
    public function getUserEmail()
    {
        return $this->getParameter('user_email');
    }

    /**
     * 消費者生日(格式為 YYYYMMDD，如 20090916).
     *
     * @param  string  $value
     * @return $this
     */
    public function setUserBirthday($value)
    {
        return $this->setParameter('user_birthday', $value);
    }

    /**
     * @return string|null
     */
    public function getUserBirthday()
    {
        return $this->getParameter('user_birthday');
    }
}
