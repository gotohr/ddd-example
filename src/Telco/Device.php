<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ljubo
 * Date: 17.6.13.
 * Time: 18:10
 * To change this template use File | Settings | File Templates.
 */

namespace Telco;


use Telco\Type\IMEI;

class Device {

    /**
     * @var Type\IMEI
     */
    private $imei;

    public function __construct(IMEI $imei = null) {

        $this->imei = $imei;
    }

    /**
     * @return Sales\Product\Device
     */
    public function getProduct() {
        return new \Telco\Sales\Product\Device($this);
    }

    public function getValue() {
        return $this->getImei()->getValue();
    }

    /**
     * @return \Telco\Type\IMEI
     */
    public function getImei()
    {
        return $this->imei;
    }

    /**
     * @param \Telco\Type\IMEI $imei
     */
    public function setImei($imei)
    {
        $this->imei = $imei;
    }
}