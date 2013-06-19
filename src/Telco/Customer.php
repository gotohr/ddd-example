<?php

namespace Telco;

use Telco\Type\OIB;

class Customer {

    /**
     * @var OIB
     */
    protected $oib;

    /**
     * @param OIB $oib
     */
    public function __construct(OIB $oib = null) {
        $this->oib = $oib;
    }

    /**
     * @return OIB
     */
    public function getOib()
    {
        return $this->oib;
    }

    /**
     * @param OIB $oib
     */
    public function setOib($oib)
    {
        $this->oib = $oib;
    }
}