<?php  

namespace Modular\Api\HMVC\Welcome\Models;

class Welcome extends \Cores\Models {

	public function findById ( $id = null ) {
		self::instances()->debuger::print($this);
	}

	public function index () {
		echo 1;
	}

}




?>