<?php  

use Libs\Scanning,
	Libs\Helper\Clearing;

// check if htaccess is found
if ( is_readable( "../.htaccess" ) ) 
{

	//print_r( $_SERVER );

	if ( isset( $_SERVER["REQUEST_URI"] ) ) 
	{
		
		$REQUEST_URI = trim($_SERVER["REQUEST_URI"] , "/");

		if ( strpos( $REQUEST_URI ,  "/" ) !== false ) 
		{
				
			$REQUEST_URI = explode( "/" , $REQUEST_URI );
			if ( is_array($REQUEST_URI) && count( $REQUEST_URI ) > 0 ) 
			{
				
				// unset base folder
				if ( $basefolder == $REQUEST_URI[0] ) 
				{
					unset( $REQUEST_URI[0] );
				}

				// clearing url
				$URI = array(); $inc = 0;
				foreach ( $REQUEST_URI as $key_uri => $val_uri ) 
				{
					$URI[$inc++] = Clearing::querystring($val_uri);
				}

				if ( isset( $URI[0] ) ) 
				{
					$Modular = ucfirst($URI[0]);

					$CtrlModule = 'Welcome';
					if ( isset( $URI[1] ) ) 
					{	
						$CtrlModule = $URI[1];
					}


					$Method = 'index';
					if ( isset( $URI[2] ) ) 
					{	
						$Method = $URI[2];
					}


					// activate the router 
					$scanStructure = new Scanning( $Modular );

					// check error 
					if ( empty($scanStructure->error) ) 

					{
						

						$CtrlMethod = 'Modular\\'.$Modular.'\\HMVC\\'.$CtrlModule.'\\Controllers\\'.$CtrlModule."Controller";
						
						if ( class_exists( $CtrlMethod ) ) 
						{

							$Controller = new $CtrlMethod();

							if ( method_exists( $Controller , $Method ) ) 
							{
								$Controller->{$Method}();

							}
							else {
								throw new Exception("Route not found", 404);
							}

							
						}
						else {
							throw new Exception("Route not found", 404);

						}


					} 
					else {
						throw new Exception("Route not found", 404);

					}

				}

			}
		}

	}

} else {
	throw new Exception("Htaccess not found", 404);
}



?>