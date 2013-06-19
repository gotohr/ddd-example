<?php

namespace Telco\Sales\Product;


use Telco\Sales\Product\Distribution\DeviceStock;
use Telco\Sales\Product\Distribution\StockInterface;

class Device extends Product {

    /**
     * @var \Telco\Device
     */
    private $device;

    public function __construct(\Telco\Device $device) {

        $this->device = $device;
    }
    /**
     * @param Shop $shop
     * @return StockInterface
     */
    public function getStock(Shop $shop)
    {
        return DeviceStock::getInstance();
    }

    public function getName() {
        return $this->device->getValue();
    }

}