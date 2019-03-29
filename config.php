<?php

    define('Base_url', 'http://localhost/omp/');
    
	require_once("vendor/Paris/idiorm.php");
	require_once("vendor/Paris/paris.php");

	// $ENVIROMENT = 'PRODUCTION';
	$ENVIROMENT = 'DEVELOPMENT';

	if($ENVIROMENT == 'PRODUCTION') {
		ORM::configure('mysql:host=68.169.36.6;dbname=maksof-team-new');
	    ORM::configure('username', 'maksof_openprofit');
	    ORM::configure('password', 'openprofit123');
	    ORM::configure('logging', true);
	} else {
		ORM::configure('mysql:host=localhost;dbname=onlinemarketplace');
	    ORM::configure('username', 'root');
	    ORM::configure('password', '');
	    ORM::configure('logging', true);		
	}

?>