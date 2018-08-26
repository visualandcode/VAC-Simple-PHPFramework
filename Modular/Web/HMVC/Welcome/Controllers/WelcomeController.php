<?php  

namespace Modular\Web\HMVC\Welcome\Controllers;

class WelcomeController extends \Cores\Controller {

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index () {
		
		$this->model( array("Welcome" , "Welcomes")  );
		$this->welcomes->findById();

		$request = $this->request->query();
		

	}


	/**
	 * [anu description]
	 * @return [type] [description]
	 */
	public function anu () {
		


	}



}

?>