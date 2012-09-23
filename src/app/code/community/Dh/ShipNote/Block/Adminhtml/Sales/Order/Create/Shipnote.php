<?php

class Dh_ShipNote_Block_Adminhtml_Sales_Order_Create_Shipnote extends Mage_Adminhtml_Block_Sales_Order_Create_Abstract
{
    public function getShipNote()
    {
        return $this->htmlEscape($this->getQuote()->getShipNote());
    }
    
}