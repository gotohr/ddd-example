<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ljubo
 * Date: 19.6.13.
 * Time: 21:27
 * To change this template use File | Settings | File Templates.
 */

namespace Telco\Sales\Product;


class Tariff {

    /**
     * @var \Telco\Tariff
     */
    private $tariff;

    public function __construct(\Telco\Tariff $tariff) {

        $this->tariff = $tariff;
    }

    /**
     * @return \Telco\Tariff
     */
    public function getTariff()
    {
        return $this->tariff;
    }

    /**
     * @param \Telco\Tariff $tariff
     */
    public function setTariff($tariff)
    {
        $this->tariff = $tariff;
    }
}