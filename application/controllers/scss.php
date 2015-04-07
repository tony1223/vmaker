<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Scss extends MY_Controller {

	public function file($name){
		$_GET["p"] = $name;
		$directory = __DIR__."/../../public/css/";
		require __DIR__."/../../vendor/autoload.php";
		scss_server::serveFrom($directory);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */