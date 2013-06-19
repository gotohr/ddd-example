<?php

namespace Telco\Sales\Product\Distribution;

use Telco\Sales\Channel\Shop;
use Telco\Sales\Product\ProductInterface;

class Stock implements StockInterface {

    /**
     * @var Shop
     */
    protected $shop;

    public function __construct(Shop $shop) {

        $this->shop = $shop;
    }

    public function has(ProductInterface $product)
    {
        return true;
    }
}