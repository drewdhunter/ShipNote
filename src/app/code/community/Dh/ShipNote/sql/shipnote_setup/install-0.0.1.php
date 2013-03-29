<?php

/**
 * @category   Dh
 * @package    Dh_ShipNote
 * @copyright  Copyright (c) 2013 Drew Hunter (http://drewhunter.net)
 */

/**
 * @var Dh_ShipNote_Model_Resource_Setup
 */
$installer = $this;

$installer->startSetup();

/**
 * Create table: shipnote_note
 */
if (false === $installer->getConnection()->isTableExists($installer->getTable('shipnote/note'))) {
    $table = $installer->getConnection()
        ->newTable($installer->getTable('shipnote/note'))
        ->addColumn('note_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null,
        array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary'  => true
        ),
        'Note Id'
    )
        ->addColumn('note', Varien_Db_Ddl_Table::TYPE_TEXT, 1024, array(), 'Note Id');
    $installer->getConnection()->createTable($table);
}

$installer->addAttribute('quote', 'ship_note', array('type' => 'text'));
$installer->addAttribute('order', 'ship_note_id', array('type' => 'int'));
