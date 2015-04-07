<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Image extends MY_Controller {

	public function recent($last = null,$limit = 30){

		$user_sn = $this->_get_user_sn();
		$this->load->database();
		$this->load->model("imageModel");
		$images = $this->imageModel->recent($user_sn);
		$this->return_success_json($images);
		//$this->load->library("imagemanager");
		//$images = $this->imagemanager->recent();
		//$this->return_success_json($images,true);
	}

	public function albums(){
		$albums = $this->imagemanager->albums();
		$this->return_success_json($albums,true);
	}

	public function images($albumID,$last = null, $limit = 30){
		$images = $this->imagemanager->album_images($albumID);
		$this->return_success_json($images,true);
	}

	public function upload(){

		$user_sn = $this->_get_user_sn();
		$upload = $this->_upload_image("post","image","u/".$user_sn."/");
		if($upload->isSuccess){
			$this->load->database();
			$this->load->model("imageModel");
			$this->imageModel->insert_image($upload->data->url,$user_sn);
		}
		$this->return_json($upload,true);
	}

    public function _remap($method, $params = array())
	{
        session_start();
        if(	$this->_enable_cookie_write_methods == null ||
        	! in_array($method,$this->_enable_cookie_write_methods)){
        	session_write_close();
        }

        $mem = null;

        $allows = Array();

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