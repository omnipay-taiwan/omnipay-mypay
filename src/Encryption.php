<?php

namespace Omnipay\MyPay;

use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\Random;

class Encryption
{
    private $key;

    /**
     * Encryption constructor.
     * @param null $key
     */
    public function __construct($key = null)
    {
        $this->setKey($key);
    }

    /**
     * @param string $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @param array $data
     * @return string
     */
    public function encrypt(array $data)
    {
        $iv = Random::string(16);

        return base64_encode($iv.$this->getCipher($iv)->encrypt(json_encode($data)));
    }

    /**
     * @param string $plainText
     * @return mixed
     */
    public function decrypt($plainText)
    {
        $binary = base64_decode($plainText);
        $iv = substr($binary, 0, 16);

        return json_decode($this->getCipher($iv)->decrypt(substr($binary, 16)), true);
    }

    /**
     * @param string $iv
     * @return AES
     */
    private function getCipher($iv)
    {
        $cipher = new AES('cbc');
        $cipher->setKey($this->key);
        $cipher->setIV($iv);

        return $cipher;
    }
}
