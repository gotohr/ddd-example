<?php

namespace Telco\Sales\Product\Distribution;

use Telco\Sales\Product\ProductInterface;

interface StockInterface {

    public function has(ProductInterface $product);

}