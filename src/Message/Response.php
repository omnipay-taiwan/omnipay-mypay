<?php

namespace Omnipay\MyPay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Response.
 */
class Response extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * Response code.
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return $this->data['code'];
    }

    public function isSuccessful()
    {
        return false;
    }

    /**
     * Does the response require a redirect?
     *
     * @return bool
     */
    public function isRedirect()
    {
        return (string) $this->getCode() === '200';
    }

    /**
     * Response Message.
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return $this->data['msg'];
    }

    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        $locale = $this->request->getLocale();
        $locale = $locale ? '?locale='.$locale : '';

        return $this->data['url'].$locale;
    }

    /**
     * Gateway Reference.
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        return $this->data['uid'];
    }
}
