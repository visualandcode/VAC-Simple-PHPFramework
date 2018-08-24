<?php  


namespace Libs\Http;
use Libs\Sanitize\Sanitize as Sanitizer;

class Request extends Sanitizer {

	/**
	 * [json description]
	 * @return [type] [description]
	 */
	public function json () {
		$callback = array();

		$POST = isset($_POST) ? $_POST : null;
		if ( is_array( $POST ) && count($POST) > 0 ) {
			$callback = $POST;
		}

		return $callback;
	}

	/**
	 * [array description]
	 * @return [type] [description]
	 */
	public function query () {
		$callback = array();

		$GET = isset($_GET) ? $_GET : null;
		if ( is_array( $GET ) && count($GET) > 0 ) {
			$callback = $GET;
		}

		return $callback;
	}


}



?>