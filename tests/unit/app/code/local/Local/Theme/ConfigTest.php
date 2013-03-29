<?php

class Local_Theme_ConfigTest extends PHPUnit_Framework_TestCase
{
    const MODULE_NAME = 'Local_Theme';

    public function testThatModuleExistsInConfig()
    {
        $moduleConfig = Mage::app()->getConfig()->getNode('modules')
            ->asArray();

        $moduleExists = array_key_exists(self::MODULE_NAME, $moduleConfig);
        $this->assertTrue($moduleExists);
    }

    public function testTheStoreThemeIsConfigured()
    {
        $config = Mage::getStoreConfig('design/package/name');
        $this->assertEquals('local', $config);
    }

    public function testTheBaseCssFileExists()
    {
        $skinDir = Mage::getSingleton('core/design_package')->getSkinBaseDir();
        $cssFile = $skinDir . '/css/styles.css';
        $this->assertTrue(file_exists($cssFile));
    }

    public function testTheBasePrintCssFileExists()
    {
        $skinDir = Mage::getSingleton('core/design_package')->getSkinBaseDir();
        $cssFile = $skinDir . '/css/print.css';
        $this->assertTrue(file_exists($cssFile));
    }
}
