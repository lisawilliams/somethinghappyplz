<?php
class Registry {

// Array of objects 
private $objects;

// Array of settings
private $settings;
public function __construct() {
}

// Create a new object and store it in the registry 
// @param String $object and the object file prefix 
// @param String $key pair for the object 
// @return void **

public function createAndStoreObject($object, $key)
{ 
require_once($object . '.class.php');
this->objects[$key] = new $object($this);
}

//Store Setting
// @param String $setting the setting data
// @param String $key the key pair for the settings array 
// @return void

public function storeSetting($setting, $key)
{
$this->settings[$key] = $setting;
}

// Get an object from the registries store 
// @param String $key the objects array key
// @return Object 

public function getObject($key)
	{
	return $this->objects[$key];
	}
}
?>
