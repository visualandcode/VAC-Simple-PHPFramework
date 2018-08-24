<?php  

namespace Cores;

use Cores\Routes; 
use Libs\Helper\Debuger as Debug;

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