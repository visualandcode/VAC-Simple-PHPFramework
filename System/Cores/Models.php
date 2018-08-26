<?php  

namespace Cores;

use Atlas\Query\Select;
use Atlas\Query\Insert;
use Atlas\Query\Update;
use Atlas\Query\Delete;
use Libs\Instances;

class Models  {


	private $select;
	private $insert;
	private $update;
	private $delete;
	private $activeconnection;
	private $defaultconnection;

	/**
	 * [run description]
	 * @return [type] [description]
	 */
	public function run ( $changedb = false ) {
		
		if ( $changedb == true ) {
			return $this;
		}
		
		if ( isset( $this->connection['default'] ) ) {
			$this->defaultconnection = $this->connection['default'];
		}

		return $this;
	}

	/**
	 * [load_db description]
	 * @return [type] [description]
	 */
	public function DB ( $dbname = 'default' ) {
		if ( isset($this->connection[$dbname]) ) {
			$this->activeconnection = $this->connection[$dbname];
			$model = new Models();
			return $this->run( true );
		} 
	}

	/**
	 * [_crud description]
	 * @return [type] [description]
	 */
	private function _crud () {
		
	}

	public function instances () {
		return new Instances();
	}	

	


	

}


?>