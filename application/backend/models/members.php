<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Members extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count() {
        return $this->db->count_all("members");
    }
 
    public function fetch_members($limit, $start) {	
		$fromid = intval($this->input->post('fromid'));
		$toid = intval($this->input->post('toid'));	
		$organization = $this->input->post('organization');
		$username = $this->input->post('username');
		$email = $this->input->post('email');		
		$status = $this->input->post('status');
		$addtosql='';
		if($fromid == "1" || ($fromid !="" || $toid>0 || $organization!='' || $username!="" || $email!="" || $status!=""))
		{
			if($fromid > 0){							
				$this->db->where('USERID >=', $fromid); 				
			}
			else{				
				$this->db->where('USERID >', $fromid); 
			}
			if($toid > 0){				
				$this->db->where('USERID <=', $toid); 
				
			}
			if($status != ""){				
				$this->db->where('status',$status);
				
			}
			if($organization != ""){				
				$this->db->like('organization_name', $organization); 
				
			}	
			if($username != ""){				
				$this->db->like('username', $username); 
				
			}
			if($email != ""){				
				$this->db->like('email', $email); 
				
			}					
		}
        $this->db->limit($limit, $start);
        $query = $this->db->get("members");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
   	}   
   	public function update_status($staus,$userid){		
		$data = array(
               'status' => $staus               
            );
		$this->db->where('USERID', $userid);
		$this->db->update('members', $data); 
		return true;   
	}
	public function get_member($USERID){
		$query = $this->db->get_where('members', array('USERID' => $USERID));	
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	//Update Member
	public function update_member(){
		$this->load->library('mailer'); 
		// grab user input
		$USERID=$this->input->get('USERID');
		$data = array(
		   'gender' => $this->security->xss_clean($this->input->post('gender')),
		   'firstname' => $this->security->xss_clean($this->input->post('firstname')),
		   'lastname' => $this->security->xss_clean($this->input->post('lastname')),
		   'organization_name'=>$this->security->xss_clean($this->input->post('organization_name')),
		   'group_type'=>$this->security->xss_clean($this->input->post('group_type')),
		   'email'=>$this->security->xss_clean($this->input->post('email')),
		   'username'=>$this->security->xss_clean($this->input->post('username')),	   
		   'birthday'=>$this->security->xss_clean($this->input->post('dob')),
		   'address'=>$this->security->xss_clean($this->input->post('address')),
		   'city'=>$this->security->xss_clean($this->input->post('city')),
		   'postal_code'=>$this->security->xss_clean($this->input->post('postalcode')),
		   'status'=>$this->security->xss_clean($this->input->post('status')),
		   'directory_listing_approval' => $this->security->xss_clean($this->input->post('directory_listing_approval')),
		   'submit_request_approval' => $this->security->xss_clean($this->input->post('submit_request_approval'))		   
		);		
		if($this->input->post('newpass2') <> ''):
			$data['password']=sha1($this->security->xss_clean($this->input->post('newpass2')));
		endif;
		$this->db->where('USERID', $USERID);
		$this->db->update('members', $data); 
		if($this->input->post('directory_listing_approval')==1 || $this->input->post('submit_request_approval')==1){
			$siteURL=str_replace("admin/","",base_url());
			$this->db->where('USERID',$USERID);			
			$query = $this->db->get("members");
			$row = $query->result();
			$userHTML="<p><img src='".$siteURL."uploads/images/email-logo-top.png' border='0'/></p>".get_setting('account_approval')."<p><img src='".$siteURL."uploads/images/email-logo-bottom.png' border='0'/></p>";
			$userHTML=str_replace("{FIRSTNAME}",$row[0]->firstname,$userHTML);
			$userHTML=str_replace("{LASTNAME}",$row[0]->lastname,$userHTML);
			$userHTML=str_replace("{USERNAME}",$row[0]->username,$userHTML);
			$userHTML=str_replace("{WEBSITE}",$siteURL,$userHTML);
			$this->mailer->send_email($row[0]->email,get_setting('site_email_sender'),get_setting('site_email'),"Your account has been approved",$userHTML);	
		}
		
		return true;	
	}
	//Delete Member
	public function delete_member($USERID){
		$this->db->delete('members', array('USERID' => $USERID)); 	
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