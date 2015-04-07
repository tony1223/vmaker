<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maker extends MY_Controller {

	public function index(){
		$this->load->database();
		$this->load->model("memberModel");
		$query = $this->memberModel->db->get("mem_member");
		$members = $query->result();
		$this->load->view("maker/index",
			Array(
				"pageTitle" => "創客列表",
				"members" => $members,
				"sub" => "makers"
			)
		);
	}
	//	Ab33563356

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */