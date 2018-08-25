<?php  


// initialize routing


/**
 * ===============================================================
 * 						AUTOLOADER
 * ===============================================================
 */



$autoloader = __DIR__.'/../vendor/autoload.php';

if ( file_exists( $autoloader ) ) {
	require $autoloader;
}





/**
 * ===============================================================
 * 						ROUTER
 * ===============================================================
 */


try {

	$basefolder = 'VAC-Simple-PHPFramework';
	$baseweb    = '/Web';

	$starter = __DIR__.'/../System/Starter.php';

	if ( file_exists( $starter ) ) {
		require $starter;
	}

} catch (Exception $e) {

	echo json_encode([
		"success" 	  => false ,
		"code" 	      => $e->getCode() , 
		"message" 	  => $e->getMessage() , 
	]);

}










?>