<?php

namespace Telco;

use Telco\Type\MSISDN;

class AccessNumber {

    /**
     * @var Type\MSISDN
     */
    private $msisdn;

    public function __construct(MSISDN $msisdn = null) {

        $this->msisdn = $msisdn;
    }
}