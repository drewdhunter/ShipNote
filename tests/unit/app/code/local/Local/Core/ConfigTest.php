<?php

class Local_Core_ConfigTest extends PHPUnit_Framework_TestCase
{
    const MODULE_NAME = 'Local_Core';

    public function testThatModuleExistsInConfig()
    {
        $moduleConfig = Mage::app()->getConfig()->getNode('modules')
            ->asArray();

        $moduleExists = array_key_exists(self::MODULE_NAME, $moduleConfig);
        $this->assertTrue($moduleExists);
    }

    public function testThatTemplateSymlinksAreEnabled()
    {
        $areTemplateSymlinksEnabled = Mage::getStoreConfigFlag('dev/template/allow_symlink');
        $this->assertTrue($areTemplateSymlinksEnabled);
    }
}
