<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class School extends MY_Controller {
	
	
	public function info($unname){
		$name = rawurldecode($unname);

		// $this->load->view("school/about",
		// 	Array(
		// 		"pageTitle" => "2015 Fab Truck 3D列印校園巡迴計畫",
		// 		"sub" => "school"
		// 	)
		// );

		$this->load->database();
		$this->load->model("storyModel");
		$this->load->model("memberModel");

		$events = $this->_events();
		$event = null;
		foreach($events as $e){
			if($name == $e->name){
				$event = $e;
			}
		}
		if($event == null){
			return $this->_return_404();
		}

		$images = Array();


		$this->load->view("school/info",
			Array(
				"pageTitle" => "2015 校園巡迴計畫 - ".$name,
				"imgs" => $images,
				// "member" => $member,
				"events" => $this->_events(),
				"event" => $event,
				"sub" => "makers",
				"page_key" => "page-project"
			)
		);
	}

	public function y2014(){
		$this->load->view("school/y2014",
			Array(
				"pageTitle" => "2014 Fab Truck 3D 列印校園巡迴計畫 成果",
				"sub" => "school"
			)
		);
	}

	public function schedule($name){
		$this->load->view("school/schedule",
			Array(
				"pageTitle" => "行程表與志工報名 | 2015 Fab Truck 3D列印校園巡迴計畫",
				"sub" => "school",
				"events" => $this->_events(),
			)
		);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */