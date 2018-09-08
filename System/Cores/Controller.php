<?php  

namespace Cores;

use Libs\Helper\Debuger as Debug;
use Libs\Helper\Variable;

class Controller extends \Cores\Routes {

	public static $instance;
    
    /**
     * [__construct description]
     */
    public function __construct () {
    	parent::__construct();
    	$this->appsetting = Variable::settings("app");
    	if ( isset( $this->appsetting->content ) ) {
    		$this->vueelement = $this->appsetting->content;
    	} else {
    		$this->vueelement = '#vue-content';
    	}
    }

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