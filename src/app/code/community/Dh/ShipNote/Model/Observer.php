<?php

/**
 * @category   Dh
 * @package    Dh_Shipnote
 * @copyright  Copyright (c) 2013 Drew Hunter (http://drewhunter.net)
 * @license    http://opensource.org/licenses/OSL-3.0  Open Software License (OSL 3.0)
 */
class Dh_ShipNote_Model_Observer extends Mage_Core_Helper_Abstract
{
    /**
     * Take the note from post and and store it in the current quote.
     *
     * When the quote gets converted we will store the delivery note
     * and assign to the order
     *
     * @param Varien_Event_Observer $observer
     * @return Dh_ShipNote_Model_Observer
     */
    public function checkout_controller_onepage_save_shipping_method(Varien_Event_Observer $observer)
    {
        $shipNote = $observer->getEvent()->getRequest()->getParam('ship-note');
        if (!empty($shipNote)) {
            try {
                $observer->getEvent()->getQuote()
                    ->setShipNote($shipNote)
                    ->save();
            } catch (Exception $e) {
                Mage::logException($e);
            }
        }
        return $this;
    }

    /**
     * If the quote has a delivery note then lets save that note and
     * assign the id to the order
     *
     * @param Varien_Event_Observer $observer
     * @return Dh_ShipNote_Model_Observer
     */
    public function sales_convert_quote_to_order(Varien_Event_Observer $observer)
    {
        if ($shipNote = $observer->getEvent()->getQuote()->getShipNote()) {
            try {
                $shipNoteId = Mage::getModel('shipnote/note')
                    ->setNote($shipNote)
                    ->save()
                    ->getId();

                $observer->getEvent()->getOrder()
                    ->setShipNoteId($shipNoteId);

            } catch (Exception $e) {
                Mage::logException($e);
            }
        }
        return $this;
    }
}
