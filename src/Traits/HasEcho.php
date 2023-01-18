<?php

namespace Omnipay\MyPay\Traits;

trait HasEcho
{
    /**
     * @param  string  $value
     * @return $this
     */
    public function setEcho0($value)
    {
        return $this->setParameter('echo_0', $value);
    }

    /**
     * @return string|null
     */
    public function getEcho0()
    {
        return $this->getParameter('echo_0');
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function setEcho1($value)
    {
        return $this->setParameter('echo_1', $value);
    }

    /**
     * @return string|null
     */
    public function getEcho1()
    {
        return $this->getParameter('echo_1');
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function setEcho2($value)
    {
        return $this->setParameter('echo_2', $value);
    }

    /**
     * @return string|null
     */
    public function getEcho2()
    {
        return $this->getParameter('echo_2');
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function setEcho3($value)
    {
        return $this->setParameter('echo_3', $value);
    }

    /**
     * @return string|null
     */
    public function getEcho3()
    {
        return $this->getParameter('echo_3');
    }

    /**
     * @param  string  $value
     * @return $this
     */
    public function setEcho4($value)
    {
        return $this->setParameter('echo_4', $value);
    }

    /**
     * @return string|null
     */
    public function getEcho4()
    {
        return $this->getParameter('echo_4');
    }
}
