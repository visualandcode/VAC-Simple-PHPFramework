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
		$data = array( "messages" => "Welcome Pages!" );
		$this->view("welcome" , $data , true);
	}


	/**
	 * [anu description]
	 * @return [type] [description]
	 */
	public function anu () {
		


	}



}

?>