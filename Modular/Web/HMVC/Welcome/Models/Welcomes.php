<?php  

namespace Modular\Web\HMVC\Welcome\Models;

class Welcomes extends \Cores\Models {

	public function findById ( $id = null ) {
		$this->query();
		
	}

	public function index () {
		echo 1;
	}

}




?>