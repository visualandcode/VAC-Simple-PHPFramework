<?php  

namespace Modular\Api\HMVC\Welcome\Controllers;

class WelcomeController extends \Cores\Controller {

	public function index () {
		$this->model( "Welcome" );
		print_r($this->getInstance());
		return array( "anu" => 1 );
	}



}

?>