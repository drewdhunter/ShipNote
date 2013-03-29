<?php

class Dh_ShipNote_Helper_DataTest extends PHPUnit_Framework_TestCase
{
    private $helper;

    public function setUp()
    {
        $this->helper = new Dh_ShipNote_Helper_Data();
    }

    public function test_is_enabled_store_config_path_exists()
    {
        $storeConfig = Mage::getStoreConfig(Dh_ShipNote_Helper_Data::STORE_CONFIG_PATH_ENABLED);
        $this->assertNotNull($storeConfig, "Store config path enabled does not exist");
    }

    public function test_frontend_label_store_config_path_exists()
    {
        $storeConfig = Mage::getStoreConfig(Dh_ShipNote_Helper_Data::STORE_CONFIG_PATH_FRONTEND_LABEL);
        $this->assertNotNull($storeConfig, "Store config path frontend label does not exist");
    }
}
