<?php  

namespace Libs\Helper;
use Libs\Scanning as Scanning;

class Variable {


	/**
	 * [querystring description]
	 * @return [type] [description]
	 */
	public static function global ( $string = null ) {
		
		$callback = false;

		if ( !is_null( $string ) ) {
			if ( isset( $GLOBALS[$string] ) ) {
				$callback = $GLOBALS[$string];
			}
		}

		return $callback;
	}

	/**
	 * [config description]
	 * @return [type] [description]
	 */
	public function settings ( $config = null ) {
		$callback = false;

		$scanning = self::global("route_modular");
		$scanning = new Scanning();
		$scanning = $scanning->modular();
		if ( !empty($scanning) ) {

			$scanning = $scanning->__appsettings();

			if ( is_null($config) ) return $scanning;

			// get config by filename / key
			$arr_scanning = (array)$scanning;
			if ( isset($arr_scanning[$config]) ) {
				$callback = $arr_scanning[$config];
			}

		}

		if ( is_array( $callback ) ) {
			return (object)$callback;
		}

		return $callback;
	}


	public function test () {
		echo 1;
	}




}


?>