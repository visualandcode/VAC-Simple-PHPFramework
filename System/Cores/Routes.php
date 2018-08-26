<?php  
namespace Cores;
use Libs\Instances as Instances;

class Routes extends Instances {

	private $_controller_name = array();
	private $_data_views      = array();
	private $_models		  = array();
	private $connection;
	private $connections;

	//private $_models_object	  = array();


	/**
	 * [__construct description]
	 */
	public function __construct () {

		// set autoloader
		$this->request = new \Libs\Http\Request;

	}

	/**
	 * [view description]
	 * @param  [type] $filename [description]
	 * @return [type]           [description]
	 */
	public function view ( $filename = null , $data = array() ) {

		$counterror = 0;

		if ( !is_null($filename) ) {
			$this->_controller_name[] = $filename;
			$this->_data_views[$filename]      = $data;  // set information
			
			$dir_filename = "../" . $this->_controllermodular . "/Views/"; //set directory view by modular
			$filename     = "../" . $this->_controllermodular . "/Views/" . $filename . ".views.php"; //set directory view by modular

			if ( is_dir( $dir_filename ) ) {  // check if dir filename is exists
				if ( file_exists($filename) ) {
					extract($data);
					require_once( $filename );
				} else {
					$counterror += 1;
				}
			} else {
				$counterror += 1;
			}
		}


		if ( $counterror > 0 ) {
			throw new \Exception("Your view request not found.", 404);
		}

	}


	/**
	 * [model description]
	 * @return [type] [description]
	 */
	public function model ( $filename = null ) {

		$counterror = 0;
		
		$this->DBconnections = $this->__dbconnector();


		// if file name is not null
		if ( !is_null( $filename ) ) 
		{


			// check if filenane is an array
			if ( !is_array( $filename ) ) {
				$filename = array( $filename );
			}

				// loop filename untuk di include
				foreach ( $filename as $key => $value ) 
				{

					$is_include_mod = 0; 
					if ( strpos( $value , "/"  ) !== false ) {
						$passedmodels = explode( "/" , $value );
						if ( is_array( $passedmodels ) && count( $passedmodels ) == 2 ) {
							$is_include_mod += 1;
							$class_model = "Modular\\" . $this->_module . "\\HMVC\\" . $passedmodels[0] . "\Models\\" . $passedmodels[1]; 
							$dir_filename = "../Modular\\" . $this->_module . "\\HMVC\\" . $passedmodels[0] . "\Models\\"; //set directory view by modular
						}
					} else {
						$dir_filename = "../" . $this->_controllermodular . "/Models/"; //set directory view by modular
					}

					// check jika ini adalah directory
					if ( is_dir( $dir_filename ) ) 
					{	
						if ( $is_include_mod > 0 ) {
							$filename_exist     = $class_model; //set directory view by modular
						} else {
							$filename_exist     = $this->_controllermodular."\Models\\".$value; //set directory view by modular
						}

						// check if class is exists
						if ( class_exists( $filename_exist ) ) {
							$this->_models[$value] = $filename_exist;
							
							$class_modelname 			   		  = strtolower($value); 
							$this->{$class_modelname}	   		  = new $filename_exist();
							$this->{$class_modelname}->connection = $this->connection;
							$this->{$class_modelname}			  = $this->{$class_modelname}->run();

							//$this->_models_object[$value] = $this->{$value};
						} else {

							$counterror += 1;
						}	

					} else {
						$counterror += 1;
					}	
				} 	
			
		}

		if ( $counterror > 0 ) 
		{
			throw new \Exception("Your model request not found.", 404);
		}
	}

	
	/**
	 * [connection description]
	 * @return [type] [description]
	 */
	private function __dbconnector () {
		
		$databases = $this->Variable::settings("databases");

		if ( count((array)$databases) == 0 ) {
			throw new \Exception("[ERR DB CONNECTION]", 1001);
			
		}

		$config	   = (array)$databases;
		$this->confconnection = $config;


		if ( is_null( $config ) ) {
			return FALSE;
		}


		if ( is_array( $config ) ) {

			foreach ( $databases as $key_db => $val_db ) {
				// setting connection
				$conf 	   = $val_db;

				if ( is_object($val_db) ) {
					$dbhost    = $conf->dbhost;
					$dbport    = $conf->dbport;
					$dbuser    = $conf->dbuser;
					$dbpass    = $conf->dbpass;
					$dbname    = $conf->dbname;
					$dbprevix  = $conf->dbprevix;
					$dbdriver  = $conf->dbdriver; 
					
					$connector_pdo = new \PDO(
						"mysql:host=$dbhost;port=$dbport;dbname=$dbname", 
						$dbuser , 
						$dbpass , 
						array( \PDO::ATTR_PERSISTENT => false)
					);
					$connector_pdo->active = $val_db;

					$this->connection[$key_db] = $connector_pdo;

				}

			}	

		}
		
	}




}



?>