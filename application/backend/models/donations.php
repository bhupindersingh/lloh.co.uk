<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Donations extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("post_a_request");
    }
 
    public function fetch_posts($limit, $start) {	
		$fromid = intval($this->input->post('fromid'));
		$toid = intval($this->input->post('toid'));	
		$post_name = $this->input->post('post_name');
		$member_name = $this->input->post('member_name');
		$deadline = $this->input->post('deadline');		
		$status = $this->input->post('status');
		$addtosql='';
		if($fromid == "1" || ($fromid !="" || $toid>0 || $post_name!='' || $member_name!="" || $deadline!="" || $status!=""))
		{
			if($fromid > 0){							
				$this->db->where('POST_ID >=', $fromid); 				
			}
			else{				
				$this->db->where('POST_ID >', $fromid); 
			}
			if($toid > 0){				
				$this->db->where('POST_ID <=', $toid); 
				
			}
			if($status != ""){				
				$this->db->where('post_a_request.status', $status);
				
			}
			if($post_name != ""){				
				$this->db->like('post_name', $post_name); 
				
			}	
			if($member_name != ""){				
				$this->db->like('firstname', $member_name); 
				$this->db->like('lastname', $member_name); 
			}
			if($deadline != ""){				
				$this->db->like('post_a_request.deadline', $deadline); 
				
			}					
		}
        $this->db->limit($limit, $start);
		$this->db->select('post_a_request.*,members.firstname,members.lastname');
		$this->db->from('post_a_request');
		$this->db->join('members', 'post_a_request.user_id = members.USERID');
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
   	}   	
	public function get_post_request($POSTID){
		$this->db->select('post_a_request.*,members.firstname,members.lastname');
		$this->db->from('post_a_request');
		$this->db->join('members', 'post_a_request.user_id = members.USERID');        
		$this->db->where('post_a_request.POST_ID = ', $POSTID);	
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	public function get_donar($POSTID){			
		$this->db->select('donations.*,post_a_request.post_name');
		$this->db->from('donations');
		$this->db->join('post_a_request', 'post_a_request.POST_ID = donations.POST_ID');        
		$this->db->where('donations.POST_ID = ', $POSTID);	
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	//Update Member
	public function update_post(){		
		// grab user input
		$POSTID=$this->input->get('POSTID');
		$data = array(
		   'post_name' => $this->security->xss_clean($this->input->post('post_name')),
		   'description' => $this->security->xss_clean($this->input->post('description')),
		   'quantity_required' => $this->security->xss_clean($this->input->post('quantity_required')),
		   'deadline'=>$this->security->xss_clean($this->input->post('deadline')),
		   'status'=>$this->security->xss_clean($this->input->post('selStatus'))		   	   
		);		
		
		$this->db->where('POST_ID', $POSTID);
		$this->db->update('post_a_request', $data);	
		return true;	
	}
	//Delete Member
	public function delete_post($POSTID){
		$this->db->delete('post_a_request', array('POST_ID' => $POSTID)); 	
		$this->db->delete('donations', array('POST_ID' => $POSTID)); 	
		return true;  
	}	
}