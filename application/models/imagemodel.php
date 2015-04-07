<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class ImageModel extends MY_Model {

    var $_table = "images"; 

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    

    public function insert_image($url,$mem_sn){
        $data = Array(
            "raw_url" => $url,
            "mem_sn" => $mem_sn,
            "createDate" => db_current_date()
        );
        $this->db->insert($this->_table,$data);
    }


    public function recent($mem_sn,$last = null,$limit = 30){

        $this->db->select("image_sn as id,raw_url as url,createDate");
        $this->db->where("mem_sn",$mem_sn);
        $this->db->limit($limit);

        $query = $this->db->get($this->_table);
        $result = $query->result();

        return $result;
    }

    public function albums($last = null,$limit =10 ){
        $albums = fake_albums( $limit );
        return $albums;
    }

    public function album_images($albumID,$last = null,$limit = 30){
        $images = fake_images( $limit );
        return $images;
    }

}