<?php

/**
 * @category   Dh
 * @package    Dh_Shipnote
 * @copyright  Copyright (c) 2012 Drew Hunter (http://drewhunter.net)
 * @license    http://opensource.org/licenses/OSL-3.0  Open Software License (OSL 3.0)
 */
class Dh_ShipNote_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function isEnabled()
    {
        return Mage::getStoreConfigFlag('shipnote_options/basic_settings/enabled');
    }

	public function getFrontendLabel()
	{
		return Mage::getStoreConfig('shipnote_options/basic_settings/frontend_label');
	}
}