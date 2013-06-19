<?php

namespace Telco;

class Process {

    private $name;

    /**
     * @param $name
     */
    public function __construct($name = '') {

        $this->name = $name;
    }

    public function isValid() {
        return (bool) $this->name;
    }

    public function getValue() {
        return $this->name;
    }

    public function getSupportedOffer() {

    }

}