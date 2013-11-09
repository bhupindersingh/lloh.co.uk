<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
	function __construct(){
		parent::__construct();	
		$this->load->library('mailer');	
	}	
	public function register_user($image){		
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
		   'username'=>$this->security->xss_clean($this->input->post('regUsername')),
		   'password'=>sha1($this->security->xss_clean($this->input->post('regPassword'))),
		   'birthday'=>$birthDay,
		   'address'=>$this->security->xss_clean($this->input->post('txtAddress')),
		   'city'=>$this->security->xss_clean($this->input->post('txtCity')),
		   'postal_code'=>$this->security->xss_clean($this->input->post('txtPostalcode')),
		   'addtime'=>date("Y-m-d h:i:s")
		);
		if(is_array($image['success']))
			$data['photo']=$image['success']['file_name'];
		
		$this->db->insert('members', $data);
		//Admin Email
		$html="<p><img src='".base_url()."uploads/images/email-logo-top.png' border='0'/></p>Dear Admin,<br/><br/>A new account awaits verification. Please click <a href='".site_url('/admin/manage_members/')."' target='_blank'>here</a> to log into admin settings to verify the group/organisation.<br/><br/>Regards,<br/>Leicester League of Heroes<br/><p><img src='".base_url()."uploads/images/email-logo-bottom.png' border='0'/></p>";
		$this->mailer->send_email(get_setting('site_email'),get_setting('site_email_sender'),"noreply@povertyproject.com","A new account awaits verification",$html);
		//User Email
		$this->db->where('USERID',$insert_id);			
		$query = $this->db->get("members");
		$row = $query->result();
		$userHTML="<p><img src='".base_url()."uploads/images/email-logo-top.png' border='0'/></p>".get_setting('registration_email')."<p><img src='".base_url()."uploads/images/email-logo-bottom.png' border='0'/></p>";
		$userHTML=str_replace("{FIRSTNAME}",$row[0]->firstname,$userHTML);
		$userHTML=str_replace("{LASTNAME}",$row[0]->lastname,$userHTML);
		$userHTML=str_replace("{USERNAME}",$row[0]->username,$userHTML);
		$userHTML=str_replace("{WEBSITE}",base_url(),$userHTML);
		$this->mailer->send_email($row[0]->email,get_setting('site_email_sender'),get_setting('site_email'),"Thank you for registration!",$userHTML);
		return true;
	}
	public function forgot_password(){
		// grab user input
		$email = $this->security->xss_clean($this->input->post('txtForgotEmail'));	
		// Prep the query		
		$this->db->where('email', $email);		
		// Run the query
		$query = $this->db->get('members');
		//echo $str = $this->db->last_query();exit;
		// Let's check if there are any results
		if($query->num_rows() == 1){
			$random_str=$this->getToken(6);
			$row=$query->result();
			$userHTML="<p><img src='".base_url()."uploads/images/email-logo-top.png' border='0'/></p>".get_setting('forgot_password')."<p><img src='".base_url()."uploads/images/email-logo-bottom.png' border='0'/></p>";
			$userHTML=str_replace("{FIRSTNAME}",$row[0]->firstname,$userHTML);
			$userHTML=str_replace("{LASTNAME}",$row[0]->lastname,$userHTML);
			$userHTML=str_replace("{USERNAME}",$row[0]->username,$userHTML);
			$userHTML=str_replace("{PASSWORD}",$random_str,$userHTML);
			$userHTML=str_replace("{WEBSITE}",base_url(),$userHTML);
			$this->mailer->send_email($row[0]->email,get_setting('site_email_sender'),get_setting('site_email'),"Your account password has been changed!",$userHTML);			
			$user_data=array('password'=>sha1($random_str));			
			$this->db->where('email', $email);
			$this->db->update('members', $user_data);
			return true;
		}
		return false;
	}
	public function validate(){
		// grab user input
		$username = $this->security->xss_clean($this->input->post('txtUsername'));
		$password = $this->security->xss_clean($this->input->post('txtPassword'));
		// Prep the query
		$this->db->where('username', $username);
		$this->db->where('password', sha1($password));
		$this->db->where('status', 1);
		// Run the query
		$query = $this->db->get('members');
		//echo $str = $this->db->last_query();exit;
		// Let's check if there are any results
		if($query->num_rows() == 1)
		{
			// If there is a user, then create session data
			$row = $query->row();
			$data = array(
					'userid' => $row->USERID,
					'email' => $row->email,					
					'username' => $row->username,
					'firstname'=>$row->firstname,
					'lastname'=>$row->lastname,
					'dir_approval'=>$row->directory_listing_approval,
					'post_request_approval'=>$row->submit_request_approval,
					'validated' => true,
					'member'=> true
					);					
			$this->session->set_userdata($data);
			$this->db->where('USERID',$row->USERID);
			$this->db->update('members', array('lastlogin'=>date("Y-m-d H:i:s")));
			return true;
		}
		// If the previous process did not validate
		// then return false.
		return false;
	}
	private function getToken($length){
		$token = "";
		$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet.= "0123456789";
		for($i=0;$i<$length;$i++){
			$token .= $codeAlphabet[rand(0, strlen($codeAlphabet) - 1)];
		}
		return $token;
	}	
}