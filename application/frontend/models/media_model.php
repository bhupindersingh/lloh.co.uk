<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Media_model extends CI_Model{
	function __construct(){
		parent::__construct();		
	}	
	public function list_media(){
		$media = $this->input->post('selMedia');			
		if($media != ""){
			$this->db->where('media_type =', $media);						
		}
		else{
			$this->db->where('media_type =', 'video'); 		
		}
		$this->db->where('media_status =', 'published'); 
		$this->db->select('*');
		$this->db->from('media');		
		$this->db->order_by("MEDIA_ID", "desc"); 
		$query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
	}
}