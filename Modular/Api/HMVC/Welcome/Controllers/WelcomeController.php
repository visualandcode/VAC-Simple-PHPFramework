<?php  

namespace Modular\Api\HMVC\Welcome\Controllers;

class WelcomeController extends \Cores\Controller {

	/**
	 * [__construct description]
	 */
	public function init () {
		$this->model( array("Welcome" , "Users/anu")  );

	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index () {
		echo 1;
	}


	/**
	 * [anu description]
	 * @return [type] [description]
	 */
	public function anu () {
		


	}



}

?>