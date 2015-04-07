<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller {

	public function index(){
		$_time = microtime(true); 

		$this->load->database();
		$this->load->model("storyModel");
		$stories = $this->storyModel->get_stories(1,30);

		$hot_stories = $this->storyModel->get_top_stories(1,5);
		//_time_diff("",$_time);

		//var_dump($news);	
		$this->load->view('project/index',
			Array(
				"stories" => $stories ,
				"hot_stories" => $hot_stories,
				"page_key" => "page-projects",
				"events" => $this->_events(),
				"categories" => _project_category(),
			)
		);
	}

	public function category($hero){
		$_time = microtime(true); 

		$this->load->database();
		$this->load->model("storyModel");

		$cat = _get_category_by_key($hero);
		$stories = $this->storyModel->get_stories_by_category($cat["key"],1,30);

		$hot_stories = $this->storyModel->get_top_stories(1,5);
		//_time_diff("",$_time);

		//var_dump($news);
		$this->load->view('project/category',
			Array(
				"stories" => $stories ,
				"hot_stories" => $hot_stories,
				"page_key" => "page-projects",
				"categories" => _project_category(),
				"events" => $this->_events(),
				"current_cat" => $cat
			)
		);
	}

	public function view($storyID){
		$this->load->database();
		$this->load->model("storyModel");
		$this->load->model("memberModel");
		$story = $this->storyModel->get_story($storyID);

		$images = $this->storyModel->get_image_resources($storyID);

		if($story == null){
			return $this->_return_404();
		}

		$member = $this->memberModel->get($story->userID);
		$this->storyModel->add_count_show($storyID);

		$this->load->view("project/view",
			Array(
				"pageTitle" => $story->title." | 創客故事",
				"story" => $story,
				"imgs" => $images,
				"member" => $member,
				"events" => $this->_events(),
				"sub" => "makers",
				"page_key" => "page-project"
			)
		);
	}
	//	Ab33563356

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */