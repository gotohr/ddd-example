<?php

namespace Telco\Sales;

class Transaction {
    /**
     * @var Sale
     */
    private $sale;

    public function __construct(Sale $sale) {

        $this->sale = $sale;
    }

    public function log() {

    }

    public function abort() {

    }
}