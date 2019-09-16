<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
	$path = "classes/";
	$ext = ".class.php";
	$fullPath = $path . $className . $ext;
	
	include_once $fullPath;
}