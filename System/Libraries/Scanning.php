<?php  


namespace Libs;


class Scanning {

	protected $_structure = [
		"HMVC"     , 
		"Layouts"   , 
		"Public"   , 
		"Settings"  
	];

	public $messages = array();

	protected $_module = '';
	protected static $__modular = __DIR__ . "/../../Modular/";

	public function __construct ( $module ='' ) {
		$this->_module    = $module;
		self::$__modular  = self::$__modular . $module;
		$this->_scan();
	}

	/**
	 * [scan description]
	 * @return [type] [description]
	 */
	protected function _scan () {
		foreach ( $this->_structure as $key => $val ) {
			if ( !is_dir( self::$__modular . "/" . $val ) ) {
				throw new \Exception("Your module dir $val not found!", 500);
			}
		}
	}




}



?>