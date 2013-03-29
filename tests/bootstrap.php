<?php
$includePath = array(
    __DIR__,
    __DIR__ . '/../app/code/community/Dh/ShipNote',
    get_include_path()
);
set_include_path(implode(PATH_SEPARATOR, $includePath));

/**
 * Define application path
 */
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../../../app'));

/**
 * Define module name
 */
defined('MODULE_NAME') || define('MODULE_NAME', 'Dh_ShipNote');

/**
 * Don't send cookies
 */
session_cache_limiter( false );

/**
 * Bootstrap Magento
 */
require_once APPLICATION_PATH.'/Mage.php';
Mage::app()
    ->getCacheInstance()
    ->flush();

Mage::setIsDeveloperMode(true);
