<?php

namespace Omnipay\MyPay\Message;

use Omnipay\MyPay\Encryption;
use Omnipay\MyPay\Traits\HasKey;
use Omnipay\MyPay\Traits\HasUid;

class FetchTransactionRequest extends AbstractRequest
{
    use HasKey;
    use HasUid;

    public function getData()
    {
        $this->validate('uid', 'key');

        return ['uid' => $this->getUid(), 'key' => $this->getKey()];
    }

    protected function createBody(Encryption $encryption, array $data)
    {
        return [
            'store_uid' => $this->getStoreUid(),
            'service' => $encryption->encrypt([
                'service_name' => 'api',
                'cmd' => 'api/queryorder',
            ]),
            'encry_data' => $encryption->encrypt($data),
        ];
    }

    /**
     * @param $data
     * @return FetchTransactionResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new FetchTransactionResponse($this, $data);
    }
}
