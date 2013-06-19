<?php

namespace Telco;

class Tariff {

    /**
     * @var string
     */
    private $code;

    /**
     * @var null|string
     */
    private $suffix;

    public function __construct($code, $suffix = null) {

        $this->code = $code;
        $this->suffix = $suffix;
    }

    /**
     * @return Sales\Product\Tariff
     */
    public function getProduct() {
        return new \Telco\Sales\Product\Tariff($this);
    }

    /**
     * @return string
     */
    public function getValue() {
        return $this->code;
    }

    /**
     * @return null|string
     */
    public function getSuffix() {
        return $this->suffix;
    }
}