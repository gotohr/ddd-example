<?php

namespace Telco\Sales\Exceptions;

class SaleException extends \Exception {
    public function __construct($msg) {
        parent::__construct($msg);
    }
}