<?php
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('bannerslider/banner'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Id')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'Title')
	->addColumn('url', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'Url')
	->addColumn('filename', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
        ), 'Filename')
	->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
        ), 'Description')
	->addColumn('order', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
		'nullable'  => false,
		), 'Sort Order')
	->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
		'nullable'  => false,
		), 'Status')
	->addColumn('created_time', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		'nullable'  => false,
		), 'Create Time')
	->addColumn('update_time', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		'nullable'  => false,
		), 'Update Time')
	
	;
$installer->getConnection()->createTable($table);

$installer->endSetup();
	 