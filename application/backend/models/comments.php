<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comments extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("reviews");
    }
 
    public function fetch_reviews($limit, $start) {	
		$fromid = intval($this->input->post('fromid'));
		$toid = intval($this->input->post('toid'));	
		$organization = $this->input->post('organization');
		$name = $this->input->post('name');				
		$status = $this->input->post('status');
		$addtosql='';
		if($fromid == "1" || ($fromid !="" || $toid>0 || $organization!='' || $name!="" || $status!=""))
		{
			if($fromid > 0){							
				$this->db->where('REVIEW_ID >=', $fromid); 				
			}
			else{				
				$this->db->where('REVIEW_ID >', $fromid); 
			}
			if($toid > 0){				
				$this->db->where('REVIEW_ID <=', $toid); 
				
			}
			if($status != ""){				
				$this->db->where('status', $status);
				
			}
			if($organization != ""){				
				$this->db->like('group_type.group_name', $organization); 
				
			}	
			if($name != ""){				
				$this->db->like('name', $name); 				
			}								
		}
        $this->db->limit($limit, $start);
		$this->db->select('reviews.*, group_type.group_name');
		$this->db->from('reviews');
		$this->db->join('group_type', 'reviews.organization = group_type.GROUPID');
		$this->db->order_by("reviews.REVIEW_ID", "desc"); 
        $query = $this->db->get();
 		//echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
   	}   
   	public function update_status($staus,$reviewid){		
		$data = array(
               'status' => $staus               
            );
		$this->db->where('REVIEW_ID', $reviewid);
		$this->db->update('reviews', $data); 
		return true;   
	}
	public function get_review($REVIEWID){
		$query = $this->db->get_where('reviews', array('REVIEW_ID' => $REVIEWID));	
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	//Update Member
	public function update_review(){
		// grab user input
		$REVIEWID=$this->input->get('REVIEWID');
		$data = array(		   
		   'name' => $this->security->xss_clean($this->input->post('name')),
		   'organization'=>$this->security->xss_clean($this->input->post('organization')),	
		   'review'=>$this->security->xss_clean($this->input->post('review')),	   
		   'status'=>$this->security->xss_clean($this->input->post('status'))		      
		);	
		
		$this->db->where('REVIEW_ID', $REVIEWID);
		$this->db->update('reviews', $data); 		
		return true;	
	}
	//Delete Member
	public function delete_review($REVIEWID){
		$this->db->delete('reviews', array('REVIEW_ID' => $REVIEWID)); 	
		return true;  
	}
	//Get Organization Groups
	function list_group_types(){
		$query = $this->db->get('group_type');	
		foreach ($query->result() as $row)
		{
			$data['group_id'] = $row->GROUPID;
			$data['group_name'] = $row->group_name;
			$items[]=$data;			
		}
		return $items;
	}
}