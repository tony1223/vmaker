<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class StoryModel extends MY_Model {

    var $_table = "stories";
    var $_table_resource = "resource";
    var $_table_tag = "story_tag";
    var $primary_key = "storyID";


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_stories_by_member($mem_sn,$page,$pageSize){
        $this->db->where("deleted",0);
        $this->db->where("userID",$mem_sn);
        $this->page($page,$pageSize);
        $query = $this->db->get($this->_table);

        return $query->result();
    }

    public function get_story_by_member($mem_sn,$storyID){
        $this->db->where("deleted",0);
        $this->db->where("userID",$mem_sn);
        $this->db->where("storyID",$storyID);
        $this->db->limit(1);
        $query = $this->db->get($this->_table);

        return array_first_item($query->result());
    }

    public function get_stories($page,$pageSize){
        $this->db->where("deleted",0);
        $this->page($page,$pageSize);
        $this->db->order_by("storyID desc");
        $query = $this->db->get($this->_table);

        return $query->result();
    }

    public function get_stories_by_category($cateKey,$page,$pageSize){
        $this->db->where("deleted",0);

        $this->db->where("category",$cateKey);
        $this->page($page,$pageSize);
        $this->db->order_by("storyID desc");
        $query = $this->db->get($this->_table);

        return $query->result();
    }

     public function get_top_stories($page,$pageSize){
        $this->db->where("deleted",0);
        $this->page($page,$pageSize);
        $this->db->order_by("count_show desc");
        $query = $this->db->get($this->_table);

        return $query->result();
    }


    public function get_hero_stories($page,$pageSize){
        $this->db->where("s.deleted",0);
        $this->db->where("category","hero");
        $this->page($page,$pageSize);
        $this->db->order_by("s.storyID desc");
        $query = $this->db->get($this->_table." s");

        return $query->result();
    }

    public function get_event_stories($page,$pageSize){
        $this->db->where("s.deleted",0);
        $this->db->where_in("category",Array("events","fab-truck"));
        $this->page($page,$pageSize);
        $this->db->order_by("s.storyID desc");
        $query = $this->db->get($this->_table." s");

        return $query->result();
    }
   
    public function get_story($storyID){
        $this->db->where("storyID",$storyID);
        $this->db->where("deleted",0);
        $this->db->limit(1);
        $query = $this->db->get($this->_table);

        return array_first_item($query->result());
    }
   
    public function count_stories_by_member($mem_sn,$page,$pageSize){
        $this->db->select("count(*) as cnt");
        $this->db->where("userID",$mem_sn);
        $this->db->where("deleted",0);
        $this->page($page,$pageSize);
        $query = $this->db->get($this->_table);

        return array_first_item($query->result())->cnt;
    }
   
    public function insert_story($data){
        $this->db->insert($this->_table,$data);
        return $this->db->insert_id();
    }

    public function update_user_story($userID,$storyID,$data){
        $this->db->set($data);
        $this->db->where("userID",$userID);
        $this->db->where("storyID",$storyID);
        $this->db->where("deleted",0);
        $this->db->update($this->_table);
    }

    public function insert_resource($data){
        $this->db->insert($this->_table_resource,$data);
        return $this->db->insert_id();
    }

    public function insert_tags($storyID,$tags){
        $this->db->where("storyID",$storyID);
        $this->db->delete($this->_table_tag);

        $inserts = array();

        foreach($tags as $tag){
            $inserts[] = Array(
                "tagName" => $tag,
                "storyID" => $storyID
            );
        }
        $this->db->insert_batch($this->_table_tag,$inserts);
    }

    public function get_image_resources($storyID){
        return $this->get_resources($storyID,TYPE_PROJECT_IMAGE);
    }

    public function get_resources($storyID,$type ){
        $this->db->where("storyID",$storyID);
        $this->db->where("type",$type);
        $this->db->where("deleted",0);
        $query = $this->db->get($this->_table_resource);

        return $query->result();
    }

    public function del_resources($storyID,$del_res){
        $this->db->where("storyID",$storyID);
        $this->db->where_in("resourceID",$del_res);
        $this->db->where("deleted",0);
        $this->db->set("deleted",1);
        $this->db->update($this->_table_resource);
    }

    public function add_count_show($storyID){
        $this->db->where("storyID",$storyID);
        $this->db->set("count_show "," count_show + 1",false);
        $this->db->update($this->_table);
    }

}