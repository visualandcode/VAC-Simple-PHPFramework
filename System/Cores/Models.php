<?php  

namespace Cores;
use Libs\Instances;

class Models extends \Model {


	private $__connection;


	/**
	 * [__construct description]
	 */
	public function __construct () {
		
	}

	/**
	 * [DB description]
	 */
	public static function db ( $dbname = "" ) {

	}


	/**
	 * [instance description]
	 * @return [type] [description]
	 */
	public static function instances () {
		$instance = new Instances();
		return $instance;
	}

	



	

}


?>