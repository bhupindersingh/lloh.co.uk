<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model{
	function __construct(){
		parent::__construct();		
	}	
	public function record_count() {		
		$this->db->where('post_type', 'article');
		$this->db->where('post_status', 'published');
        return $this->db->count_all_results("posts");
    }
	
	public function list_articles($limit, $start){		
		$this->db->limit($limit, $start);
		$this->db->where('post_type', 'article');
		$this->db->where('post_status', 'published');
		$this->db->order_by("ID", "desc"); 
        $query = $this->db->get("posts");
 		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
	}	
	
	public function get_article($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('posts');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('posts', array('post_name' => $slug,'post_type'=>'article','post_status'=>'published'));
		return $query->row_array();
	}
}