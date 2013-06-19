<?php

namespace T2\Model\Sales\Channel\ResellerTool\Rules;

class RuleException extends \Exception {
    public function __construct() {
        parent::__construct('Something went wrong!');
    }
    
}