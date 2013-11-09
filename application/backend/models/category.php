<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("group_type");
    }
 
    public function fetch_categories($limit, $start) {	
		$fromid = intval($this->input->post('fromid'));
		$toid = intval($this->input->post('toid'));	
		$organization = $this->input->post('organization');
		
		$addtosql='';
		if($fromid == "1" || ($fromid !="" || $toid>0 || $organization!=''))
		{
			if($fromid > 0){							
				$this->db->where('GROUPID >=', $fromid); 				
			}
			else{				
				$this->db->where('GROUPID >', $fromid); 
			}
			if($toid > 0){				
				$this->db->where('GROUPID <=', $toid); 
				
			}			
			if($organization != ""){				
				$this->db->like('group_name', $organization); 
				
			}											
		}
        $this->db->limit($limit, $start);		
        $query = $this->db->get("group_type");
 		//echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
   	}   
   	public function update_status($staus,$GROUPID){		
		$data = array(
               'status' => $staus               
            );
		$this->db->where('GROUPID', $GROUPID);
		$this->db->update('group_type', $data); 
		return true;   
	}
	public function get_category($GROUPID){
		$query = $this->db->get_where('group_type', array('GROUPID' => $GROUPID));	
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	//Create Categiry
	public function create_category(){
		$data = array(		   
		   'group_name' => $this->security->xss_clean($this->input->post('organization'))		   	      
		);			
		
		$this->db->insert('group_type', $data); 		
		return true;	
	}
	//Update Member
	public function update_category(){
		// grab user input
		$GROUPID=$this->input->get('GROUPID');
		$data = array(		   
		   'group_name' => $this->security->xss_clean($this->input->post('organization'))		   	      
		);	
		
		$this->db->where('GROUPID', $GROUPID);
		$this->db->update('group_type', $data); 		
		return true;	
	}
	//Delete Member
	public function delete_category($GROUPID){
		$this->db->delete('group_type', array('GROUPID' => $GROUPID)); 	
		return true;  
	}	
}