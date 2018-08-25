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

	public $directory_complete;
	public $error = 0;

	public $messages = array();

	protected $_module = '';
	protected static $__modular = __DIR__ . "/../../Modular/";

	/**
	 * [__construct description]
	 * @param [type] $module [description]
	 */
	public function __construct ( $module = null ) {
		$this->_module    = $module;
		self::$__modular  = self::$__modular . $module;	
	}

	/**
	 * [scan description]
	 * @return [type] [description]
	 */
	public function modular () {
		
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

		if ( $this->error == 0 ) {
			$this->directory_complete = "Directory Completed.";
			return $this;
		}
	}


	/**
	 * [load_settings description]
	 * @return [type] [description]
	 */
	public function __appsettings () {
			
		$__dirsettings = self::$__modular . "/Settings/";

		$settings = array();
		$opensettings = opendir( $__dirsettings );
		if ( $opensettings ) {
			while ( $h = readdir($opensettings) ) {
				if ( $h != "." && $h != ".." && strpos($h , ".php" ) !== false ) {
					$settings[$h] = $__dirsettings . $h;
				}
			}
		}

		// check if settings is an array and more than 1
		$configs = array();
		if ( is_array( $settings ) && count($settings) > 0 ) {
			foreach ( $settings as $key => $value ) {
				if ( file_exists( $value ) ) {
					$arr_settings = require_once( $value );
					$configs[str_replace(".php" , "" , $key)] = (object)$arr_settings;
				}
			}	
		}
		$configs = $configs;

		$databases = array();
		if ( is_array( $configs ) && count( $configs ) > 0 ) 
		{

			if ( isset( $configs["databases"] ) ) {
				foreach ( $configs["databases"] as $key_db => $val_db ) 
				{
					if ( isset( $val_db["dbstatus"] ) ) {

						if ( $val_db["dbstatus"] == "active" ) {
							$databases[$key_db] = (object)$val_db;
						}
					
					}
				}
			}

		}

		$configs["databases"] = (object)$databases;
		return (object)$configs;
	}







}



?>