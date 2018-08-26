<?php  

use Libs\Scanning,
	Libs\Helper\Clearing,
	Libs\Http\Request,
	Cores\PublicContent;


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
				foreach ( $REQUEST_URI as $key_uri => $val_uri ) {
					$URI[$inc++] = Clearing::querystring($val_uri);
				}

				if ( isset( $URI[0] ) ) 
				{
					$Modular 				  = ucfirst($URI[0]);
					$GLOBALS['route_modular'] = $Modular;

					// Set Controller Moduler
					$CtrlModule = 'Welcome';
					if ( isset( $URI[1] ) ) $CtrlModule = ucfirst($URI[1]);

					// Set Copntroller Sub Module
					$CtrlSubModule = $CtrlModule;
					if ( isset( $URI[2] ) ) $CtrlSubModule = $URI[2]; 

					// Set Method of Controller
					$Method = 'index';
					if ( isset( $URI[3] ) ) $Method = $URI[3]; 
					
					$uri_one = isset( $URI[0] ) ? $URI[0] : null;
					$uri_two = isset( $URI[1] ) ? $URI[1] : null;
					
					// end base folder
					if ( $uri_one == "bower_components" ) {
						$Bower = trim(str_replace( $basefolder , "" , $_SERVER["REQUEST_URI"] ) , "/");
						$file_dependencies = "../Frontend/" . $Bower;
						if ( !is_dir( $file_dependencies ) && file_exists( $file_dependencies ) ) {
							echo file_get_contents($file_dependencies);
						} else {
							throw new \Exception("[ERR Dependencies]", 404);
						}
						return false;
					}

					// activate the router 
					$scanStructure = new Scanning( $Modular );
					$scanStructure = $scanStructure->modular();


					// get base url
					$baseurl = isset($_SERVER["SERVER_ADMIN"]) ? $_SERVER["SERVER_ADMIN"] : null;
					if ( isset($_SERVER["SERVER_PORT"]) ) {
						if ( $_SERVER["SERVER_PORT"] != '80' ) $baseurl .= ":" . $_SERVER["SERVER_PORT"]; 
					}
					$baseurl .= "/" . $basefolder;


					// Layout setup
					$PublicContent = new PublicContent();
					$PublicContent->init(array(
						"basehttp" => "http://" . $baseurl,
						"baseurl"  => $baseurl,
					));

					// end base folder
					if ( $uri_two == "public_components" ) {
						
						$Bower = trim(str_replace( $basefolder , "" , $_SERVER["REQUEST_URI"] ) , "/");
						$Bower = trim(str_replace( $URI[0] . "/public_components" , "" , $Bower ) , "/");

						$file_dependencies = "../Modular/" . $URI[0] . "/Layouts/" . $PublicContent->layout . "/public/" . $Bower;
						if ( !is_dir( $file_dependencies ) && file_exists( $file_dependencies ) ) {
							echo file_get_contents($file_dependencies);
						} else {
							throw new \Exception("[ERR Dependencies]", 404);
						}

						return false;

					}


					// check error 
					if ( empty($scanStructure->error) ) {
						
						$CtrlMethod     = 'Modular\\'.$Modular.'\\HMVC\\'.$CtrlModule.'\\Controllers\\'.$CtrlSubModule."Controller";
						$DirCtrlModular = 'Modular\\'.$Modular.'\\HMVC\\'.$CtrlModule;
						$DirModular     = 'Modular\\'.$Modular.'\\';
						
						if ( class_exists( $CtrlMethod ) ) 
						{

							/**
							 * [$Controller description]
							 * @var [type]
							 * define a something is important!
							 */
							$Controller 					= new $CtrlMethod;
							$Controller->_module     		= $Modular;
							$Controller->_controller 		= $CtrlModule;
							$Controller->_submodule 		= $CtrlSubModule;
							$Controller->_method     		= $Method;
							$Controller->_modular 			= $DirModular;
							$Controller->_controllermodular = $DirCtrlModular;
							$Controller->_settings		    = $scanStructure;

							if ( method_exists( $Controller , "init") ) $Controller->init(); // if initialization is exists
							if ( empty($Method) ) $Method = 'index'; // if empty access to index

							if ( method_exists( $Controller , $Method ) ) 
							{	
								
								// each data 
								$arg_one = isset( $URI[4] ) ? $URI[4] : null;
								$arg_two = isset( $URI[5] ) ? $URI[5] : null;
								$arg_thr = isset( $URI[6] ) ? $URI[6] : null;
								$arg_fou = isset( $URI[7] ) ? $URI[7] : null;
								$arg_fiv = isset( $URI[8] ) ? $URI[8] : null;

								if ( Request::isAjax() ) {
									$view_return = $Controller->{$Method}( $arg_one , $arg_two , $arg_thr , $arg_fou , $arg_fiv );
								} else {
									$PublicContent->layout(); // show layouts
									$view_return = '';
								}

								if ( is_array( $view_return ) ) {
									echo $Controller->debuger::json( $view_return );
								}

							}
							else {
								throw new Exception("[Route] not found", 401);
							}


						} else {
							throw new Exception("[Route] not found", 402);

						}


					} 
					
					else {
						throw new Exception("[Route] not found", 403);

					}

				}

			}

	} 

} else {
	throw new Exception("[Htaccess] not found", 404);
}



?>