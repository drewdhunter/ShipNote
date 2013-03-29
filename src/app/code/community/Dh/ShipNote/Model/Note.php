<?php

/**
 * @category   Dh
 * @package    Dh_ShipNote
 * @copyright  Copyright (c) 2013 Drew Hunter (http://drewhunter.net)
 */
class Dh_ShipNote_Model_Note extends Mage_Core_Model_Abstract
{
    /**
     * Constructor.
     */
    public function _construct()
    {
        $this->_init('shipnote/note');
    }

    /**
     * Load a ship note by order
     *
     * @param Mage_Sales_Model_Order $order
     * @return bool|Dh_ShipNote_Model_Note
     */
    public function loadByOrder(Mage_Sales_Model_Order $order)
    {
        $shipNoteId = $order->getData('ship_note_id');
        if (null !== $shipNoteId) {
            return Mage::getModel('shipnote/note')
                ->load($shipNoteId);
        }
        return false;
    }

    /**
     * Load a ship note by order id
     *
     * @param $orderId
     * @return bool|Dh_ShipNote_Model_Note
     */
    public function loadByOrderId($orderId)
    {
        $order = Mage::getModel('sales/order')->load($orderId);
        if (null !== $order->getId()) {
            return $this->loadByOrder($order);
        }
        return false;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getData('note');
    }
}
