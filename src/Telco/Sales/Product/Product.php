<?php

namespace Telco\Sales\Product;

use Telco\Sales\Channel\Shop;
use Telco\Sales\Product\Distribution\StockInterface;

class Product implements ProductInterface{

    /**
     * @param Shop $shop
     * @return bool
     */
    public function isAvailableAt(Shop $shop)
    {
        return $this->getStock($shop)->has($this);
    }

    /**
     * @param \Telco\Sales\Channel\Shop $shop
     * @return StockInterface
     */
    public function getStock(Shop $shop)
    {
        // TODO: Implement getStock() method.
    }

    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    public function getOffer()
    {
        // TODO: Implement getOffer() method.
    }

    public function __toString() {
        return get_called_class() . ' ' . $this->getName();
    }

    /**
     * @param Shop $shop
     * @return mixed
     */
    public function sellAt(Shop $shop)
    {
        return $this;
    }
}