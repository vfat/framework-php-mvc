<?php
//load conf
require_once 'config/config.php';

//load lib
//require_once 'libraries/Core.php';
//require_once 'libraries/Controller.php';
//require_once 'libraries/Database.php';

//AUTOLOADER,, buat load lobaries otomatis
spl_autoload_register(function($className){
	require_once 'libraries/'.$className.'.php';
});