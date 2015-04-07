<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	// public function register_common(){
	// 	$global_data['pageScript'] = "";
	// 	$global_data['pageTitle'] = "myval";
	// 	$global_data['selector'] = "";
	// 	session_start();
	// 	$this->load->vars($global_data);
	// }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$_time = microtime(true); 

		$this->load->database();
		$this->load->model("storyModel");

		$stories = $this->storyModel->get_stories(1,4);
		$activities = $this->storyModel->get_event_stories(1,2);

		$heros = $this->storyModel->get_hero_stories(1,2);
		//_time_diff("",$_time);

		//var_dump($news);
		$this->load->view('welcome_message',
			Array(
				"stories" => $stories ,
				"heros" => $heros,
				"events" => $this->_events(),
				"activities" => $activities,
				"sub" => "home"
			)
		);
	}

	public function about(){
		$this->load->view("pages/about",
			Array(
				"pageTitle" => "關於創客運動 Maker Movement",
				"sub" => "about"
			)
		);
	}

	public function copyright(){
		$this->load->view("pages/copyright",
			Array(
				"pageTitle" => "著作權與隱私條款",
				"sub" => "about"
			)
		);
	}

	public function fan2(){
		$this->load->view("pages/fan2",
			Array(
				"pageTitle" => "第二屆 FAB LAB 亞洲年會",
				"sub" => "about"
			)
		);
	}

	public function error(){
        header('HTTP/1.0 404 Not Found');
        $this->load->view('rewrite_404.php',Array("showTopAd" => false));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */