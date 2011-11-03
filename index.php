<?php

session_start();

DEFINE("FRAMEWORK_PATH", dirname( __FILE__ ) ."/" );


require('registry/registry.class.php');
$registry = new Registry();
// setup our core registry objects
$registry->createAndStoreObject( 'template', 'template' );
$registry->createAndStoreObject( 'mysqldb', 'db' );
//$registry->createAndStoreObject( 'authenticate', 'authenticate' );
$registry->createAndStoreObject( 'urlprocessor', 'url' );

// database settings
include(FRAMEWORK_PATH . 'config.php');
// create a database connection
$registry->getObject('db')->newConnection( $configs['db_host_sn'], $configs['db_user_sn'], $configs['db_pass_sn'], $configs['db_name_sn']);

// store settings in our registry
$settingsSQL = "SELECT `key`, `value` FROM settings";
$registry->getObject('db')->executeQuery( $settingsSQL );
while( $setting = $registry->getObject('db')->getRows() )
{
	$registry->storeSetting( $setting['value'], $setting['key'] );
}

// process authentication
// coming in chapter 3

/**
 * Once we have some template files, we can build a default template
$registry->getObject('template')->buildFromTemplates('header.tpl.php', 'main.tpl.php', 'footer.tpl.php');

$registry->getObject('template')->parseOutput();
print $registry->getObject('template')->getPage()->getContentToPrint();
*/

?>