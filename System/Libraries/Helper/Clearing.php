<?php  

namespace Libs\Helper;

class Clearing {

	/**
	 * [querystring description]
	 * @return [type] [description]
	 */
	public static function querystring ( $string = null ) {
		
		$callback = $string;

		if ( !is_null( $string ) ) {
			if ( strpos( $string , "?" ) !== false ) {
				$string = explode( "?" , $string );
				$callback = isset( $string[0] ) ? $string[0] : null;
			}
		}


		return $callback;

	}




}


?>