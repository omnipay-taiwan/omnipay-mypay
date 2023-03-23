<?php

namespace Omnipay\MyPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\MyPay\Message\AcceptNotificationRequest;
use Omnipay\MyPay\Message\CompletePurchaseRequest;
use Omnipay\MyPay\Message\FetchTransactionRequest;
use Omnipay\MyPay\Message\PurchaseRequest;
use Omnipay\MyPay\Message\RefundRequest;
use Omnipay\MyPay\Traits\HasLocale;
use Omnipay\MyPay\Traits\HasStore;

/**
 * MyPay Gateway.
 *
 * @method RequestInterface authorize(array $options = [])
 * @method RequestInterface completeAuthorize(array $options = [])
 * @method RequestInterface capture(array $options = [])
 * @method RequestInterface void(array $options = [])
 * @method RequestInterface createCard(array $options = [])
 * @method RequestInterface updateCard(array $options = [])
 * @method RequestInterface deleteCard(array $options = [])
 */
class Gateway extends AbstractGateway
{
    use HasStore;
    use HasLocale;

    public function getName()
    {
        return 'MyPay';
    }

    public function getDefaultParameters()
    {
        return [
            'store_uid' => '',
            'store_key' => '',
            'testMode' => false,
        ];
    }

    /**
     * @return RequestInterface
     */
    public function purchase(array $options = [])
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * @return RequestInterface
     */
    public function completePurchase(array $options = [])
    {
        return $this->createRequest(CompletePurchaseRequest::class, $options);
    }

    /**
     * @return RequestInterface
     */
    public function acceptNotification(array $options = [])
    {
        return $this->createRequest(AcceptNotificationRequest::class, $options);
    }

    /**
     * @return RequestInterface
     */
    public function fetchTransaction(array $options = [])
    {
        return $this->createRequest(FetchTransactionRequest::class, $options);
    }

    /**
     * @return RequestInterface
     */
    public function refund(array $options = [])
    {
        return $this->createRequest(RefundRequest::class, $options);
    }
}
