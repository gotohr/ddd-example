<?php

namespace Telco\Sales\Exceptions;

use Telco\Sales\Product\ProductInterface;

class ProductNotInOfferException extends SaleException {
    public function __construct(ProductInterface $product) {
        parent::__construct("$product not in offer!");
    }
}