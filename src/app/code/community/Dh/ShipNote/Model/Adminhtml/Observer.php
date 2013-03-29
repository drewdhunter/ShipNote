<?php

/**
 * @category   Dh
 * @package    Dh_ShipNote
 * @copyright  Copyright (c) 2013 Drew Hunter (http://drewhunter.net)
 * @license    http://opensource.org/licenses/OSL-3.0  Open Software License (OSL 3.0)
 */
class Dh_ShipNote_Model_Adminhtml_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     * @return Dh_ShipNote_Model_Adminhtml_Observer
     */
    public function adminhtml_sales_order_create_process_data(Varien_Event_Observer $observer)
    {
        try {
            $requestData = $observer->getEvent()->getRequest();
            if (isset($requestData['order']['ship_note'])) {
                $observer->getEvent()->getOrderCreateModel()->getQuote()
                    ->addData($requestData['order'])
                    ->save();
            }
        } catch (Exception $e) {
            Mage::logException($e);
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
