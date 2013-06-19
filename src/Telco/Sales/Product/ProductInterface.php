<?php

namespace Telco\Sales\Product;

use Telco\Sales\Channel\Shop;

interface ProductInterface {

    /**
     * @return string
     */
    public function getName();

    public function getOffer();

    /**
     * @param \Telco\Sales\Channel\Shop $shop
     * @return StockInterface
     */
    public function getStock(Shop $shop);

    /**
     * @param Shop $shop
     * @return bool
     */
    public function isAvailableAt(Shop $shop);
}