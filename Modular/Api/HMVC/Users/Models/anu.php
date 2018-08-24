<?php  

namespace Modular\Api\HMVC\Users\Models;

class anu {

	public function findById ( $id = null ) {
		if ( !is_null( $id ) ) {
			echo $id;
		}
	}

	public function index () {
		echo 1;
	}

}




?>