<?php

namespace Omnipay\MyPay;

use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\Random;

class Encryptor
{
    /**
     * @var AES
     */
    private $cipher;

    /**
     * Encryption constructor.
     *
     * @param  null  $key
     */
    public function __construct($key = null)
    {
        $this->cipher = new AES('cbc');
        $this->setKey($key);
    }

    /**
     * @param  string  $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->cipher->setKey($key);

        return $this;
    }

    /**
     * @return string
     */
    public function encrypt(array $data)
    {
        $iv = Random::string(16);

        return base64_encode($iv.$this->updateIv($iv)->encrypt(json_encode($data)));
    }

    /**
     * @param  string  $plainText
     * @return mixed
     */
    public function decrypt($plainText)
    {
        $binary = base64_decode($plainText);
        $iv = substr($binary, 0, 16);

        return json_decode($this->updateIv($iv)->decrypt(substr($binary, 16)), true);
    }

    /**
     * @param  string  $iv
     * @return AES
     */
    private function updateIV($iv)
    {
        $this->cipher->setIV($iv);

        return $this->cipher;
    }
}
