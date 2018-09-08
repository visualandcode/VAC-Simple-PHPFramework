<?php  

namespace Modular\Api\HMVC\Welcome\Controllers;

class HomeController extends \Cores\Controller {

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