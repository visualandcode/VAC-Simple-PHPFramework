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
	 * [viewjson description]
	 * @return [type] [description]
	 */
	public function viewjson ( $content = null ) {
		header('Content-Type: application/json');
		if ( is_array( $content ) || is_object($content) ) {
			$content = array_merge( array( "success" => true ) , $content );
			return json_encode($content , JSON_PRETTY_PRINT);
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
			$dir_filename = "../" . $this->_controllermodular . "/Models/"; //set directory view by modular
			$filename = array( $filename );
			
			if ( is_dir( $dir_filename ) ) 
			{
				foreach ( $filename as $key => $value ) 
				{
					$filename_exist     = $this->_controllermodular."\Models\\".$value; //set directory view by modular
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




}



?>