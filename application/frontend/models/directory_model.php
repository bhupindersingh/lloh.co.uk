<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directory_model extends CI_Model{
	function __construct(){
		parent::__construct();		
	}	
	public function record_count() {
		$organization_group = $this->input->post('selGroup');
		$organization_name = $this->input->post('organization_name');
		if($organization_group!='' || $organization_name!=""){
			if($organization_group != ""){				
				$this->db->like('organization_group', $organization_group); 				
			}	
			if($organization_name != "" && $organization_name != "Organization Name"){				
				$this->db->like('organization_name', $organization_name);				
			}
		}
		$this->db->where('status', '1');
        return $this->db->count_all_results("directory");
    }
	
	public function list_organizations($limit, $start){
		$organization_group = $this->input->post('selGroup');
		$organization_name = $this->input->post('organization_name');
		if($organization_group!='' || $organization_name!=""){
			if($organization_group != ""){				
				$this->db->like('organization_group', $organization_group); 				
			}	
			if($organization_name != "" && $organization_name != "Organization Name"){				
				$this->db->like('organization_name', $organization_name);				
			}
		}
		$this->db->limit($limit, $start);
		$this->db->where('status', '1');
		$this->db->order_by("DIRECTORY_ID", "desc"); 
        $query = $this->db->get("directory");
 		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
	}	
	
	//get organization details
	public function get_organization_detail(){
		$directory_id=$this->input->get('ID');
		$query = $this->db->get_where('directory', array('DIRECTORY_ID' => $directory_id));	
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;	
	}
	public function submit_details($image){
		$data = array(
		   'organization_name' => $this->security->xss_clean($this->input->post('txtOrganizationName')),
		   'address' => $this->security->xss_clean($this->input->post('txtAddress')),
		   'city' => $this->security->xss_clean($this->input->post('txtCity')),
		   'postalcode'=>$this->security->xss_clean($this->input->post('txtPostalCode')),
		   'organization_group'=>$this->security->xss_clean($this->input->post('selGroup')),
		   'telephone'=>$this->security->xss_clean($this->input->post('txtTelephone')),		  
		   'email'=>$this->security->xss_clean($this->input->post('txtEmail')),
		   'website'=>$this->security->xss_clean($this->input->post('txtWebsite')),		   
		   'date_posted'=>date("Y-m-d H:i:s")
		);		
		if(is_array($image['success']))
			$data['organization_logo']=$image['success']['file_name'];
		$this->db->insert('directory', $data);
		return true;
	}
}