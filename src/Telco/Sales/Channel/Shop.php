<?php

namespace Telco\Sales\Channel;

use Telco\Process;
use Telco\Sales\Exceptions\SaleException;
use Telco\Sales\Product\ProductInterface;
use Telco\Sales\Exceptions\ProductNotAvailableException;
use Telco\Sales\Exceptions\ProductNotInOfferException;
use Telco\Sales\Sale;

class Shop {

    /**
     * @var string
     */
    private $shopId;

    /**
     * @var Sale
     */
    protected $sale;

    /**
     * @param $shopId
     */
    public function __construct($shopId) {

        $this->shopId = $shopId;
    }

    /**
     * @return bool
     */
    public function isValid() {
        return true;
    }

    /**
     * @return string
     */
    public function getValue() {
        return $this->shopId;
    }

    /**
     * @param ProductInterface[] $products
     * @param Process $inProcess
     * @return null|\Telco\Sales\Sale
     */
    public function sell($products, Process $inProcess) {
        $sale = $this->createSale($inProcess)->setProducts($products);
        if ($sale->isPossible()) {
            return $sale->execute();
        }
        return null;
    }

    /**
     * @param Process $inProcess
     * @return Sale
     */
    public function createSale(Process $inProcess) {
        if (!$this->sale) {
            $this->sale = new Sale($this, $inProcess);
        }
        return $this->sale;
    }
}