<?php

namespace Telco\Type;

/**
 * ...is a number uniquely identifying a subscription in a GSM or a UMTS mobile network.
 *
 * @link http://en.wikipedia.org/wiki/MSISDN
 * @package Telco\Type
 */
class MSISDN {

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