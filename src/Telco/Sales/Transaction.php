<?php

namespace Telco\Sales;

use Telco\Sales\Product\ProductInterface;

class Transaction {
    /**
     * @var Sale
     */
    private $sale;

    private $items;

    public function __construct(Sale $sale) {

        $this->sale = $sale;
    }

    public function log() {

    }

    public function abort() {

    }

    public function acknowledge(ProductInterface $product) {
        $this->items[] = $product;
    }

    /**
     * @return ProductInterface[]
     */
    public function getItems()
    {
        return $this->items;
    }
}