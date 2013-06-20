<?php

namespace Telco\Type;

/**
 * Each SIM is internationally identified by its integrated circuit card identifier (ICCID)
 *
 * @link http://en.wikipedia.org/wiki/Subscriber_identity_module#ICCID
 * @package Telco\Type
 */
class ICCID {

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