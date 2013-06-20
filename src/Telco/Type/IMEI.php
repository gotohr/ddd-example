<?php

namespace Telco\Type;

/**
 * International Mobile Station Equipment Identity
 *
 * *#06# - type in your cellphone
 *
 * @link http://en.wikipedia.org/wiki/International_Mobile_Station_Equipment_Identity
 * @package Telco\Type
 */
class IMEI {

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