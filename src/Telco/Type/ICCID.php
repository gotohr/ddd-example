<?php

namespace Telco\Type;


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