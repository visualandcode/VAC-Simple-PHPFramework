<?php  

namespace Modular\Api\HMVC\Welcome\Models;

class Welcome extends \Cores\Models {

	public function findById ( $id = null ) {
		//$selectfrom = $this->select->columns('*')->from('test');

		$selfdb = self::DB("mysql");
		self::instances()->Debuger::print($selfdb);

		self::instances()->Debuger::print($this);

	}

	public function index () {
		echo 1;
	}

}




?>