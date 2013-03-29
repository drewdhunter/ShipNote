<?php

class Local_Theme_ConfigTest extends PHPUnit_Framework_TestCase
{
    public function testTheBaseCssFileExists()
    {
        $skinDir = Mage::getSingleton('core/design_package')->getSkinBaseDir();
        $cssFile = $skinDir . '/css/styles.css';
        $this->assertTrue(file_exists($cssFile));
    }
}
