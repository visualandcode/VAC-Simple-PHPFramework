<?php  

namespace Libs; 

class Instances {

	/**
	 * [__get description]
	 * @return [type] [description]
	 */
	public function __get ( $static = null ) {
		if ( !is_null($static) ) {
			$classes = "\\Libs\\Helper\\" . ucfirst($static);
			if ( class_exists( $classes ) ) {
				return new $classes;
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
		echo 'Execution time : '. round($time+1) .' seconds';
	}


}


?>