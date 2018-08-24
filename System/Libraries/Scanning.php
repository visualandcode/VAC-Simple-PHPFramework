<?php  

/**
 * This file scanning is mean for 
 * Check directory modular is structured and was foldered
 * Author : Ahmad Wahyudin
 */

namespace Libs;


class Scanning {

	protected $_structure = [
		"HMVC"     , 
		"Layouts"   , 
		"Public"   , 
		"Settings"  
	];

	public $error;

	public $messages = array();

	protected $_module = '';
	protected static $__modular = __DIR__ . "/../../Modular/";

	public function __construct ( $module ='' ) {
		$this->_module    = $module;
		self::$__modular  = self::$__modular . $module;
		$this->_scan();

		if ( $this->error == 0 ) {
			return true;
		}
	}

	/**
	 * [scan description]
	 * @return [type] [description]
	 */
	protected function _scan () {
		
		if ( !is_dir( self::$__modular ) ) {
			throw new \Exception("Your module not found!", 404);
		}


		foreach ( $this->_structure as $key => $val ) {
			if ( !is_dir( self::$__modular . "/" . $val ) ) {
				throw new \Exception("Your module dir $val not found!", 404);
			} else {
				$this->error = 0;
			}
		}
	}


	/**
	 * [load_settings description]
	 * @return [type] [description]
	 */
	public function appsettings () {
		
	}







}



?>