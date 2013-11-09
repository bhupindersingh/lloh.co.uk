<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page_model extends CI_Model{
	function __construct(){
		parent::__construct();		
	}	
	public function get_page($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('posts');
			return $query->result_array();
		}
	
		$query = $this->db->get_where('posts', array('post_name' => $slug,'post_type'=>'page','post_status'=>'published'));
		return $query->row_array();
	}
}