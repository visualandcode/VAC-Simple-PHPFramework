<?php  

namespace Cores;

use Atlas\Query\Select;
use Atlas\Query\Insert;
use Atlas\Query\Update;
use Atlas\Query\Delete;

class Models extends \Libs\Instances  {


	public $select;
	public $insert;
	public $update;
	public $delete;
	private $activeconnection;


	/**
	 * [run description]
	 * @return [type] [description]
	 */
	public function run ( $changedb = false ) {
			
		if ( $changedb == true ) {
			$this->crud();
			$this->db = $this;
			return $this;
		}

		if ( isset( $this->connection['default'] ) ) {
			unset( $this->activeconnection );
			$this->activeconnection = $this->connection['default'];
		}

		$this->crud();
		$this->db = $this;

		return $this;
	}

	/**
	 * [load_db description]
	 * @return [type] [description]
	 */
	public function setdb ( $dbname = 'default' ) {
		if ( isset($this->connection[$dbname]) ) {
			unset( $this->activeconnection );
			$this->activeconnection = $this->connection[$dbname];
			return $this->run(true);
		} 
	}

	/**
	 * [reset description]
	 * @return [type] [description]
	 */
	public function closedb () {
		if ( isset( $this->connection['default'] ) ) {
			unset( $this->activeconnection );
			$this->activeconnection = $this->connection['default'];
			return $this->run();
		}
	}

	

	/**
	 * [CRUD description]
	 * @param boolean $changedb [description]
	 */
	private function crud ( $changedb = false ) {
		$this->select = Select::new( $this->activeconnection );
		$this->update = Update::new( $this->activeconnection );
		$this->insert = Insert::new( $this->activeconnection );
		$this->delete = Delete::new( $this->activeconnection );
	}


	

}


?>