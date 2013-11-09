<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donate extends CI_Controller {

	function  __construct()  {
        parent::__construct();		
		$this->load->library('common');
		$this->load->library('recaptcha');
		$this->load->model('donate_model');
    }
	public function index()
	{
		//Checks to see if the user is logged in
        if ($this->session->userdata('logged_in') == false)
        {			
			$data['error']='';
			$data['mainmenu']='';
			$data['donation_form_errors']='';
			$images=$this->common->get_slider_images();		
			$data['slider_images']=$images;	
			$data['title']='Donate for a request | '.get_setting('site_name');
			$data['meta_desc']=get_setting('metadescription');
			$data['meta_keyword']=get_setting('metakeywords');			
			//Store the captcha HTML for correct MVC pattern use.
			$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();	
			$data['qty']=$this->donate_model->list_qty();		
			$this->load->theme('poverty');
			$this->load->view('donate',$data);
		}		
	}
	
	 public function submit() {
		$this->load->library('form_validation');				
		$this->form_validation->set_rules('txtFirstname', 'First Name', 'required');
		$this->form_validation->set_rules('txtLastname', 'Last Name', 'required');		
		$this->form_validation->set_rules('txtEmail', 'Email', 'required|valid_email');				

		if ($this->form_validation->run() == FALSE)
		{			      
			$this->show_info();
		}
		else
		{			
			//Call to recaptcha to get the data validation set within the class. 
			$this->recaptcha->recaptcha_check_answer();	
			if($this->recaptcha->getIsValid()){					
				$result = $this->donate_model->make_donation();	
				if($result){
					redirect('/donate/thanks_donation/');	
				}
				else{
					$error='<p>All post quantities get recieved. You can denote to other post request on website.</p>';
					$this->show_info($error);	
				}
			}
			else{ 
				if(!$this->recaptcha->getIsValid()) {
					$error='<p>Code entered is invalid.</p>';
					$this->show_info($error);	
				}
				else{
					redirect('donate');
				}	
			}
		}
    }//.submit()
	private function show_info($error=''){
		$data['error']='';
		$data['mainmenu']='';
		$data['donation_form_errors']='';
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Donate for a request | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');			
		//Store the captcha HTML for correct MVC pattern use.
		$data['donation_form_errors'] = validation_errors();
		$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();		
		if($error<>''): 
			$data['donation_form_errors']=$error;
		endif;		
		$data['qty']=$this->donate_model->list_qty();	
		$this->load->theme('poverty');
		$this->load->view('donate',$data);
	}
	public function thanks_donation(){
		$data['error']='';
		$data['mainmenu']='';		
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Thank you for your donation | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');		
		$this->load->theme('poverty');
		$this->load->view('thanks_donation',$data);	
	}	
	public function schedule(){
		 $this->donate_model->run_schedule();
	}
}