<?php

namespace Omnipay\MyPay\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\MyPay\Encryptor;
use Omnipay\MyPay\Item;
use Omnipay\MyPay\Traits\HasAgent;
use Omnipay\MyPay\Traits\HasAmount;
use Omnipay\MyPay\Traits\HasCardLess;
use Omnipay\MyPay\Traits\HasEcho;
use Omnipay\MyPay\Traits\HasEWallet;
use Omnipay\MyPay\Traits\HasInvoice;
use Omnipay\MyPay\Traits\HasLocale;
use Omnipay\MyPay\Traits\HasOrderInfo;
use Omnipay\MyPay\Traits\HasRegular;
use Omnipay\MyPay\Traits\HasUserInfo;

/**
 * Purchase Request.
 *
 * @method PurchaseResponse send()
 */
class PurchaseRequest extends AbstractRequest
{
    use HasOrderInfo;
    use HasUserInfo;
    use HasRegular;
    use HasEcho;
    use HasEWallet;
    use HasCardLess;
    use HasInvoice;
    use HasLocale;
    use HasAgent;
    use HasAmount;

    public function setVouchers($value)
    {
        return $this->setParameter('vouchers', $value);
    }

    /**
     * @return array|null
     */
    public function getVouchers()
    {
        return $this->getParameter('vouchers');
    }

    /**
     * 折價(數值帶負數).
     *
     * @param  int  $value
     * @return $this
     */
    public function setDiscount($value)
    {
        return $this->setParameter('discount', abs($value) * -1);
    }

    /**
     * @return int|null
     */
    public function getDiscount()
    {
        return $this->getParameter('discount');
    }

    /**
     * 使用虛擬帳號、超商代碼、無卡支付(pfn=3或6或 25)
     * 透過此參數，可自行定義繳費截止日。 若無參數，則為預設系統設定值，目前為三天。
     *
     * @param  int  $value
     * @return $this
     */
    public function setLimitPayDays($value)
    {
        return $this->setParameter('limit_pay_days', $value);
    }

    /**
     * @return int|null
     */
    public function getLimitPayDays()
    {
        return $this->getParameter('limit_pay_days');
    }

    /**
     * 運費.
     *
     * @param  int  $value
     * @return $this
     */
    public function setShippingFee($value)
    {
        return $this->setParameter('shipping_fee', $value);
    }

    /**
     * @return int|null
     */
    public function getShippingFee()
    {
        return $this->getParameter('shipping_fee');
    }

    /**
     * 啟用快速結帳
     * 0.關閉 1.開啟 (預設開啟).
     *
     * @param  int  $value
     * @return $this
     */
    public function setEnableQuickpay($value)
    {
        return $this->setParameter('enable_quickpay', $value);
    }

    /**
     * @return int|null
     */
    public function getEnableQuickpay()
    {
        return $this->getParameter('enable_quickpay');
    }

    /**
     * 1網路交易(預設)/2實體交易(參閱附錄九).
     *
     * @param  int  $value
     * @return $this
     */
    public function setTransactionType($value)
    {
        return $this->setParameter('transaction_type', $value);
    }

    /**
     * @return int|null
     */
    public function getTransactionType()
    {
        return $this->getParameter('transaction_type');
    }

    /**
     * 國內信用卡分期限定顯示期數(且必須服務商與 支付頁面設定有支援)
     * 格式(JSON) 例:
     * {
     *     "3": ["013", "822", "808"],
     *     "6": ["822", "812"]
     * }
     * 其中的3或6為期數，013,822等為國內信用卡發卡單位(參考附錄十).
     *
     * @param  string  $value
     * @return $this
     */
    public function setCreditcardInstallment($value)
    {
        return $this->setParameter('creditcard_installment', $value);
    }

    /**
     * @return string
     */
    public function getCreditcardInstallment()
    {
        return $this->getParameter('creditcard_installment');
    }

    /**
     * eACH交易代碼，如有使用eACH交易，必須帶入 約定可使用之交易代碼如560，交易代碼請參考 附錄十二.
     *
     * @param  string  $value
     * @return $this
     */
    public function setEachCode($value)
    {
        return $this->setParameter('each_code', $value);
    }

    public function getEachCode()
    {
        return $this->getParameter('each_code');
    }

    /**
     * 消費者資訊(請參考下方消費者資訊欄位)
     * 如果使用此欄位資料，將取代所有消費者相同欄位內容
     * 串接『無卡分期』使用此欄位替代所有消費者欄位.
     *
     * @param  array  $value
     * @return $this
     */
    public function setUserData($value)
    {
        return $this->setParameter('user_data', $value);
    }

    public function getUserData()
    {
        return $this->getParameter('user_data');
    }

    /**
     * JSON格式(多筆紀錄)
     * id:檔案索引名稱 path: 檔案路徑
     * type: 檔案類型(格式) description: 檔案說明
     * (id:檔案索引名稱):
     * 申請人申請書:LDR23,
     * 申請人身分證正面:LDR1,
     * 申請人身分證反面:LDR2,
     * 申請人身撥款帳戶存摺封面:LDR3,
     * 申請人薪轉存摺封面:LDR24,
     * 申請人薪轉存摺內頁:LDR14,
     * 申請人勞保證明:LDR19,
     * 申請人機車行照:LDR4,
     * 申請人財力證明:LDR5,
     * 申請人其它資料:LDR25,
     * 保證人身分證正面:GRT1,
     * 保證人身分證反面:GRT2,
     * 保證人薪轉存摺封面:GRT15,
     * 保證人薪轉存摺內頁:GRT7,
     * 保證人財力證明:GRT11,
     * 保證人其它資料:GRT16.
     *
     * @param  array  $value
     * @return $this
     */
    public function setFilesPath($value)
    {
        return $this->setParameter('files_path', $value);
    }

    public function getFilesPath()
    {
        return $this->getParameter('files_path');
    }

    /**
     * @return string|null
     */
    public function getClientIp()
    {
        return parent::getClientIp() ?: $this->httpRequest->getClientIp();
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function setIp($value)
    {
        return $this->setClientIp($value);
    }

    /**
     * @return string|null
     */
    public function getIp()
    {
        return $this->getClientIp();
    }

    /**
     * @return array
     *
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate('transactionId', 'amount', 'items');

        $data = [
            'store_uid' => $this->getStoreUid(),
            'user_id' => $this->getUserId(),
            'user_name' => $this->getUserName(),
            'user_real_name' => $this->getUserRealName(),
            'user_address' => $this->getUserAddress(),
            'user_sn' => $this->getUserSn(),
            'user_phone' => $this->getUserPhone(),
            'user_cellphone_code' => $this->getUserCellphoneCode(),
            'user_cellphone' => $this->getUserCellphone(),
            'user_email' => $this->getUserEmail(),
            'user_birthday' => $this->getUserBirthday(),
            'cost' => $this->getAmount(),
            'currency' => $this->getCurrency(),
            'order_id' => $this->getTransactionId(),
            'regular' => $this->getRegular(),
            'regular_total' => $this->getRegularTotal(),
            'group_id' => $this->getGroupId(),
            'ip' => $this->getClientIp(),
            'echo_0' => $this->getEcho0(),
            'echo_1' => $this->getEcho1(),
            'echo_2' => $this->getEcho2(),
            'echo_3' => $this->getEcho3(),
            'echo_4' => $this->getEcho4(),
            'pfn' => $this->getPaymentMethod() ?: 'all',
            'success_returl' => $this->getReturnUrl(),
            'failure_returl' => $this->getReturnUrl(),
            'discount' => $this->getDiscount(),
            'limit_pay_days' => $this->getLimitPayDays(),
            'shipping_fee' => $this->getShippingFee(),
            'enable_quickpay' => $this->getEnableQuickpay(),
            'enable_ewallet' => $this->getEnableEwallet(),
            'virtual_pan' => $this->getVirtualPan(),
            'ewallet_type' => $this->getEwalletType(),
            'regular_first_charge_data' => $this->getRegularFirstChargeDate(),
            'transaction_type' => $this->getTransactionType(),
            'creditcard_installment' => $this->getCreditcardInstallment(),
            'cardless_code' => $this->getCardlessCode(),
            'cardless_installment' => $this->getCardlessInstallment(),
            'issue_invoice_state' => $this->getIssueInvoiceState(),
            'invoice_ratetype' => $this->getInvoiceRatetype(),
            'invoice_b2b_title' => $this->getInvoiceB2bTitle(),
            'invoice_b2b_title_force' => $this->getInvoiceB2bTitleForce(),
            'invoice_b2b_id' => $this->getInvoiceB2bId(),
            'invoice_b2b_id_force' => $this->getInvoiceB2bIdForce(),
            'invoice_b2b_address' => $this->getInvoiceB2bAddress(),
            'invoice_b2b_address_force' => $this->getInvoiceB2bAddressForce(),
            'each_code' => $this->getEachCode(),
            'files_path' => $this->getFilesPath(),
            'agent_sms_fee_type' => $this->getAgentSmsFeeType(),
            'agent_charge_fee_type' => $this->getAgentChargeFeeType(),
            'agent_charge_fee' => $this->getAgentChargeFee(),
        ];

        return $this->appendUserData(
            $this->appendVouchers(
                $this->appendItems(
                    $this->filter($data)
                )
            )
        );
    }

    /**
     * @return array
     */
    protected function createBody(Encryptor $encryption, array $data)
    {
        return [
            'store_uid' => $this->getStoreUid(),
            'service' => $encryption->encrypt([
                'service_name' => 'api',
                'cmd' => 'api/orders',
            ]),
            'encry_data' => $encryption->encrypt($data),
        ];
    }

    /**
     * @return PurchaseResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    /**
     * @return array
     */
    private function appendItems(array $data)
    {
        $items = $this->getItems();
        $data['item'] = count($items);
        foreach ($items as $index => $item) {
            $data['i_'.$index.'_id'] = $item instanceof Item ? $item->getId() : md5($item->getName());
            $data['i_'.$index.'_name'] = $item->getName();
            $data['i_'.$index.'_cost'] = $item->getPrice();
            $data['i_'.$index.'_amount'] = $item->getQuantity();
            $data['i_'.$index.'_total'] = $item->getPrice() * $item->getQuantity();
        }

        return $data;
    }

    private function appendVouchers(array $data)
    {
        $vouchers = $this->getVouchers();
        if (empty($vouchers)) {
            return $data;
        }

        $data['voucher_item'] = count($vouchers);
        $totalCount = 0;
        $totalPrice = 0;
        foreach ($vouchers as $index => $voucher) {
            $quantity = $voucher->getQuantity();
            $price = $voucher->getPrice();
            $totalCount += $quantity;
            $totalPrice += $quantity * $price;

            $data['v_'.$index.'_count'] = $quantity;
            $data['v_'.$index.'_price'] = $price;
            $data['v_'.$index.'_cost'] = $voucher->getCost();
            $data['v_'.$index.'_assure_start'] = $voucher->getAssureStart();
            $data['v_'.$index.'_assure_end'] = $voucher->getAssureEnd();
            $data['v_'.$index.'_validity_start'] = $voucher->getValidityStart();
            $data['v_'.$index.'_validity_end'] = $voucher->getValidityEnd();
        }
        $data['voucher_total_count'] = $totalCount;
        $data['voucher_total_price'] = $totalPrice;

        return $data;
    }

    private function appendUserData(array $data)
    {
        $users = $this->getUserData();
        if (empty($users)) {
            return $data;
        }

        $userData = [];
        $ip = $this->getClientIp();
        foreach ($users as $user) {
            $temp = $user->getParameters();
            $temp['ip'] = $ip;
            $userData[] = $temp;
        }
        $data['user_data'] = $userData;

        return $data;
    }

    /**
     * @return array
     */
    private function filter(array $data)
    {
        return array_filter($data, static function ($value) {
            return $value !== null;
        });
    }
}
