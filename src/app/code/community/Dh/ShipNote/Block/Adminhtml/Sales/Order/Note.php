<?php

/**
 * @category   Dh
 * @package    Dh_ShipNote
 * @copyright  Copyright (c) 2012 Drew Hunter (http://drewhunter.net)
 * @license    http://opensource.org/licenses/OSL-3.0  Open Software License (OSL 3.0)
 */
class Dh_ShipNote_Block_Adminhtml_Sales_Order_Note extends Mage_Adminhtml_Block_Sales_Order_View_Info
{
    /**
     * @var Dh_ShipNote_Model_Note
     */
    protected $_note;

    /**
     * @return Dh_ShipNote_Model_Note|null
     */
    public function getNote()
    {
        if (null === $this->_note) {
            $shipNoteId = $this->getOrder()->getData('ship_note_id');
            if ($shipNoteId) {
                $this->_note = Mage::getModel('shipnote/note')->load($shipNoteId);
            }
        }
        return $this->_note;
    }
}