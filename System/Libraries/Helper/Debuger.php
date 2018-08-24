<?php  


namespace Libs\Helper;

class Debuger {

	/**
	 * [dump description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public static function dump ( $data = null ) {
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}

	/**
	 * [print description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public static function print ( $data = null ) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	/**
	 * [type description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public static function type ( $data = null ) {
		echo "<pre>";
		echo gettype($data);
		echo "</pre>";
	}

	/**
	 * [viewjson description]
	 * @return [type] [description]
	 */
	public function json ( $content = null ) {
		header('Content-Type: application/json');
		if ( is_array( $content ) || is_object($content) ) {
			$content = array_merge( array( "success" => true ) , $content );
			return json_encode($content , JSON_PRETTY_PRINT);
		}
	}



}


?>