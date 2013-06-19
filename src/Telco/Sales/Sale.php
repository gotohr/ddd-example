<?php

namespace Telco\Sales;

use Telco\Process;
use Telco\Sales\Channel\Shop;
use Telco\Sales\Exceptions\ProductNotAvailableException;
use Telco\Sales\Exceptions\ProductNotInOfferException;
use Telco\Sales\Product\ProductInterface;

class Sale {

    /**
     * @var Channel\Shop
     */
    private $atShop;
    /**
     * @var \Telco\Process
     */
    private $inProcess;

    /**
     * @var ProductInterface[]
     */
    protected $products;

    /**
     * @var Transaction
     */
    protected $transaction;

    public function __construct(Shop $atShop, Process $inProcess) {

        $this->atShop = $atShop;
        $this->inProcess = $inProcess;
    }

    /**
     * @return ProductInterface
     */
    public function getProducts() {
        return $this->products;
    }

    /**
     * @param ProductInterface $products
     * @return Sale
     */
    public function setProducts($products) {
        $this->products = $products;
        return $this;
    }

    /**
     * @return bool
     * @throws Exceptions\ProductNotInOfferException
     * @throws Exceptions\ProductNotAvailableException
     */
    public function isPossible() {
        foreach($this->getProducts() as $product) {
            if ($this->inProcess->getSupportedOffer() != $product->getOffer()) {
                throw new ProductNotInOfferException($product);
            }
            if (!$product->isAvailableAt($this->atShop)) {
                throw new ProductNotAvailableException($product);
            }
        }
        return true;
    }

    /**
     * @return Sale
     */
    public function execute() {

        foreach($this->getProducts() as $product) {
            try {
                $this->getTransaction()->acknowledge($product->sell($this->atShop));
            } catch (ProductSaleException $psex) {
                $this->undo();
            }
        }

        $this->getTransaction()->log();

        return $this;
    }

    /**
     * @return Transaction
     */
    public function getTransaction() {
        if (!$this->transaction) {
            $this->transaction = new Transaction($this);
        }
        return $this->transaction;
    }

    public function __toString() {
        $msg = "Shop %s made sale in process %s with products %s";
        return sprintf(
            $msg,
            $this->atShop->getValue(),
            $this->inProcess->getValue(),
            implode(',', $this->getProducts())
        );
    }
}