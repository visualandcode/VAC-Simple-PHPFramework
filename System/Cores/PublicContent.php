<?php  


namespace Cores;
use Libs\Helper\Variable,
	Libs\Http\Request;

class PublicContent extends \Libs\Instances {

	public $init;

	/**
	 * [init description]
	 * @return [type] [description]
	 */
	public function init ( $options = array() ) {
		$this->init = $options;
		foreach ( $options as $key => $val ) {
			$this->{$key} = $val;
		}

		$this->appsetting = $this->Variable::settings("app");
		$this->layout = $this->appsetting->layout;
	}

	/**
	 * [init description]
	 * @return [type] [description]
	 */
	public function layout () {
		
		if ( is_object( $this->appsetting ) && isset($this->appsetting->layout) ) {
			$dirLayout = "../Modular/" . $this->Variable::global("route_modular") . "/Layouts/" . $this->appsetting->layout;
			$component = $dirLayout . "/component/";
			$public    = $dirLayout . "/public/";

			if ( is_dir( $component ) ) {

				$Header  = $component . "Header.php";
				$Sidebar = $component . "Sidebar.php";
				$Content = $component . "Content.php";
				$Asset   = "autoinclude/assets.php";
				$Footer  = $component . "Footer.php";

				$RequireFile = array(
					$Header , 
					$Sidebar , 
					$Content , 
					$Asset , 
					$Footer
				);

				if ( !Request::isAjax() ) {
					extract($this->init);

					// each include file
					foreach ( $RequireFile as $key_file => $val_file ) {
						if ( file_exists( $val_file ) ) {
							require_once( $val_file );
						}
					}

				}

			}

		}


		//echo "<pre>";
		//print_r($this);

	}





}

?>