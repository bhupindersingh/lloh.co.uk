<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member_model extends CI_Model{
	function __construct(){
		parent::__construct();		
	}	
	public function update_user($image){		
		// grab user input
		$date=$this->security->xss_clean($this->input->post('txtDate'));
		$month=$this->security->xss_clean($this->input->post('txtMonth'));
		$year=$this->security->xss_clean($this->input->post('txtYear'));
		$birthDay=new DateTime($month.'/'.$date.'/'.$year);
		$birthDay=date_format($birthDay,"Y-m-d");
		$data = array(
		   'gender' => $this->security->xss_clean($this->input->post('selGender')),
		   'firstname' => $this->security->xss_clean($this->input->post('txtFirstname')),
		   'lastname' => $this->security->xss_clean($this->input->post('txtLastname')),
		   'organization_name'=>$this->security->xss_clean($this->input->post('txtOrganization')),
		   'group_type'=>$this->security->xss_clean($this->input->post('selGroup')),
		   'email'=>$this->security->xss_clean($this->input->post('txtEmail')),		   
		   'birthday'=>$birthDay,
		   'address'=>$this->security->xss_clean($this->input->post('txtAddress')),
		   'city'=>$this->security->xss_clean($this->input->post('txtCity')),
		   'postal_code'=>$this->security->xss_clean($this->input->post('txtPostalcode')),
		   'addtime'=>date("Y-m-d h:i:s")
		);
		if($this->input->post('txtPassword') <> '')
			$data['password']=sha1($this->security->xss_clean($this->input->post('txtPassword')));
		if(is_array($image['success']))
			$data['photo']=$image['success']['file_name'];
			
		$this->db->where('USERID', $this->session->userdata('userid'));
		$this->db->update('members', $data);
		return true;
	}
	public function get_member(){
		$query = $this->db->get_where('members', array('USERID' => $this->session->userdata('userid')));	
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	public function check_username(){
		$username=$this->security->xss_clean($this->input->get('regUsername'));
		$this->db->where("username",$username);
		$query=$this->db->get("members");
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
}