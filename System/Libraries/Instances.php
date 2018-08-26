<?php  

namespace Libs; 

class Instances {


	public $variable = array();

	/**
	 * [__get description]
	 * @return [type] [description]
	 */
	public function __get ( $static = null ) {
		if ( !is_null($static) ) {
			$classes = "\\Libs\\Helper\\" . ucfirst($static);
			if ( class_exists( $classes ) ) {
				$classes_exists   = new $classes;
				$this->variable[] = $classes_exists;
				return $classes_exists;
			} else {
				return null;
			}
		}
	}	

	/**
	 * [timeexec description]
	 * @return [type] [description]
	 */
	public function timeexec () {
		$time_start = microtime(true);
		$time_end   = microtime(true);
		$time = $time_end - $time_start;
		echo '<br><pre>Execution time : '. round($time+1) .' seconds</pre>';
	}


}


?>