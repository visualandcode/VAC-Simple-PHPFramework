<?php  

namespace Modular\Api\HMVC\Welcome\Models;

class Welcome extends \Cores\Models {

	public function findById ( $id = null ) {
		
		$this->db->setdb("mysql");
		$this->db->closedb();

		$selectfrom = $this->select->columns('*')->from('table_one');
		self::instances()->Debuger::print($selectfrom->fetchAll());



		// self::instances()->Debuger::print($this);


	}

	public function index () {
		echo 1;
	}

}




?>