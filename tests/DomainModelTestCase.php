<?php

/*
Prodaja telekomunikacijskih usluga korisniku
koji se nalazi unutar dućana i dolazi potpisati novu pretplatu,
ali ne smije biti dužan niti frauder,
te mu se mora ponuditi ponuda tarifa za nove korisnike,
pripadajuća lista telefona i promocija.
Telefoni i SIM kartica moraju biti zaprimljeni na skladištu
te odgovarajućeg tipa koji je potreban za aktivaciju.
Po završetku procesa se skidaju sa skladišta i
obilježavaju kao prodani.
 */
use Telco\AccessNumber;
use Telco\Customer;
use Telco\Device;
use Telco\Process;
use Telco\Rules\Ruler;
use Telco\Sales\Channel\Shop;
use Telco\Sales\Exceptions\SaleException;
use Telco\SIM;
use Telco\Type\ICCID;
use Telco\Type\IMEI;
use Telco\Type\MSISDN;
use Telco\Type\OIB;

class DomainModelTestCase extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     */
    public function createNewSubscription() {
        $request = array(
            'process' => 'NewSubscription',
            'shop' => 'qwe123',
            'oib' => '12345678901',
            'msisdn' => '951234567',
            'imei' => '555555555555559',
            'iccid' => '12345123451234512345',
            'tariff'=> array(
                'code' => 'TB150G',
                'suffix' => 'RA'
            ),
            'promotion' => 245,
        );

        $shop = new Shop($request['shop']);
        $oib = new OIB($request['oib']);
        $msisdn = new MSISDN($request['msisdn']);
        $imei = new IMEI($request['imei']);
        $iccid = new ICCID($request['iccid']);

        $validables = array($shop, $oib, $msisdn, $imei, $iccid);
        $this->validateRequest($validables);

        $customer = new Customer($oib);

        $ruler = new Ruler(new Process(), array(
            'CustomerIsNotFrauder'
        ));

        $rules = $ruler->addCommonArguments(array(
            'customer' => $customer
        ))->execute();

        $customerIsNotFrauder = $rules['CustomerIsNotFrauder']->getResult();

        $this->assertTrue(
            $customerIsNotFrauder,
            sprintf("Customer with oib %s is frauder",
                $customer->getOib()->getValue()
            )
        );

        $accessNumber = new AccessNumber($msisdn);
        $device = new Device($imei);
        $sim = new SIM($iccid);

        $process = new Process($request['process']);
        $products = array(
            $device->getProduct(),
            $sim->getProduct()
        );
        try {
            $sale = $shop->sell($products, $process);
            echo "$sale";
        } catch (SaleException $sex) {

        }

    }

    protected function validateRequest($validables) {
        foreach($validables as $validable) {
            $this->assertTrue(
                $validable->isValid(),
                sprintf("class %s with value %s is not valid",
                    get_class($validable),
                    $validable->getValue()
                )
            );
        }
    }

}