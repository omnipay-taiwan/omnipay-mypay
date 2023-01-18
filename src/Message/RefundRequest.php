<?php

namespace Omnipay\MyPay\Message;

use Omnipay\MyPay\Encryption;
use Omnipay\MyPay\Traits\HasCost;
use Omnipay\MyPay\Traits\HasKey;
use Omnipay\MyPay\Traits\HasStore;
use Omnipay\MyPay\Traits\HasUid;

class RefundRequest extends AbstractRequest
{
    use HasStore;
    use HasUid;
    use HasKey;
    use HasCost;

    /**
     * 4.作廢或作廢重開(預設)
     * 6.折讓 如有電子發票此欄位有效.
     *
     * @param  int  $value
     * @return $this
     */
    public function setInvoiceState($value)
    {
        return $this->setParameter('invoice_state', $value);
    }

    /**
     * @return int
     */
    public function getInvoiceState()
    {
        return $this->getParameter('invoice_state') ?: 4;
    }

    public function getData()
    {
        $this->validate('key', 'uid', 'amount');

        return [
            'key' => $this->getKey(),
            'uid' => $this->getUid(),
            'cost' => $this->getAmount(),
            'invoice_state' => $this->getInvoiceState(),
        ];
    }

    protected function createBody(Encryption $encryption, array $data)
    {
        return [
            'store_uid' => $this->getStoreUid(),
            'service' => $encryption->encrypt([
                'service_name' => 'api',
                'cmd' => 'api/refund',
            ]),
            'encry_data' => $encryption->encrypt($data),
        ];
    }

    protected function createResponse($data)
    {
        return $this->response = new RefundResponse($this, $data);
    }
}
