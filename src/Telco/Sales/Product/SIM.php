<?php

namespace Telco\Sales\Product;

use Telco\Sales\Channel\Shop;
use Telco\Sales\Product\Distribution\SIMStock;
use Telco\Sales\Product\Distribution\StockInterface;

class SIM extends Product {

    /**
     * @var \Telco\SIM
     */
    private $sim;

    public function __construct(\Telco\SIM $sim) {

        $this->sim = $sim;
    }

    public function getName() {
        return $this->getSim()->getValue();
    }

    /**
     * @param Shop $shop
     * @return StockInterface
     */
    public function getStock(Shop $shop) {
        return SIMStock::getInstance($shop);
    }

    /**
     * @return \Telco\SIM
     */
    public function getSim()
    {
        return $this->sim;
    }

    /**
     * @param \Telco\SIM $sim
     */
    public function setSim($sim)
    {
        $this->sim = $sim;
    }

    public function getOffer() {
        return "VOICE";
    }

}