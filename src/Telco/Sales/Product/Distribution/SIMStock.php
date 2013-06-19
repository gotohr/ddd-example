<?php

namespace Telco\Sales\Product\Distribution;

use Telco\Sales\Channel\Shop;

class SIMStock extends Stock {

    protected static $instance;

    /**
     * @param \Telco\Sales\Channel\Shop $shop
     * @return DeviceStock
     */
    public static function getInstance(Shop $shop) {
        if (!self::$instance) {
            self::$instance = new DeviceStock($shop);
        }
        return self::$instance;
    }
}