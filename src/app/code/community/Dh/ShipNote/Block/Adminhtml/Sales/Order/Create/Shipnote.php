<?php

/**
 * @category   Dh
 * @package    Dh_ShipNote
 * @copyright  Copyright (c) 2013 Drew Hunter (http://drewhunter.net)
 * @license    http://opensource.org/licenses/OSL-3.0  Open Software License (OSL 3.0)
 */
class Dh_ShipNote_Block_Adminhtml_Sales_Order_Create_Shipnote extends Mage_Adminhtml_Block_Sales_Order_Create_Abstract
{
    public function getShipNote()
    {
        return $this->htmlEscape($this->getQuote()->getShipNote());
    }

}
