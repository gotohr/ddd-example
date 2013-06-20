<?php

namespace Telco\Type;

/**
 * Osobni identifikacijski broj
 *
 * @link http://www.porezna-uprava.hr/HR_OIB/Stranice/default.aspx
 * @package Telco\Type
 */
class OIB {

    /**
     * @var string
     */
    protected $value;

    public function __construct($value) {

        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isValid() {
        return true;
    }

    /**
     * @return string
     */
    public function getValue() {
        return $this->value;
    }
}