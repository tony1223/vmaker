<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $_enable_cookie_write_methods = null;

	function MY_Controller ()  {
        parent::__construct();
        $this->load->vars("page_key","home");
        $this->load->vars("page","home");
    }


    public function _events(){
		$json = file_get_contents(__DIR__."/../config/schools.json");
		return json_decode($json);
    }

    public function _posts($fields = null,$requires = null){
		//$fields = Array("email","nick_name","pwd","pwd2","accepted","is_epaper");

		$data= Array();

		if($fields != null){
			foreach($fields as $field){
				$data[$field] = $this->input->post($field);
			}
		}

		if($requires != null){
			foreach($requires as $field){
				$data[$field] = $this->input->post($field);
				if($data[$field] == ""){
					die($field ." missed");
				}
			}
		}

		return $data;

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
	    if (method_exists($this, $method))
	    {
	        return call_user_func_array(array($this, $method), $params);
	    }
	    show_404();
	    return false;
	}

	//====================helpers methods

	public function _email($to,$cc,$bcc,$subject,$message){
		

		$this->load->library('email');

		$this->email->from('', '');

		if($to != null){
			$this->email->to($to); 
		}
		if($bcc != null){
			$this->email->bcc($bcc); 
		}

		$this->email->subject($subject);
		$this->email->message($message);	

		$this->email->send();
	
		
		//echo $this->email->print_debugger();
	}

	
	public function _is_login(){
		return isset($_SESSION["mem_info"]) && $_SESSION["mem_info"] != null;
	}
	

	public function _get_user_sn(){
		if(!$this->_is_login()){
			return null;
		}
		return $_SESSION["mem_info"]->mem_sn;
	}
	

	public function _return_404(){
		show_404();
		return false;
	}


	public function _upload($category,$name,$folder_path = ""){
		if(!isset($_FILES[$name])){
			return new ReturnMessage(false,100,'No uploaded file.');
		}
		$path = $_FILES[$name]['tmp_name'];
		$name = $_FILES[$name]["name"];
		$file_ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

		$file_name = uniqid($category."_");

 		@mkdirs(UPLOAD_FOLDER.$folder_path);
		if (!move_uploaded_file(
	        $path,
	        UPLOAD_FOLDER.$folder_path.$file_name.".".$file_ext
	    )) {
	        return new ReturnMessage(false,100,'Failed to move uploaded file.');
	    }

	    return new ReturnMessage(true,null,null,(object)Array(
	    	"raw_name" => $name,
    		"name" => $file_name.".".$file_ext ,
    		"ext" => $file_ext,
    		"url" => MEDIA_ROOT.$folder_path.$file_name.".".$file_ext
    	));
	}
	public function _upload_image($category,$name,$folder_path = ""){
		$path = $_FILES[$name]['tmp_name'];
		$name = $_FILES[$name]["name"];
		$file_ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

		$file_name = uniqid($category."_");

		$whitelist = array("jpg","jpeg","gif","png","swf"); 
 		if (!(in_array($file_ext, $whitelist))) {
    		return new ReturnMessage(false,100,"file type [".$file_ext."] not allowed.");
 		}

 		@mkdirs(UPLOAD_FOLDER.$folder_path);
		if (!move_uploaded_file(
	        $path,
	        UPLOAD_FOLDER.$folder_path.$file_name.".".$file_ext
	    )) {
	        throw new ReturnMessage(false,100,'Failed to move uploaded file.');
	    }

	    return new ReturnMessage(true,null,null,(object)Array(
	    	"raw_name" => $name,
    		"name" => $file_name.".".$file_ext ,
    		"ext" => $file_ext,
    		"url" => MEDIA_ROOT.$folder_path.$file_name.".".$file_ext
    	));
	}

	protected function return_success_json ($obj,$header = false){
		if($header){
			header('Content-Type: application/json');
		}
		return $this->return_json(new ReturnMessage(true,0, null, $obj));
	}

	protected function return_error($code,$msg,$header = false){
		if($header){
			header('Content-Type: application/json');
		}		
		return $this->return_json(new ReturnMessage(false,$code,$msg, null));
	}

	protected function return_json ($obj,$header = false){
		if($header){
			header('Content-Type: application/json');
		}		
		echo json_encode($obj);
		return true;
	}


	public function _get_pages($page){
		if(!is_numeric($page)){
			$page = 1;
		}else{
			$page = intval($page,10);
		}
		if($page < 1 ){
			$page = 1;
		}
		return $page;
	}

	public function get_cache($CACHE_ID){
        $this->load->driver('cache');

        if ($this->cache->file->is_supported()){
            $data = $this->cache->file->get($CACHE_ID);
            if($data != false){
                return $data;
            }
        }
        return null;
	}

	public function save_cache($cache_id,$time,$datas){
		$this->load->driver('cache');

        if ($this->cache->file->is_supported()){
            $this->cache->file->save($cache_id, $datas,  $time);
        }
	}

}

class ReturnMessage{
	var $isSuccess;
	var $errorCode;
	var $data;
	public function __construct($isSuccess,$errorCode,$errorMessage,$data = null){
		$this->isSuccess = $isSuccess;
		$this->errorCode = $errorCode;
		$this->errorMessage = $errorMessage;
		$this->data = $data;
	}
}

class FormObject{
	var $data;
	public function __construct($data = Array()){
		$this->data = $data;
	}

	public function __get($prop){
		if(isset($this->data[$prop])){
			return $this->data[$prop];
		}else{
			return "";
		}
	}
}

class RssObject{
	var $data;
	public function __construct($title,$desc,$link,$pubDate){
		$this->data = Array(
			"title" => h($title),
			"desc" => h($desc),
			"link" => h($link),
			"pubDate" => date("Y-m-d H:i:s",strtotime($pubDate))
		);
	}

	public function __get($prop){
		if(isset($this->data[$prop])){
			return $this->data[$prop];
		}else{
			return "";
		}
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */