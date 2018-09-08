<?php  

namespace Modular\Web\HMVC\Welcome\Controllers;

class WelcomeController extends \Cores\Controller {

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index () {
		$data = array( "messages" => "Welcome Pages!" , "allow" => array(
			
				"nama" => 'Ahmad Wahyudin' , 
				"lahir" => 'Jakarta'

		) );
		$this->view("welcome" , $data , true );
		$this->view("welcomes" , $data );
	}


	/**
	 * [anu description]
	 * @return [type] [description]
	 */
	public function json () {
		$data = array( "messages" => "Welcome Pages!" );
		return $data;
	}



}

?>