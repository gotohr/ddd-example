<?php

namespace Telco\Rules;

use Exception;
use Telco\Rules\Rule;

class RuleArgumentNotDefinedException extends Exception {
    public function __construct(Rule $rule, $argumentName) {
        parent::__construct(sprintf("Rule [%s] in process [%s] requires argument [%s]", 
            $rule->getRuleName(), 
            $rule->getProcess()->getValue(), 
            $argumentName
        ));
    }
    
}