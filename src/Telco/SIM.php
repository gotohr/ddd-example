<?php

namespace Telco;

use Telco\Type\ICCID;

/**
 * A subscriber identity module or subscriber identification module (SIM)
 * is an integrated circuit that securely stores
 * the international mobile subscriber identity (IMSI)
 * and the related key used to identify and authenticate subscribers
 * on mobile telephony devices (such as mobile phones and computers).
 *
 * @link http://en.wikipedia.org/wiki/Subscriber_identity_module
 * @package Telco
 */
class SIM {

    /**
     * @var Type\ICCID
     */
    private $iccid;

    public function __construct(ICCID $iccid = null) {

        $this->iccid = $iccid;
    }

    /**
     * @return Sales\Product\SIM
     */
    public function getProduct() {
        return new \Telco\Sales\Product\SIM($this);
    }

    public function getValue() {
        return $this->getIccid()->getValue();
    }

    /**
     * @return \Telco\Type\ICCID
     */
    public function getIccid()
    {
        return $this->iccid;
    }

    /**
     * @param \Telco\Type\ICCID $iccid
     */
    public function setIccid($iccid)
    {
        $this->iccid = $iccid;
    }
}