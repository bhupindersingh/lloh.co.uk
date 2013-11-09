<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Donate_model extends CI_Model{
	function __construct(){
		parent::__construct();	
		$this->load->library('mailer');	
	}	
	public function make_donation(){	
		if($this->check_post_donation($this->input->get('POSTID'))){
			$data = array(
			   'POST_ID' => $this->security->xss_clean($this->input->get('POSTID')),
			   'POST_MEMBER_ID' => $this->get_member_id($this->input->get('POSTID')),
			   'first_name' => $this->security->xss_clean($this->input->post('txtFirstname')),
			   'last_name'=>$this->security->xss_clean($this->input->post('txtLastname')),
			   'telephone'=>$this->security->xss_clean($this->input->post('txtTelephone')),
			   'mobile'=>$this->security->xss_clean($this->input->post('txtMobile')),
			   'email'=>$this->security->xss_clean($this->input->post('txtEmail')),	
			   'quantity_donated'=>$this->security->xss_clean($this->input->post('selQty')),		   
			   'date_posted'=>date("Y-m-d H:i:s")
			);
			
			$this->db->insert('donations', $data);
			$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			
			//Admin Email
			$html="<p><img src='".base_url()."uploads/images/email-logo-top.png' border='0'/></p>
<p>Dear Admin,<br/><br/>A user had donate for a request. Please click <a href='".site_url('/requests_detail/')."?POSTID=".$this->input->get('POSTID')."' target='_blank'>here</a> to view the request page where he had submitted the donation.<br/><br/>Please find the details of the user below:</p>
<p>Name: ".$this->input->post('txtFirstname').' '.$this->input->post('txtLastname')."</p> 
<p>Telephone: ".$this->input->post('txtTelephone')."</p>
<p>Mobile: ".$this->input->post('txtMobile')."</p>
<p>Email Address: ".$this->input->post('txtEmail')."<br/>
  <br/>Regards,<br/>Leicester League of Heroes<br/>
</p>
<p><img src='".base_url()."uploads/images/email-logo-bottom.png' border='0'/></p>";
			$this->mailer->send_email(get_setting('site_email'),get_setting('site_email_sender'),"noreply@povertyproject.com","A donation has been recieved",$html);
			
			//Post Request User Email	
			$row_member=$this->get_member_details($this->input->get('POSTID'));		
			$userHTML="<p><img src='".base_url()."uploads/images/email-logo-top.png' border='0'/></p>
<p>Dear ".$row_member[0]->firstname.' '.$row_member[0]->lastname.",<br/><br/>
A user had donated for your request.Please click <a href='".site_url('/requests_detail/')."?POSTID=".$this->input->get('POSTID')."' target='_blank'>here</a> to view the request page where he had submitted the donation.<br/><br/>Please find the details of the user below:</p>
<p>Name: ".$this->input->post('txtFirstname').' '.$this->input->post('txtLastname')."</p> 
<p>Telephone: ".$this->input->post('txtTelephone')."</p>
<p>Mobile: ".$this->input->post('txtMobile')."</p>
<p>Email Address: ".$this->input->post('txtEmail')."<br/>
<br/>Regards,<br/>Leicester League of Heroes<br/>
</p>
<p><img src='".base_url()."uploads/images/email-logo-bottom.png' border='0'/></p>";			
			$this->mailer->send_email($row_member[0]->email,get_setting('site_email_sender'),get_setting('site_email'),"A donation has been recieved towards your request",$userHTML);
			
			// Send email to donar user
			$userHTML="<p><img src='".base_url()."uploads/images/email-logo-top.png' border='0'/></p>";
			$userHTML="<h1>Thank you for your donation!</h2><br/>
               <p>Dear <strong>".$this->input->post('txtFirstname').' '.$this->input->post('txtLastname')."</strong>,</p>
<p>Thank you for making a donation. The organisation dealing with the request you have responded to will contact you asap to arrange a collection / delivery.</p>
<p>We thank you for helping us fight local poverty!</p>
<p>Please share this site with your friends and family so we can help identify more people who might need help, and to help recruit more people to fight poverty together. </p>
<p>Yours faithfully,<br>
</p>
<p>The Leicester League of Heroes </p><p><img src='".base_url()."uploads/images/email-logo-bottom.png' border='0'/></p>";
			$this->mailer->send_email($this->input->post('txtEmail'),get_setting('site_email_sender'),get_setting('site_email'),"Thank you for your donation!",$userHTML);
			if($this->check_post_donation($this->input->get('POSTID'))==false){
				//Update post a request status
				$this->db->where('POST_ID', $this->input->get('POSTID'));
				$this->db->update('post_a_request', array('status'=>'expired'));
			}
			$data_session=array('donar_name'=> $this->input->post('txtFirstname').' '.$this->input->post('txtLastname'));		
			$this->session->set_userdata($data_session);
		}
		else{
			return false;	
		}
		return true;
	}
	public function list_qty(){
		$this->db->where('POST_ID',$this->input->get('POSTID'));			
		$query = $this->db->get("post_a_request");
		$row = $query->result();
		return $row[0]->quantity_required;	
	}
	public function run_schedule(){
		$this->db->select('post_a_request.POST_ID,post_a_request.status');
		$this->db->from('post_a_request');			
		$today=date("Y-m-d H:i:s");
		$this->db->where("DATEDIFF(`deadline`,'$today') < ",'1');	
		$this->db->where("post_a_request.status = ",'active');				
		$query = $this->db->get();		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {				
                //Update post a request status to expired
				$this->db->where('POST_ID', $row->POST_ID);
				$this->db->update('post_a_request', array('status'=>'expired'));
            }
            return true;
        }	
		
		// Delete past posts whose diff is of 2 months
		$this->db->select('post_a_request.POST_ID,post_a_request.status');
		$this->db->from('post_a_request');			
		$today=date("Y-m-d H:i:s");
		$this->db->where("DATEDIFF(`deadline`,'$today') <= ",'-60');	
		$this->db->where("post_a_request.status = ",'expired');				
		$query = $this->db->get();		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {				
                //Delete post from database				
				$this->db->delete('post_a_request', array('POST_ID'=>$row->POST_ID));
				$this->db->delete('donations', array('POST_ID'=>$row->POST_ID));
            }
            return true;
        }	
			
        return false;
	}
	private function check_post_donation($post_id){
		$this->db->where('POST_ID',$post_id);			
		$query = $this->db->get("post_a_request");
		$row = $query->result();
		$cnt_req=$row->quantity_required;
		
		$this->db->select_sum('quantity_donated');
		$this->db->where('POST_ID',$post_id);					
		$query = $this->db->get("donations");
		$row = $query->result();
		$cnt_donated=$row->quantity_donated;
		if ($cnt_donated <= $cnt_req) {
			return true;	
		}
		else{
			return false;	
		}			
	}
	private function get_member_id($post_id){
		$this->db->where('POST_ID',$post_id);			
		$query = $this->db->get("post_a_request");
		$row = $query->result();
		return $row[0]->user_id;
	}
	private function get_member_details($post_id){
		$this->db->select('post_a_request.user_id,members.*');
		$this->db->from('post_a_request');			
		$this->db->join('members', 'members.USERID = post_a_request.user_id');		
		$this->db->where("post_a_request.POST_ID =",$post_id);		
		$query = $this->db->get();	
		$row = $query->result();
		return $row;	
	}
}