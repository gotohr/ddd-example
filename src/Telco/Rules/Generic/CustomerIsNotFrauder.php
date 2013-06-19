<?php

namespace Telco\Rules\Generic;

use Telco\Customer;
use Telco\Frauder;
use Telco\Rules\Rule;

class CustomerIsNotFrauder extends Rule {

    protected $required_args = array('customer');

    /**
     * @return Customer
     */
    protected function getCustomer() {
        return $this->arguments['customer'];
    }

    public function execute() {
        $fraud = new Frauder($this->getCustomer());
        $isFrauder = $fraud->check();
        $this->setResult(!$isFrauder);
        $this->setMessage($isFrauder ? 'Cheater!' : 'Go on...buy stuff');
    }
}