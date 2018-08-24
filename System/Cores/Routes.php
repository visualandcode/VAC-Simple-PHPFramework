<?php  
namespace Cores;

class Routes {

	private $_controller_name = array();
	private $_data_views      = array();
	private $_models		  = array();
	private $_models_object	  = array();


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
		

		if ( !is_null( $filename ) ) 
		{
			$is_include_mod = 0;
			if ( strpos( $filename , "/"  ) !== false ) {
				$passedmodels = explode( "/" , $filename );
				if ( is_array( $passedmodels ) && count( $passedmodels ) == 2 ) {
					$is_include_mod += 1;
					$this->class_model = "Modular\\" . $this->_module . "\\HMVC\\" . $passedmodels[0] . "\Models\\" . $passedmodels[1]; 
	
					$dir_filename = "../Modular\\" . $this->_module . "\\HMVC\\" . $passedmodels[0] . "\Models\\"; //set directory view by modular
				}
			} else {
				$dir_filename = "../" . $this->_controllermodular . "/Models/"; //set directory view by modular
			}


			$filename = array( $filename );
			
			if ( is_dir( $dir_filename ) ) 
			{
				foreach ( $filename as $key => $value ) 
				{
					
					if ( $is_include_mod > 0 ) {
						$filename_exist     = $this->class_model; //set directory view by modular
					} else {
						$filename_exist     = $this->class_model."\Models\\".$value; //set directory view by modular
					}

					if ( class_exists( $filename_exist ) ) {
						$this->_models[$value] = $filename_exist;
						$this->{$value} = new $filename_exist();
						$this->_models_object[$value] = $this->{$value};
					} else {
						$counterror += 1;
					}		
				} 	
			} else {
				$counterror += 1;
			}
		}

		if ( $counterror > 0 ) 
		{
			throw new \Exception("Your model request not found.", 404);
		}
	}

	/**
	 * [request description]
	 * @return [type] [description]
	 */
	public static function request () {
		return new \Libs\Http\Request;
	}


	/**
	 * [__get description]
	 * @return [type] [description]
	 */
	public function __get ( $static = null ) {
		if ( !is_null($static) ) {
			$classes = "\\Libs\\Helper\\" . ucfirst($static);
			if ( class_exists( $classes ) ) {
				return new $classes;
			} else {
				return null;
			}
		}
	}	






}



?>