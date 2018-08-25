<?php  

namespace Modular\Web\HMVC\Welcome\Models;

class Welcome extends \Cores\Models {

	public function findById ( $id = null ) {
		$this->query();
	}

	public function index () {
		echo 1;
	}

}




?>