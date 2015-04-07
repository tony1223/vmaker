<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class League extends MY_Controller {

	public function index(){
		$_time = microtime(true); 

		$this->load->database();
		$this->load->model("storyModel");
		$stories = $this->storyModel->get_stories(1,30);
		//_time_diff("",$_time);

		//var_dump($news);
		$this->load->view('league/index',
			Array(
				"stories" => $stories 
			)
		);
	}

	public function view($storyID){
		$this->load->database();
		$this->load->model("storyModel");
		$this->load->model("memberModel");
		$story = $this->storyModel->get_story($storyID);

		if($story == null){
			return $this->_return_404();
		}

		$member = $this->memberModel->get($story->userID);

		$this->load->view("story/view",
			Array(
				"pageTitle" => $story->title." | 創客故事",
				"story" => $story,
				"member" => $member,
				"sub" => "makers"
			)
		);
	}
	//	Ab33563356

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */