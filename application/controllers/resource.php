<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resource extends MY_Controller {

	public function index(){
		$this->load->view("resource/index",
			Array(
				"pageTitle" => "資源平台",
				"sub" => "reousrce"
			)
		);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */