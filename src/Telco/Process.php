<?php

namespace Telco;

use Telco\Rules\Ruler;

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
        return "VOICE";
    }

    /**
     * @param $ruleName
     * @param callable $arguments
     * @return Rules\Rule
     */
    public function runRule($ruleName, \Closure $arguments) {
        $ruler = new Ruler($this, array(
            $ruleName
        ));

        $rules = $ruler->addCommonArguments($arguments())->execute();
        return $rules[$ruleName];
    }

}