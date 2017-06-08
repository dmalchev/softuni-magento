<?php

$installer = $this;
$installer->startSetup();

/**
 * Create table 'softuni_dimomalchev/dimomalchev'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('softuni_dimomalchev/dimomalchev'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary'  => true,
    ), 'ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 150, array(), 'Name')
    ->addColumn('phone', Varien_Db_Ddl_Table::TYPE_VARCHAR, 50, array(), 'Phone')
    ->addColumn('age', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(), 'Age', array(
        'unsigned' => true,
    ))
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_VARCHAR, 150, array(), 'Email');

$installer->getConnection()->createTable($table);
    
$installer->endSetup();