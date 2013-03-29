<?php

class Dh_ShipNote_ConfigTest extends PHPUnit_Framework_TestCase
{
    /**
     * Ensure that the module has been installed and registered correctly
     */
    public function test_that_module_exists_in_config()
    {
        $moduleConfig = Mage::app()->getConfig()->getNode('modules')
            ->asArray();

        $moduleExists = array_key_exists(MODULE_NAME, $moduleConfig);
        $this->assertTrue($moduleExists);
    }

    /**
     * Ensure that the css file is present
     */
    public function test_that_the_module_css_file_exists_in_correct_theme_and_package()
    {
        $skinDir = Mage::getDesign()
            ->getSkinBaseDir(array('_theme' => 'default', '_package' => 'base'));
        $cssFile = $skinDir . '/css/shipnote.css';

        $this->assertTrue(file_exists($cssFile));
    }
}
