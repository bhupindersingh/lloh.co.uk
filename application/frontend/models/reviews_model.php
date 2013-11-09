<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reviews_model extends CI_Model{
	function __construct(){
		parent::__construct();		
		$this->load->library('common'); 
		$this->load->library('mailer'); 
	}	
	public function record_count() {
		$this->db->where('status', 'published');
        return $this->db->count_all_results("reviews");
    }
	public function postreview(){	
		//Admin Email
		$html="<p><img src='".base_url()."uploads/images/email-logo-top.png' border='0'/></p>Dear Admin,<br/><br/>Leicester League of Heroes has received a testimonial. Please click <a href='".site_url('/admin/manage_comments/')."' target='_blank'>here</a> to review the testimonial.<br/><br/>Regards,<br/>Leicester League of Heroes<br/><p><img src='".base_url()."uploads/images/email-logo-bottom.png' border='0'/></p>";
		$this->mailer->send_email(get_setting('site_email'),get_setting('site_email_sender'),"noreply@povertyproject.com","A new testimonial has been recieved",$html);
		
		//User Email
		if($this->session->userdata('userid')<>'' || $this->session->userdata('userid') <> 0){
			$this->db->where('USERID',$this->session->userdata('userid'));			
			$query = $this->db->get("members");
			$row = $query->result();
			$userHTML="<p><img src='".base_url()."uploads/images/email-logo-top.png' border='0'/></p>".get_setting('write_a_review')."<p><img src='".base_url()."uploads/images/email-logo-bottom.png' border='0'/></p>";
			$userHTML=str_replace("{FIRSTNAME}",$row[0]->firstname,$userHTML);
			$userHTML=str_replace("{LASTNAME}",$row[0]->lastname,$userHTML);
			$userHTML=str_replace("{USERNAME}",$row[0]->username,$userHTML);
			$userHTML=str_replace("{WEBSITE}",base_url(),$userHTML);
			$this->mailer->send_email($row[0]->email,get_setting('site_email_sender'),get_setting('site_email'),"Thank you for your testimonial!",$userHTML);
		}
		// grab user input		
		$data = array(
		   'name' => $this->security->xss_clean($this->input->post('txtName')),		   
		   'organization'=>$this->security->xss_clean($this->input->post('selGroup')),
		   'review'=>$this->security->xss_clean($this->input->post('txtFeedback')),
		   'status'=>'draft',	   
		   'date_posted'=>date("Y-m-d h:i:s")
		);	
		$data_session=array('review_posted_username'=> $this->input->post('txtName'));		
		$this->session->set_userdata($data_session);			
		$this->db->insert('reviews', $data);
		return true;
	}
	public function list_reviews($limit, $start){
		$this->db->limit($limit, $start);
		$this->db->where('status', 'published');
		$this->db->order_by("REVIEW_ID", "desc"); 
        $query = $this->db->get("reviews");
 		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
	}	
}