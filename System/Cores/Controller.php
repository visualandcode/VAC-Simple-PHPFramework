<?php  

namespace Cores;

use Libs\Helper\Debuger as Debug;

class Controller extends \Cores\Routes {

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