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
     * @return string
     */
    public function __toString()
    {
        return $this->getNote();
    }
}
