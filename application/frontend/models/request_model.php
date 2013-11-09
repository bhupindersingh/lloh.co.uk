<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Request_model extends CI_Model{
	function __construct(){
		parent::__construct();		
	}	
	public function post_request($image){		
		// grab user input		
		$date=date("Y-m-d H:i:s",strtotime($this->security->xss_clean($this->input->post('txtDeadline'))));
		$data = array(
		   'user_id'=>$this->session->userdata('userid'),
		   'post_name' => $this->security->xss_clean($this->input->post('txtNameOfRequest')),
		   'description' => $this->security->xss_clean($this->input->post('txtDescription')),	
		   'quantity_required'=>$this->security->xss_clean($this->input->post('txtQuantity')),
		   'deadline'=>$date,
		   'status'=>$this->security->xss_clean('active'),
		   'post_approved'=>$this->security->xss_clean('published')		
		   );
		if(is_array($image['success']))
			$data['photo']=$image['success']['file_name'];
		
		$this->db->insert('post_a_request', $data);
		return true;
	}	
	public function fetch_requests(){
		$to = $this->input->post('txtTo');		
		$status = $this->input->post('selStatus');
		if($to !="" || $status!="")
		{
			if($to != ''){							
				$this->db->where('deadline <=', $to); 				
			}
			if($status!=''){				
				$this->db->where('status =',$status);				
			}
		}
		$this->db->select('*');
		$this->db->from('post_a_request');
		$this->db->where('user_id', $this->session->userdata('userid'));
		$this->db->order_by("POST_ID", "desc"); 
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