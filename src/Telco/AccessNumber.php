<?php

namespace Telco;

use Telco\Type\MSISDN;

class AccessNumber {

    /**
     * @var Type\MSISDN
     */
    private $msisdn;

    /**
     * @param MSISDN $msisdn
     */
    public function __construct(MSISDN $msisdn = null) {

        $this->msisdn = $msisdn;
    }
}