<?php  

namespace Modular\Api\HMVC\Welcome\Controllers;

class WelcomeController extends \Cores\Controller {

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index () {
		

		$request = self::request()->query();

		print_r($request);

	}


	/**
	 * [anu description]
	 * @return [type] [description]
	 */
	public function anu () {
		


	}



}

?>