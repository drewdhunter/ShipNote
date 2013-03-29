<?php

/**
 * @category   Dh
 * @package    Dh_Shipnote
 * @copyright  Copyright (c) 2013 Drew Hunter (http://drewhunter.net)
 * @license    http://opensource.org/licenses/OSL-3.0  Open Software License (OSL 3.0)
 */
class Dh_ShipNote_Block_Note extends Mage_Core_Block_Template
{
    /**
     * Only display if module is enabled in store config and there are
     * actually some shipping rates.
     *
     * @return bool
     */
    public function canShow()
    {
        if (false === Mage::helper('shipnote')->isEnabled()) {
            return false;
        }
        if (0 >= $this->getRateCount()) {
            return false;
        }
        return true;
    }

    /**
     * @return bool
     */
    public function getRateCount()
    {
        return Mage::getSingleton('checkout/session')->getQuote()
            ->getShippingAddress()
            ->getShippingRatesCollection()
            ->count();
    }

    /**
     * @return string
     */
    public function _toHtml()
    {
        if (false == $this->canShow()) {
            return '';
        }
        return parent::_toHtml();
    }
}
