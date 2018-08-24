<?php  

namespace Cores;

use Cores\Routes; 

class Controller extends Routes {

	public static $instance;
    
	/**
	 * [instance description]
	 * @return [type] [description]
	 */
	public function getInstance () {
		if ( is_null(self::$instance) ) {
			self::$instance = $this;
		}

		return self::$instance;
	}


	

}


?>