<?php

namespace Omnipay\MyPay;

use Omnipay\Common\Helper;
use Omnipay\Common\ParametersTrait;
use Symfony\Component\HttpFoundation\ParameterBag;

class User
{
    use ParametersTrait;

    /**
     * Voucher constructor.
     */
    public function __construct(array $parameters = null)
    {
        $this->initialize($parameters);
    }

    /**
     * @return $this
     */
    public function initialize(array $parameters = null)
    {
        $this->parameters = new ParameterBag;
        Helper::initialize($this, $parameters);

        return $this;
    }

    /**
     * 該消費者在特店中註冊帳號名稱
     * 黑名單機制，風險管理機制與可設定該帳號
     * 的交易次數與單筆金額與交易上線.
     *
     * @param  string  $value
     * @return User
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
     * 消費者網際網路來源 IP.
     *
     * @param  string  $value
     * @return User
     */
    public function setIp($value)
    {
        return $this->setParameter('ip', $value);
    }

    /**
     * @return string|null
     */
    public function getIp()
    {
        return $this->getParameter('ip');
    }

    /**
     * 消費者姓名.
     *
     * @param  string  $value
     * @return User
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
     * 消費者真實姓名.
     *
     * @param  string  $value
     * @return User
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
     * 消費者地址郵遞區號
     *
     * @param  string  $value
     * @return User
     */
    public function setUserAddressPostZone($value)
    {
        return $this->setParameter('user_address_post_zone', $value);
    }

    /**
     * @return string|null
     */
    public function getUserAddressPostZone()
    {
        return $this->getParameter('user_address_post_zone');
    }

    /**
     * 消費者地址
     *
     * @param  string  $value
     * @return User
     */
    public function setUserAddress($value)
    {
        return $this->setParameter('user_address', $value);
    }

    /**
     * @return string|null
     */
    public function getUserAddress()
    {
        return $this->getParameter('user_address');
    }

    /**
     * 1:身分證,2:統一證號,3:護照號碼 (消費者是 本國人為1,外國人2 or 3).
     *
     * @param  int  $value
     * @return User
     */
    public function setUserSnType($value)
    {
        return $this->setParameter('user_sn_type', $value);
    }

    /**
     * @return int|null
     */
    public function getUserSnType()
    {
        return $this->getParameter('user_sn_type');
    }

    /**
     * 消費者身份證字號/統一證號/護照號碼
     *
     * @param  string  $value
     * @return User
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
     * 消費者家用電話(白天電話):國碼(預設886).
     *
     * @param  string  $value
     * @return User
     */
    public function setUserPhoneCode($value)
    {
        return $this->setParameter('user_phone_code', $value);
    }

    /**
     * @return string|null
     */
    public function getUserPhoneCode()
    {
        return $this->getParameter('user_phone_code');
    }

    /**
     * 消費者家用電話(白天電話):區碼
     *
     * @param  string  $value
     * @return User
     */
    public function setUserPhoneAreaCode($value)
    {
        return $this->setParameter('user_phone_area_code', $value);
    }

    /**
     * @return string|null
     */
    public function getUserPhoneAreaCode()
    {
        return $this->getParameter('user_phone_area_code');
    }

    /**
     * 消費者家用電話(白天電話).
     *
     * @param  string  $value
     * @return User
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
     * 消費者行動電話國碼(預設886).
     *
     * @param  string  $value
     * @return User
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
     * 消費者行動電話.
     *
     * @param  string  $value
     * @return User
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
     * 消費者 E-Mail.
     *
     * @param  string  $value
     * @return User
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
     * @return User
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

    /**
     * 消費者戶籍地址:郵遞區號
     *
     * @param  string  $value
     * @return User
     */
    public function setResidenceAddressPostZone($value)
    {
        return $this->setParameter('residence_address_post_zone', $value);
    }

    /**
     * @return string|null
     */
    public function getResidenceAddressPostZone()
    {
        return $this->getParameter('residence_address_post_zone');
    }

    /**
     * 消費者戶籍地址:路街巷弄號樓室.
     *
     * @param  string  $value
     * @return User
     */
    public function setResidenceAddress($value)
    {
        return $this->setParameter('residence_address', $value);
    }

    /**
     * @return string|null
     */
    public function getResidenceAddress()
    {
        return $this->getParameter('residence_address');
    }

    /**
     * 消費者戶籍電話:區碼
     *
     * @param  string  $value
     * @return User
     */
    public function setResidencePhoneAreaCode($value)
    {
        return $this->setParameter('residence_phone_area_code', $value);
    }

    /**
     * @return string|null
     */
    public function getResidencePhoneAreaCode()
    {
        return $this->getParameter('residence_phone_area_code');
    }

    /**
     * 消費者戶籍電話:號碼
     *
     * @param  string  $value
     * @return User
     */
    public function setResidencePhone($value)
    {
        return $this->setParameter('residence_phone', $value);
    }

    /**
     * @return string|null
     */
    public function getResidencePhone()
    {
        return $this->getParameter('residence_phone');
    }

    /**
     * 消費者銀行帳戶:銀行代碼
     *
     * @param  string  $value
     * @return User
     */
    public function setBankCode($value)
    {
        return $this->setParameter('bank_code', $value);
    }

    /**
     * @return string|null
     */
    public function getBankCode()
    {
        return $this->getParameter('bank_code');
    }

    /**
     * 消費者銀行帳戶: 分行代碼
     *
     * @param  string  $value
     * @return User
     */
    public function setBankBranchCode($value)
    {
        return $this->setParameter('bank_branch_code', $value);
    }

    /**
     * @return string|null
     */
    public function getBankBranchCode()
    {
        return $this->getParameter('bank_branch_code');
    }

    /**
     * 消費者銀行帳戶:銀行帳戶名稱.
     *
     * @param  string  $value
     * @return User
     */
    public function setBankAccountName($value)
    {
        return $this->setParameter('bank_account_name', $value);
    }

    /**
     * @return string|null
     */
    public function getBankAccountName()
    {
        return $this->getParameter('bank_account_name');
    }

    /**
     * 消費者銀行帳戶:銀行帳號
     *
     * @param  string  $value
     * @return User
     */
    public function setBankAccountNumber($value)
    {
        return $this->setParameter('bank_account_number', $value);
    }

    /**
     * @return string|null
     */
    public function getBankAccountNumber()
    {
        return $this->getParameter('bank_account_number');
    }

    /**
     * 消費者居住房屋:擁有者
     * 1:自有,2:配偶,3:親人,4租賃.
     *
     * @param  int  $value
     * @return User
     */
    public function setHouseOwner($value)
    {
        return $this->setParameter('house_owner', $value);
    }

    /**
     * @return int|null
     */
    public function getHouseOwner()
    {
        return $this->getParameter('house_owner');
    }

    /**
     * 消費者居住房屋:開始居住年分(西元年).
     *
     * @param  int  $value
     * @return User
     */
    public function setLiveBeginYear($value)
    {
        return $this->setParameter('live_begin_year', $value);
    }

    /**
     * @return int|null
     */
    public function getLiveBeginYear()
    {
        return $this->getParameter('live_begin_year');
    }

    /**
     * 消費者通訊地址:郵遞區號
     *
     * @param  string  $value
     * @return User
     */
    public function setMailingAddressPostZone($value)
    {
        return $this->setParameter('mailing_address_post_zone', $value);
    }

    /**
     * @return string|null
     */
    public function getMailingAddressPostZone()
    {
        return $this->getParameter('mailing_address_post_zone');
    }

    /**
     * 消費者通訊地址:路街巷弄號樓室.
     *
     * @param  string  $value
     * @return User
     */
    public function setMailingAddress($value)
    {
        return $this->setParameter('mailing_address', $value);
    }

    /**
     * @return string|null
     */
    public function getMailingAddress()
    {
        return $this->getParameter('mailing_address');
    }

    /**
     * 消費者婚姻狀況
     * 1:單身,2:已婚,3:離婚.
     *
     * @param  int  $value
     * @return User
     */
    public function setMaritalStatus($value)
    {
        return $this->setParameter('marital_status', $value);
    }

    /**
     * @return int|null
     */
    public function getMaritalStatus()
    {
        return $this->getParameter('marital_status');
    }

    /**
     * 消費者擁有子女數.
     *
     * @param  int  $value
     * @return User
     */
    public function setChildren($value)
    {
        return $this->setParameter('children', $value);
    }

    /**
     * @return int|null
     */
    public function getChildren()
    {
        return $this->getParameter('children');
    }

    /**
     * 消費者教育程度
     * 1:博士,2:研究所,3:大學/大專,4:高中職,5:國中/國小.
     *
     * @param  int  $value
     * @return User
     */
    public function setEducationLevel($value)
    {
        return $this->setParameter('education_level', $value);
    }

    /**
     * @return int|null
     */
    public function getEducationLevel()
    {
        return $this->getParameter('education_level');
    }

    /**
     * 工作組織類型
     * 1:公司,2.營登,3:財法,4:社法,5:公職.
     *
     * @param  int  $value
     * @return User
     */
    public function setOrganizationType($value)
    {
        return $this->setParameter('organization_type', $value);
    }

    /**
     * @return int|null
     */
    public function getOrganizationType()
    {
        return $this->getParameter('organization_type');
    }

    /**
     * 消費者公司統一編號(營登/財法/社法).
     *
     * @param  string  $value
     * @return User
     */
    public function setOrganizationId($value)
    {
        return $this->setParameter('organization_id', $value);
    }

    /**
     * @return string|null
     */
    public function getOrganizationId()
    {
        return $this->getParameter('organization_id');
    }

    /**
     * 消費者公司名稱(服務單位).
     *
     * @param  string  $value
     * @return User
     */
    public function setOrganizationName($value)
    {
        return $this->setParameter('organization_name', $value);
    }

    /**
     * @return string|null
     */
    public function getOrganizationName()
    {
        return $this->getParameter('organization_name');
    }

    /**
     * 消費者公司電話(服務單位電話):區碼
     *
     * @param  string  $value
     * @return User
     */
    public function setOrganizationPhoneAreaCode($value)
    {
        return $this->setParameter('organization_phone_area_code', $value);
    }

    /**
     * @return string|null
     */
    public function getOrganizationPhoneAreaCode()
    {
        return $this->getParameter('organization_phone_area_code');
    }

    /**
     * 消費者公司電話(服務單位電話):電話號碼
     *
     * @param  string  $value
     * @return User
     */
    public function setOrganizationPhone($value)
    {
        return $this->setParameter('organization_phone', $value);
    }

    /**
     * @return string|null
     */
    public function getOrganizationPhone()
    {
        return $this->getParameter('organization_phone');
    }

    /**
     * 消費者公司電話(服務單位電話):分機號碼
     *
     * @param  string  $value
     * @return User
     */
    public function setOrganizationPhoneExt($value)
    {
        return $this->setParameter('organization_phone_ext', $value);
    }

    /**
     * @return string|null
     */
    public function getOrganizationPhoneExt()
    {
        return $this->getParameter('organization_phone_ext');
    }

    /**
     * 消費者工作年資.
     *
     * @param  int  $value
     * @return User
     */
    public function setWorkingYears($value)
    {
        return $this->setParameter('working_years', $value);
    }

    /**
     * @return int|null
     */
    public function getWorkingYears()
    {
        return $this->getParameter('working_years');
    }

    /**
     * 消費者月薪.
     *
     * @param  int  $value
     * @return User
     */
    public function setMonthlySalary($value)
    {
        return $this->setParameter('monthly_salary', $value);
    }

    /**
     * @return int|null
     */
    public function getMonthlySalary()
    {
        return $this->getParameter('monthly_salary');
    }

    /**
     * 消費者法定代理人:姓名.
     *
     * @param  string  $value
     * @return User
     */
    public function setLegalRepresentativeName($value)
    {
        return $this->setParameter('legal_representative_name', $value);
    }

    /**
     * @return string|null
     */
    public function getLegalRepresentativeName()
    {
        return $this->getParameter('legal_representative_name');
    }

    /**
     * 消費者法定代理人:身分證字號
     *
     * @param  string  $value
     * @return User
     */
    public function setLegalRepresentativePersonalId($value)
    {
        return $this->setParameter('legal_representative_personal_id', $value);
    }

    /**
     * @return string|null
     */
    public function getLegalRepresentativePersonalId()
    {
        return $this->getParameter('legal_representative_personal_id');
    }

    /**
     * 消費者法定代理人:出生日期(格式為 YYYYMMDD，如20090916).
     *
     * @param  string  $value
     * @return User
     */
    public function setLegalRepresentativeBirthday($value)
    {
        return $this->setParameter('legal_representative_birthday', $value);
    }

    /**
     * @return string|null
     */
    public function getLegalRepresentativeBirthday()
    {
        return $this->getParameter('legal_representative_birthday');
    }

    /**
     * 消費者法定代理人:聯絡地址:郵遞區號
     *
     * @param  string  $value
     * @return User
     */
    public function setLegalRepresentativeContactAddressPostZone($value)
    {
        return $this->setParameter('legal_representative_contact_address_post_zone', $value);
    }

    /**
     * @return string|null
     */
    public function getLegalRepresentativeContactAddressPostZone()
    {
        return $this->getParameter('legal_representative_contact_address_post_zone');
    }

    /**
     * 消費者法定代理人:聯絡地址:路街巷弄號樓.
     *
     * @param  string  $value
     * @return User
     */
    public function setLegalRepresentativeContactAddress($value)
    {
        return $this->setParameter('legal_representative_contact_address', $value);
    }

    /**
     * @return string|null
     */
    public function getLegalRepresentativeContactAddress()
    {
        return $this->getParameter('legal_representative_contact_address');
    }

    /**
     * 消費者法定代理人:住家電話:區碼
     *
     * @param  string  $value
     * @return User
     */
    public function setLegalRepresentativeHomePhoneAreaCode($value)
    {
        return $this->setParameter('legal_representative_home_phone_area_code', $value);
    }

    /**
     * @return string|null
     */
    public function getLegalRepresentativeHomePhoneAreaCode()
    {
        return $this->getParameter('legal_representative_home_phone_area_code');
    }

    /**
     * 消費者法定代理人:住家電話:電話號碼
     *
     * @param  string  $value
     * @return User
     */
    public function setLegalRepresentativeHomePhone($value)
    {
        return $this->setParameter('legal_representative_home_phone', $value);
    }

    /**
     * @return string|null
     */
    public function getLegalRepresentativeHomePhone()
    {
        return $this->getParameter('legal_representative_home_phone');
    }

    /**
     * 消費者法定代理人: 行動電話.
     *
     * @param  string  $value
     * @return User
     */
    public function setLegalRepresentativeCellphone($value)
    {
        return $this->setParameter('legal_representative_cellphone', $value);
    }

    /**
     * @return string|null
     */
    public function getLegalRepresentativeCellphone()
    {
        return $this->getParameter('legal_representative_cellphone');
    }
}
