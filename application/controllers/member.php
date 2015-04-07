<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller {

	//if you need to write session,overwrite this.
	var $_enable_cookie_write_methods = Array("signing","logout","signuping");
	var $_mem = null;

	public function index(){
		$this->load->view("member/index",
			Array(
				"pageTitle" => "My Project",
				"sub" => "info"
			));
	}

	public function info_edit(){
		$mem_sn = $this->_get_user_sn();
		if(!$this->_is_login()){
			redirect(site_url("member/signin"));
			return false;
		}
		if($mem_sn == null){
			return $this->_return_404();
		}
		$this->load->database();
		$this->load->model("memberModel");
		$mem = $this->memberModel->get($mem_sn);
		if($mem == null){
			return $this->_return_404();
		}

		$jobs = $this->memberModel->get_jobs();

		$this->load->view("member/edit",
			Array(
				"pageTitle" => "會員專區 - 編輯",
				"mem" => $mem,
				"jobs" => $jobs,
				"sub" => "info"
			));
	}

	public function projects($page = 1){
		$mem_sn = $this->_mem->mem_sn;

		$pageSize = 30;
		$this->load->model("storyModel");
		$articles = $this->storyModel->get_stories_by_member($mem_sn,$page,$pageSize);
		$article_count = $this->storyModel->count_blogger_articles_by_mem_sn($mem_sn);

		$this->load->view("member/stories",
			Array(
			"articles" => $articles,
			"article_count" => $article_count,
			"current_page" => $page,
			"page_count" => ceil($article_count / $pageSize),
			"pageTitle" => "My Project",
			"sub" => "project"
		));
	}

	public function post(){
		$mem_sn = $this->_mem->mem_sn;

		$this->load->view("member/post",
			Array(
				"pageTitle" => "新增自造者專案	",
				"sub" => "project",
				"categories" => _project_category()
		));
	}


	public function post_new(){
		$user_sn = $this->_get_user_sn();

		$this->load->model("storyModel");

		$data = Array();
		$data["title"] = $this->input->post("title");
		$data["content"] = $this->input->post("content");
		$data["intro"] = $this->input->post("intro");
		$data["userID"] = $user_sn;
		$data["category"] = $this->input->post("category");

		$tags = $this->input->post("tags");
		$data["tags"] = $tags;

		$upload = $this->_upload_image("post","cover","u/".$user_sn."/");
		$resources = Array();
		if($upload->isSuccess){
			$data["cover"] = $upload->data->url;
			$resource = Array("name" => $upload->data->name, 
				"url" => $upload->data->url,
				"raw_name"  => $upload->data->raw_name,
				"createDate" => db_current_date(),
				"modifyDate" => db_current_date(),
				"type" => TYPE_PROJECT_COVER
			);
			$resources[] = $resource;
		}
		//die(var_dump($_FILES));
		$article_id = $this->storyModel->insert_story($data);

		for($ind = 0 ;$ind < 10;++$ind){
			$res = $this->_upload("post_resource","files_".$ind,"u/".$user_sn."/");
			if($res->isSuccess){
				$resource = Array("name" => $res->data->name, 
					"url" => $res->data->url,
					"raw_name"  => $upload->data->raw_name,
					"createDate" => db_current_date(),
					"modifyDate" => db_current_date(),
					"type" => TYPE_PROJECT_IMAGE
				);
				$resources[] = $resource;
			}
		}

		foreach($resources as $res){
			$res["storyID"] = $article_id;
			$this->storyModel->insert_resource($res);
		}

		if(!empty($tags)){
			$this->storyModel->insert_tags($article_id,explode(",",$tags));
		}

		redirect(site_url("member/projects"));

	}

	public function project_edit($ba_sn = null){
		$user_sn = $this->_get_user_sn();
		$this->load->database();
		$this->load->model("storyModel");
		$post = $this->storyModel->get_story_by_member(
			$user_sn,
			$ba_sn
		);

		$images = $this->storyModel->get_image_resources($ba_sn);

		if($post == null){
			return $this->_return_404();
		}
		$this->load->view("member/story_edit",
			Array(
				"pageTitle" => "編輯文章",
				"story" => $post,
				"images" => $images,
				"categories" => _project_category(),
				"sub" => "story"
			));
	}

	public function project_del($ba_sn = null){
		$user_sn = $this->_get_user_sn();
		$this->load->database();
		$this->load->model("storyModel");
		$post = $this->storyModel->get_story_by_member(
			$user_sn,
			$ba_sn
		);

		if($post == null){
			return $this->_return_404();
		}
		$this->storyModel->delete($ba_sn);
		redirect(site_url("member/projects"));
	}

	public function project_update($storyID){
		$user_sn = $this->_get_user_sn();

		$this->load->model("storyModel");
		$story = $this->storyModel->get_story_by_member($user_sn,$storyID);
		
		if($story == null){
			return $this->_return_404();
		} 

		$data = Array();
		$data["title"] = $this->input->post("title");
		$data["content"] = $this->input->post("content");
		$data["intro"] = $this->input->post("intro");
		$data["userID"] = $user_sn;
		$data["category"] = $this->input->post("category");
		$tags = $this->input->post("tags");
		$data["tags"] = $tags;

		$upload = $this->_upload_image("post","cover","u/".$user_sn."/");
		$resources = Array();
		if($upload->isSuccess){
			$data["cover"] = $upload->data->url;
			$resource = Array("name" => $upload->data->name, 
				"url" => $upload->data->url,
				"raw_name"  => $upload->data->raw_name,
				"createDate" => db_current_date(),
				"modifyDate" => db_current_date(),
				"type" => TYPE_PROJECT_COVER
			);
			$resources[] = $resource;
		}else if($this->input->post("del_cover") == 1){
			$data["cover"] = null;
		}
		//die(var_dump($_FILES));
		$this->storyModel->update_user_story($story->userID,$storyID,$data);

		for($ind = 0 ;$ind < 10;++$ind){
			$res = $this->_upload("post_resource","files_".$ind,"u/".$user_sn."/");
			if($res->isSuccess){
				$resource = Array("name" => $res->data->name, 
					"url" => $res->data->url,
					"raw_name"  => $upload->data->raw_name,
					"createDate" => db_current_date(),
					"modifyDate" => db_current_date(),
					"type" => TYPE_PROJECT_IMAGE,
				);
				$resources[] = $resource;
			}
		}

		foreach($resources as $res){
			$res["storyID"] = $story->storyID;
			$this->storyModel->insert_resource($res);
		}

		$del_res = $this->input->post("del_res");
		if(!empty($del_res)){
			$this->storyModel->del_resources($storyID,$del_res);	
		}


		if(!empty($tags)){
			$this->storyModel->insert_tags($storyID,explode(",",$tags));
		}

		redirect(site_url("member/projects"));
	}

	public function post_on($ba_sn,$on = null){

		$this->load->database();
		$this->load->model("blogModel");
		$post = $this->blogModel->get_blogger_article_by_mem_sn(
			$this->_mem->mem_sn,
			$ba_sn,
			-1
		);

		if($post == null || $on == null){
			return $this->_return_404();
		}
		$this->blogModel->update_post_on($this->_mem->mem_sn,$ba_sn,$on);
		redirect(site_url("member/posts"));
	}
	public function editing($ba_sn,$on = 1){
		$this->load->database();
		$this->load->model("blogModel");
		$post = $this->blogModel->get_blogger_article_by_mem_sn(
			$this->_mem->mem_sn,
			$ba_sn,
			-1
		);

		if($post == null){
			return $this->_return_404();
		}

		$fields = Array("title","type","content","youtube","is_report");

		$data = Array();
		foreach($fields as $field){
			$data[$field] = $this->input->post($field);
		}
		$this->load->library("htmlpurifierhelper");
		$config = HTMLPurifier_Config::createDefault();
		$purifier = new HTMLPurifier($config);		

		$category = get_post_category();
		if(!isset($category[$data["type"]])){
			die("not exist category");
		}
		$data["content"] = $purifier->purify($data["content"]);
		$inserted_data = Array();

		//$inserted_data["bl_sn"] = 

		$inserted_data["title"] = $data["title"];
		$inserted_data["article"] =  $data["content"];
		$inserted_data["article_desc"] = strip_tags($data["content"]);
		$inserted_data["is_news"] = $data["is_report"] != null ? 1 :0;

		//article_pic
		if($on == 1){
			$inserted_data["is_on"] = 1;
		}else{
			$inserted_data["is_on"] = 0;
		}

		$inserted_data["date_update"] = db_current_date();
		$this->load->model("blogModel");
		$this->blogModel->update_blog_post($this->_mem->mem_sn,$ba_sn,$inserted_data);
		redirect(site_url("member/posts"));
	}

	public function posting($on = 1){

		$fields = Array("title","type","content","intro","youtube","is_report");

		$data = Array();
		foreach($fields as $field){
			$data[$field] = $this->input->post($field);
		}
		$this->load->library("htmlpurifierhelper");
		$config = HTMLPurifier_Config::createDefault();
		$purifier = new HTMLPurifier($config);		

		$category = get_post_category();
		if(!isset($category[$data["type"]])){
			die("not exist category");
		}

		$data["content"] = $purifier->purify($data["content"]);
		$data["intro"] = $purifier->purify($data["intro"]);

		$inserted_data = Array();

		//$inserted_data["bl_sn"] = 

		$inserted_data["title"] = $data["title"];
		$inserted_data["article"] =  $data["content"];
		$inserted_data["article_desc"] = strip_tags($data["content"]);
		//article_pic
		$inserted_data["date_year"] = date("Y");
		$inserted_data["date_month"] = date("m");
		$inserted_data["date_day"] = date("d");
		$inserted_data["date_ym"] = date("Ym");
		$inserted_data["is_news"] = $data["is_report"] != "" ? 1 :0;

		if($on == 1){
			$inserted_data["is_on"] = 1;
		}else{
			$inserted_data["is_on"] = 0;
		}

		$inserted_data["date_new"] = db_current_date();
		$inserted_data["date_update"] = db_current_date();
		$this->load->model("blogModel");
		$this->blogModel->insert_blog_post($this->_mem->mem_sn,$inserted_data);
		redirect(site_url("member/posts"));
	}

	public function logout(){
		unset($_SESSION["mem_info"]);
		session_write_close();
		redirect("member/");
	}

	public function info_editing(){
		$mem_sn = $this->_mem->mem_sn;
		//{"publish":"0","url":"","twitter":"","facebook":"","gplus":"",
		//"epaper":"0","real_name":"\u738b\u666f\u5f18",
		//"male":"1","subject":"1","cellphone":"","old_pwd":"","pwd":"","pwd2":""}
		$fields = Array("publish","url","twitter","facebook","gplus",
			"epaper","male","old_pwd","pwd","pwd2","intro");

		$data = Array();
		foreach($fields as $field){
			$data[$field] = $this->input->post($field);
		}


		$update_data = Array(
			"publish" => $data["publish"],
			"url" => $data["url"],
			"twitter" => $data["twitter"],
			"facebook" => $data["facebook"],
			"gplus" => $data["gplus"],
			"is_epaper" => $data["epaper"],
			"mem_desc" => $data["intro"]
		);
		if($this->_mem->upass == sha1($data["old_pwd"])
			&& $data["pwd"] == $data["pwd2"]
		){
			$update_data["upass"] = sha1($data["pwd"]);
		}

		$this->memberModel->update_info($mem_sn,$update_data);

		redirect(site_url("member/"));
	}

	public function signin(){
		$this->load->view("member/signin",Array("pageTitle" => "會員登入"));
	}

	public function signing(){
		$this->load->database();
		$this->load->model("memberModel");
		$ret = $this->memberModel->getUser(
			$this->input->post("user"),
			$this->input->post("pwd")
		);
		if($ret->isSuccess){
			$_SESSION["mem_info"] = $ret->data ;
		}
		session_write_close();

		header('Content-Type: application/json');
		if($ret->isSuccess){
			$result = $this->return_success_json(null);	
		}else{
			$result = $this->return_error($ret->errorCode,$ret->errorMessage);
		}
		return $result;
		//$this->return_json($ret);
	}

	public function preview($ba_sn){

		$this->load->database();
		$this->load->model("blogModel");

		$article = $this->blogModel->get_blogger_article($ba_sn,-1);
		if($article == null){
			show_404();
			return true;
		}

		$next_news = $this->blogModel->get_next_blog($article->bl_sn,$article->ba_sn,$article->date_new);
		$prev_news = $this->blogModel->get_prev_blog($article->bl_sn,$article->ba_sn,$article->date_new);
		

		$blogger = $this->blogModel->get_famous_blogger($article->bl_sn);

		//common
		$this->register_common();
		$this->register_content_side_bar();
		$this->register_ads("opinion",Array("top_banner","content_1","content_2",
			"right_1","right_2","right_3","right_4"));

		$this->load->view('citizens/view',Array(
			"author" => $blogger,
			"article" => $article,
			"next_news" => $next_news,
			"prev_news" => $prev_news,
			"pageTitle" => $article->title.""
 		));
	}

	public function is_login(){
		header('Content-Type: application/json');
		$this->return_success_json($this->_is_login());
	}

	public function signup(){
		$this->load->view("member/signup",Array("pageTitle" => "會員註冊"));
	}

	public function signuping(){
		$data = $this->_posts(null,Array("email","nick_name","pwd","pwd2"));

		$this->load->database();
		$this->load->model("memberModel");

		$auth = uniqid("au",true);
		$success = $this->memberModel->insert_new($auth,uniqid("m"),$data["email"],
			$data["nick_name"],
			$data["pwd"],
			null
		);

		if($success->isSuccess){
			$_SESSION["sign"] = $success->data;
		}

		$this->return_json($success,true);

		if($success->isSuccess){
			$mail = $this->load->view("mail/signup",Array(
    			"nick_name" => $data["nick_name"],
    			"email" => $data["email"],
    			"add_msg" => "<p><b>啟動網址:</b>".
    				"<a href='".site_url("member/active/".$auth)."'>".site_url("member/active/".$auth).
    				"</a></p>"
			),true);
			$this->_email($data["email"],
				null,null,"vmaker [會員啟動信]",$mail);
		}
	}

	public function active($auth = null){
		$this->load->database();
		$this->load->model("memberModel");
		$this->memberModel->active($auth);

		redirect(site_url("member/signin"));
	}

	public function reset($auth = null){
		$this->load->database();
		$this->load->model("memberModel");

		//$this->memberModel->active($auth);
		$email = $this->input->get("email");

		if($auth == null  || $email == ""){
			return $this->_return_404();
		}

		$this->load->database();
		$this->load->model("memberModel");
		$mem = $this->memberModel->get_by_reset($email,$auth);

		if($mem == null){
			return $this->_return_404();
		}

		$this->register_common();
		$this->register_ads("home",Array("top_banner"));
		$this->load->view("member/reset",Array(
			"pageTitle" => "會員重設密碼",
			"mem" => $mem
		));
		//http://local.newtalk.tw/member/active/au54e0f8eb0582e2.45907111
	}

	public function reseting(){
		$auth = $this->input->post("auth");
		$email = $this->input->post("email");
		$pwd = $this->input->post("pwd");
		$pwd2 = $this->input->post("pwd2");

		if($pwd == "" || $pwd2 == ""){
			redirect(site_url("member/reset/".$auth."?email=".rawurlencode($email)));
			return true;
		}

		//TODO
		if($pwd != $pwd2 ){

		}

		$this->load->database();
		$this->load->model("memberModel");
		$mem = $this->memberModel->get_by_reset($email,$auth);
		
		if($mem == null){
			return $this->_return_404();
		}

		$this->memberModel->set_password($email,$auth,$pwd);

		redirect(site_url("member/signin"));

	}

	public function forget(){
		$email = $this->input->post("email");	

		$this->load->database();
		$this->load->model("memberModel");

		$mem = $this->memberModel->get_by_email($email);
		if($mem == null){
			return $this->return_error(-1,"找不到此 Email ",true);
		}

		$auth = uniqid("fq",true);
		$this->memberModel->reset($email,$auth);

		$mail = $this->load->view("mail/reset",Array(
			"mail_title" => "會員驗證信",
			"nick_name" => $mem->nick_name,
			"email" => $mem->email,
			"add_msg" => "<p><b>密碼重設網址:</b>".
				"<a href='".site_url("member/reset/".$auth."?email=".rawurlencode($mem->email))."'>".
				site_url("member/reset/".$auth."?email=".rawurlencode($mem->email)).
				"</a></p>"
		),true);
		$this->_email($mem->email,
				null,null,"New Talk 會員服務[忘記密碼]",$mail);
		return $this->return_success_json(null,true);

	}

  //NOTE: who want to overwrite the _remap 
    //		have to rewrite the enable_cookie_write_methods also.
    public function _remap($method, $params = array())
	{

        session_start();
        if(	$this->_enable_cookie_write_methods == null ||
        	! in_array($method,$this->_enable_cookie_write_methods)){
        	session_write_close();
        }

        $mem = null;

        $allows = Array("reseting","reset","forget","active","signup","signuping","is_login","signin","signing");

        if(!in_array($method,$allows)){

	        $mem_sn = $this->_get_user_sn();
			if(!$this->_is_login()){
				redirect(site_url("member/signin"));
				return false;
			}
			if($mem_sn == null){
				return $this->_return_404();
			}
			$this->load->database();
			$this->load->model("memberModel");
			$mem = $this->memberModel->get($mem_sn);
			if($mem == null){
				return $this->_return_404();
			}		
			$this->load->vars(Array(
				"mem" => $mem
			));
			$this->_mem = $mem;
        }
	    if (method_exists($this, $method))
	    {
	        return call_user_func_array(array($this, $method), $params);
	    }
	    show_404();
	    return false;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */