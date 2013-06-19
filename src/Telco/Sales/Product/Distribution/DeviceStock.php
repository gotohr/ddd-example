<?php

namespace Telco\Sales\Product\Distribution;

use Telco\Sales\Channel\Shop;

class DeviceStock extends Stock {

    protected static $instance;

    /**
     * @param \Telco\Sales\Channel\Shop $shop
     * @return SIMStock
     */
    public static function getInstance(Shop $shop) {
        if (!self::$instance) {
            self::$instance = new SIMStock($shop);
        }
        return self::$instance;
    }
}