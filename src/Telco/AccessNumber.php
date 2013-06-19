<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ljubo
 * Date: 17.6.13.
 * Time: 18:11
 * To change this template use File | Settings | File Templates.
 */

namespace Telco;


use Telco\Type\MSISDN;

class AccessNumber {

    /**
     * @var Type\MSISDN
     */
    private $msisdn;

    public function __construct(MSISDN $msisdn = null) {

        $this->msisdn = $msisdn;
    }
}