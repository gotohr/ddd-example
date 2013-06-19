<?php

namespace Telco\Rules;

use Exception;

class RuleNotDefinedException extends Exception {

    /**
     * @param string $ruleName
     */
    public function __construct($ruleName) {
        parent::__construct(sprintf("Rule [%s] not defined",
            $ruleName
        ));
    }
    
}