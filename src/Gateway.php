<?php

namespace Omnipay\MyPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\MyPay\Message\PurchaseRequest;
use Omnipay\MyPay\Traits\HasDefaults;

/**
 * MyPay Gateway.
 * @method NotificationInterface acceptNotification(array $options = [])
 * @method RequestInterface authorize(array $options = [])
 * @method RequestInterface completeAuthorize(array $options = [])
 * @method RequestInterface capture(array $options = [])
 * @method RequestInterface completePurchase(array $options = [])
 * @method RequestInterface refund(array $options = [])
 * @method RequestInterface fetchTransaction(array $options = [])
 * @method RequestInterface void(array $options = [])
 * @method RequestInterface createCard(array $options = [])
 * @method RequestInterface updateCard(array $options = [])
 * @method RequestInterface deleteCard(array $options = [])
 */
class Gateway extends AbstractGateway
{
    use HasDefaults;

    public function getName()
    {
        return 'MyPay';
    }

    public function getDefaultParameters()
    {
        return [
            'store_uid' => '',
            'key' => '',
            'testMode' => false,
        ];
    }

    /**
     * @return AbstractRequest
     */
    public function purchase(array $options = [])
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }
}
