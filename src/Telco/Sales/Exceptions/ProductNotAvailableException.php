<?php

namespace Telco\Sales\Exceptions;

use Telco\Sales\Product\ProductInterface;

class ProductNotAvailableException extends SaleException {
    public function __construct(ProductInterface $product) {
        parent::__construct($product->getName() . ' not available!');
    }
}