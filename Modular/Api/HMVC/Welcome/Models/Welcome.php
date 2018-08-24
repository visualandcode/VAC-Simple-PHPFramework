<?php  

namespace Modular\Api\HMVC\Welcome\Models;

class Welcome {

	public function findById ( $id = null ) {
		if ( !is_null( $id ) ) {
			echo $id;
		}
	}

}




?>