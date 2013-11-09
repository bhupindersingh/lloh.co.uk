<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admins extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("administrators");
    }
 
    public function fetch_admins($limit, $start) {	
		$fromid = intval($this->input->post('fromid'));
		$toid = intval($this->input->post('toid'));			
		$username = $this->input->post('username');
		$email = $this->input->post('email');		
		$addtosql='';
		if($fromid == "1" || ($fromid !="" || $toid>0 || $username!="" || $email!="" ))
		{
			if($fromid > 0){							
				$this->db->where('ADMINID >=', $fromid); 				
			}
			else{				
				$this->db->where('ADMINID >', $fromid); 
			}
			if($toid > 0){				
				$this->db->where('ADMINID <=', $toid); 
				
			}			
			if($username != ""){				
				$this->db->like('username', $username); 
				
			}
			if($email != ""){				
				$this->db->like('email', $email); 
				
			}					
		}
        $this->db->limit($limit, $start);
        $query = $this->db->get("administrators");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
   	}   
   	//Load Admin details
	public function get_admin($ADMINID){
		$query = $this->db->get_where('administrators', array('ADMINID' => $ADMINID));	
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	//Update Member
	public function update_admin(){
		// grab user input
		$USERID=$this->input->get('ADMINID');
		$data = array(		   
		   'email'=>$this->security->xss_clean($this->input->post('email'))		   		   
		);		
		if($this->input->post('password') <> ''):
			$data['password']=md5($this->security->xss_clean($this->input->post('password')));
		endif;
		$this->db->where('ADMINID', $USERID);
		$this->db->update('administrators', $data); 
		return true;	
	}
	//Create admin
	public function create_admin(){
		$data = array(
		   'username' => $this->security->xss_clean($this->input->post('username')),
		   'password' => md5($this->security->xss_clean($this->input->post('password'))),	   
		   'email' => $this->security->xss_clean($this->input->post('email'))	   
		);		
		$this->db->insert('administrators', $data); 
		return true;
	}
	//Delete Member
	public function delete_admin($ADMINID){
		$this->db->delete('administrators', array('ADMINID' => $ADMINID)); 	
		return true;  
	}	
}