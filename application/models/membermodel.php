<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MemberModel extends MY_Model {

  	var $_table = "mem_member mem";
    var $_table_ = "mem_member";

  	var $primary_key = "mem_sn";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    

	function getUser($in_mid = "", $in_upass_p = "")
    {
    	$in_upass = sha1($in_upass_p);
        $pass_len = 40 ; // sha1

        $error = " 會員登入失敗 !!" ;
        $status = null;
        $mem_info = null;
        if(strlen($in_mid) > 0 && strlen($in_upass) == $pass_len)
        {
            $mem_info = $this->_get_mem_info($in_mid, "mid") ;
            if($mem_info == null){
                $mem_info = $this->_get_mem_info($in_mid, "email") ;
            }
            if( $mem_info != null && 
            	$mem_info->mem_sn > 0 && 
            	$mem_info->upass == $in_upass)
            {
                if($mem_info->need_auth == 1)
                {
                    $error = " 會員尚未通過 e-mail 認證 !!" ;
                    $status = ERROR_MEMBER_NOT_VERIFIED ;
                }else if($mem_info->is_on == 1)
                {
                    $this->_update_last_login($mem_info->mem_sn);
                    $mem_info->login_time = $mem_info->login_time + 1 ;

//                    $_SESSION["mem_info"] = $mem_info ;
                    $status = 1;
                    $error = " 會員登入成功 !!" ;
                }
                else
                {
                    $status = ERROR_MEMBER_LOCKED;
                    $error = " 會員登入失敗 !! 帳號鎖定中..." ;
                }
            }else{
            	$status = ERROR_MEMBER_NOT_EXIST;
        	}
        }

        if($status != 1){
        	//$isSuccess,$errorCode,$errorMessage,$data
        	return new ReturnMessage(false,$status,$error,$mem_info);
        }

        return  new ReturnMessage(true,$status,$error,$mem_info);

    }

    function _update_last_login($mem_sn){

    	$this->db->where("mem_sn",$mem_sn);
    	$this->db->set("login_time","login_time +1 ",false);
    	$this->db->set("date_last"," now() ",false);
    	$this->db->limit(1);
    	$this->db->update($this->_table);

    }


    function update_info($mem_id,$info){
        if($mem_id == ""){
            return null;
        }
        $this->db->set($info);
        $this->db->where("mem_sn",$mem_id);
        $this->db->update($this->_table);

    }

    function active($auth){
        $this->db->where("auth_code",$auth);
        $this->db->where("need_auth",1);

        $this->db->set("is_repoter",2);
        $this->db->set("need_auth",0);
        $this->db->set("date_update",db_current_date());
        $this->db->update($this->_table_);

    }

    function insert_new($auth,$mid,$email,$nick,$pwd,$is_paper){

        $this->db->where("email" ,$email);
        $this->db->limit(1);
        $query = $this->db->get($this->_table_);
        if(count($query->result()) > 0 ){
            return new ReturnMessage(false,-1,"email 已被使用過");
        }

        $this->db->where("nick_name" ,$nick);
        $this->db->limit(1);
        $query = $this->db->get($this->_table_);
        if(count($query->result()) > 0 ){
            return new ReturnMessage(false,-1,"暱稱已被使用過");
        }


        $this->db->insert($this->_table_,Array(
            "is_repoter" => 0,
            "auth_code" => $auth,
            "need_auth" => 1,
            "date_new"=> db_current_date(),
            "date_update"=> db_current_date(),
            "date_last"=> db_current_date(),
            "is_on" => 1,
            "sex" => null,
            "mid" => $mid,
            "is_vip_name" => "",
            "nmlcat_sn" => "",
            "upass" => sha1($pwd),
            "email" => $email,
            "nick_name" => $nick,
            "is_epaper" => $is_paper
        ));

        return new ReturnMessage(true,0,null,$this->db->insert_id());
        // is_repoter = 0 
        // auth_code = sha1
        // need_auth = 1
        // date_new
        // date_update
        // date_last
        // is_on =1
        // 

        //mid
        //upass
        //nick_name
        //is_epaper
        //is_on

    }

    function reset($email,$auth){
        $this->db->where("email",$email);
        $this->db->set("forget",$auth);
        $this->db->update($this->_table_);
    }

    function get_by_reset($email,$auth){
        $this->db->where("forget",$auth);
        $this->db->where("email",$email);
        $this->db->limit(1);
        return array_first_item($this->db->get($this->_table_)->result());
    }

    function set_password($email,$auth,$pwd){
        $this->db->where("forget",$auth);
        $this->db->where("email",$email);
        $this->db->set("upass",sha1($pwd));
        $this->db->set("forget",uniqid("fgr",true));
        $this->db->update($this->_table_);

    }

    function get_by_email($email){
        $this->db->select("*");
        $this->db->where("mem.email",$email);
        $this->db->limit(1);

        $results = $this->db->get($this->_table)->result();
        $item = array_first_item($results);
        if($item == null){
            return null;
        }
        return $item;
    }

    function get($mem_sn){
    	$this->db->select("mem.*," /* .
    		"bl.bl_sn,bl.title,bl.b_desc,bl.mem_desc,bl.mem_pic,job.job_name"*/);
    	$this->db->where("mem.mem_sn",$mem_sn);
        //$this->db->join($this->_table_job,"mem.job_sn = job.job_sn","left outer");
        $this->db->limit(1);

        $results = $this->db->get($this->_table)->result();
        $item = array_first_item($results);
        if($item == null){
            return null;
        }
        return $item;
    }

    function _get_mem_info($in_obj = "", $in_type = "email")
    {

        switch($in_type)
        {
            case "mem_sn":
            	$this->db->where("mem.mem_sn",$in_obj);
                break ;

            case "email":
            	$this->db->where("mem.email",$in_obj);
                break ;

            case "mid":
            	$this->db->where("mem.mid",$in_obj);
                break ;
            case "nick_name":
            	$this->db->where("mem.nick_name",$in_obj);
                break ;
        }
        $this->db->limit(1);

        $results = $this->db->get($this->_table)->result();
        return array_first_item($results);
    }
}

