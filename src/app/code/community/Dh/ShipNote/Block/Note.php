<?php

/**
 * @category  Dh
 * @package   Dh_ShipNote
 * @copyright Copyright (c) 2013 Drew Hunter (http://drewhunter.net)
 * @license   http://opensource.org/licenses/OSL-3.0  Open Software License (OSL 3.0)
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
        return Mage::helper('shipnote')->isEnabled() || $this->getRateCount() < 1;
    }

    /**
     * How many shipping rates are available
     *
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
        if (false === $this->canShow()) {
            return '';
        }
        return parent::_toHtml();
    }
}
