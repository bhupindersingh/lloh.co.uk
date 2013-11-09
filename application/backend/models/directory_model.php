<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Directory_Model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("directory");
    }
 
    public function fetch_directory($limit, $start) {	
		$fromid = intval($this->input->post('fromid'));
		$toid = intval($this->input->post('toid'));	
		$group_type = $this->input->post('group_type');
		$organization = $this->input->post('organization');
		$email = $this->input->post('email');		
		$status = $this->input->post('status');
		$addtosql='';
		if($fromid == "1" || ($fromid !="" || $toid>0 || $group_type!='' || $organization!="" || $email!="" || $status!=""))
		{
			if($fromid > 0){							
				$this->db->where('DIRECTORY_ID >=', $fromid); 				
			}
			else{				
				$this->db->where('DIRECTORY_ID >', $fromid); 
			}
			if($toid > 0){				
				$this->db->where('DIRECTORY_ID <=', $toid); 
				
			}
			if($status != ""){				
				$this->db->where('status', $status);
				
			}
			if($group_type != ""){				
				$this->db->like('group_type.group_name', $group_type); 
				
			}	
			if($organization != ""){				
				$this->db->like('organization_name', $organization); 
				
			}
			if($email != ""){				
				$this->db->like('email', $email); 
				
			}					
		}
        
		$this->db->limit($limit, $start);
		$this->db->select('directory.*, group_type.group_name');
		$this->db->from('directory');
		$this->db->join('group_type', 'directory.organization_group = group_type.GROUPID');
        $query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
   	}   
   	public function update_status($staus,$DIRECTORYID){		
		$data = array(
               'status' => $staus               
            );
		$this->db->where('DIRECTORY_ID', $DIRECTORYID);
		$this->db->update('directory', $data); 
		return true;   
	}
	public function get_directory($DIRECTORYID){
		$query = $this->db->get_where('directory', array('DIRECTORY_ID' => $DIRECTORYID));	
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	//Add Organization
	public function create_organization($image){
		$data = array(
		   'organization_group' => $this->security->xss_clean($this->input->post('group_type')),
		   'organization_name' => $this->security->xss_clean($this->input->post('organization_name')),	   
		   'address' => $this->security->xss_clean($this->input->post('address')),
		   'city' => $this->security->xss_clean($this->input->post('city')),
		   'postalcode' => $this->security->xss_clean($this->input->post('postal_code')),
		   'telephone' => $this->security->xss_clean($this->input->post('telephone')),
		   'email' => $this->security->xss_clean($this->input->post('email')),
		   'website' => $this->security->xss_clean($this->input->post('website')),
		   'status' => $this->security->xss_clean($this->input->post('status')),
		   'date_posted' => date("Y-m-d h:i:s")
		);	
		if(is_array($image['success']))
			$data['organization_logo']=$image['success']['file_name'];	
		$this->db->insert('directory', $data); 
		return true;	
	}
	//Update Directory
	public function update_directory($image){
		// grab user input
		$DIRECTORYID=$this->input->get('DIRECTORYID');
		$data = array(
		   'organization_group' => $this->security->xss_clean($this->input->post('group_type')),
		   'organization_name' => $this->security->xss_clean($this->input->post('organization_name')),	   
		   'address' => $this->security->xss_clean($this->input->post('address')),
		   'city' => $this->security->xss_clean($this->input->post('city')),
		   'postalcode' => $this->security->xss_clean($this->input->post('postal_code')),
		   'telephone' => $this->security->xss_clean($this->input->post('telephone')),
		   'email' => $this->security->xss_clean($this->input->post('email')),
		   'website' => $this->security->xss_clean($this->input->post('website')),
		   'status' => $this->security->xss_clean($this->input->post('status'))		   
		);	
		if(is_array($image['success']))
			$data['organization_logo']=$image['success']['file_name'];
		$this->db->where('DIRECTORY_ID', $DIRECTORYID);
		$this->db->update('directory', $data); 
		return true;	
	}
	//Delete Directory
	public function delete_directory($DIRECTORYID){
		$this->db->delete('directory', array('DIRECTORY_ID' => $DIRECTORYID)); 	
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