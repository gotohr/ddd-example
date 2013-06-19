<?php

namespace Telco;

use Telco\Type\ICCID;

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