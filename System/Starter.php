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

		if ( !strpos( $REQUEST_URI ,  "/" ) !== false ) $REQUEST_URI .= $baseweb; 

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
					$Modular 				  = ucfirst($URI[0]);
					$GLOBALS['route_modular'] = $Modular;

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
					$scanStructure = $scanStructure->modular();

					// check error 
					if ( empty($scanStructure->error) ) {
						
						$CtrlMethod     = 'Modular\\'.$Modular.'\\HMVC\\'.$CtrlModule.'\\Controllers\\'.$CtrlModule."Controller";
						$DirCtrlModular = 'Modular\\'.$Modular.'\\HMVC\\'.$CtrlModule;
						$DirModular     = 'Modular\\'.$Modular.'\\';
						
						if ( class_exists( $CtrlMethod ) ) 
						{


							// $Controller = new $CtrlMethod( (object)[
							// 	'module'     => $Modular , 
							// 	'controller' => $CtrlModule , 
							// 	'method'	 => $Method
							// ]);
							


							/**
							 * [$Controller description]
							 * @var [type]
							 * define a something is important!
							 */
							$Controller 					= new $CtrlMethod;
							$Controller->_module     		= $Modular;
							$Controller->_controller 		= $CtrlModule;
							$Controller->_method     		= $Method;
							$Controller->_modular 			= $DirModular;
							$Controller->_controllermodular = $DirCtrlModular;
							$Controller->_settings		    = $scanStructure;

							if ( method_exists( $Controller , "init") ) $Controller->init(); // if initialization is exists
							if ( empty($Method) ) $Method = 'index'; // if empty access to index

							if ( method_exists( $Controller , $Method ) ) 
							{	
								
								// each data 
								$arg_one = isset( $URI[3] ) ? $URI[3] : null;
								$arg_two = isset( $URI[4] ) ? $URI[4] : null;
								$arg_thr = isset( $URI[5] ) ? $URI[5] : null;
								$arg_fou = isset( $URI[6] ) ? $URI[6] : null;
								$arg_fiv = isset( $URI[7] ) ? $URI[7] : null;

								$view_return = $Controller->{$Method}( $arg_one , $arg_two , $arg_thr , $arg_fou , $arg_fiv );
								if ( is_array( $view_return ) ) {
									echo $Controller->debuger::json( $view_return );
								}

							}
							else {
								throw new Exception("Route not found", 401);
							}


						} else {
							throw new Exception("Route not found", 402);

						}


					} 
					
					else {
						throw new Exception("Route not found", 403);

					}

				}

			}

	} 

} else {
	throw new Exception("Htaccess not found", 404);
}



?>