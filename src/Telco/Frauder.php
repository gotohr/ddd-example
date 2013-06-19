<?php

namespace Telco;

class Frauder {

    /**
     * @var Customer
     */
    private $customer;

    public function __construct(Customer $customer) {

        $this->customer = $customer;
    }
    /**
     * @return bool
     */
    public function check() {
        return false;
    }
}