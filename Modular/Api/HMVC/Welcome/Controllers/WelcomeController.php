<?php  

namespace Modular\Api\HMVC\Welcome\Controllers;

class WelcomeController extends \Cores\Controller {

	/**
	 * [__construct description]
	 */
	public function init () {
		$this->model( array("Welcome" , "Welcomes")  );
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index () {
		$this->welcome->findById();

		echo $this->timeexec();
	}


	/**
	 * [anu description]
	 * @return [type] [description]
	 */
	public function anu () {
		


	}



}

?>