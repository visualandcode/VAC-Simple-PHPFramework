<?php  

use Libs\Scanning;

// check if htaccess is found
if ( is_readable( "../.htaccess" ) ) {

	print_r( $_SERVER );

	// activate the router 
	$scanStructure = new Scanning( 'Api' );


}



?>