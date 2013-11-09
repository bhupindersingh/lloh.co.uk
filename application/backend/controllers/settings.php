<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {	
	function __construct(){
        parent::__construct();
		$this->load->model("Settings_Model");
        $this->load->library("pagination");
		$this->load->helper('ckeditor');
        $this->check_isvalidated();
    }
	public function general()
	{		
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=2;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
        $this->load->view('header',$menu);
		$this->load->view('general_settings',$data);
		$this->load->view('footer');
	}
	public function general_submit(){
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=2;
		$this->form_validation->set_rules('site_name', 'Webite Name', 'required|xss_clean');
		$this->form_validation->set_rules('site_email', 'Website E-Mail', 'required');	
		$this->form_validation->set_rules('site_email_sender', 'E-Mail Sender Name', 'required');	
		$this->form_validation->set_rules('items_per_page', 'Items Per Page', 'required');
		$this->form_validation->set_rules('max_thumb_width', 'Max Thumbnail Width', 'required');
		$this->form_validation->set_rules('max_thumb_height', 'Max Thumbnail Height', 'required');
		if ($this->form_validation->run() == FALSE){			
			$this->load->view('header',$menu);
			$this->load->view('general_settings',$data);
			$this->load->view('footer');
		}
		else{	
			$result=$this->Settings_Model->update_settings();
			if($result){
				$this->session->set_flashdata('message', 'General Settings has been saved successfully.');
				redirect(site_url('/admin/settings/general/'));	
			}
		}
	}
	public function home()
	{		
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=2;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;	
		//Ckeditor's configuration
		$data['ckeditor_1'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'welcome_text',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"500px",	//Setting a custom width
				'height' 	=> 	'250px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);	
        $this->load->view('header',$menu);
		$this->load->view('home_settings',$data);
		$this->load->view('footer');
	}
	public function home_submit(){
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=2;
		$this->form_validation->set_rules('video_link', 'Video Link', 'required|xss_clean');
		$this->form_validation->set_rules('welcome_text', 'Welcome Text', 'required');	
		$this->form_validation->set_rules('latest_request_per_page', 'Latest Request Per Load', 'required');	
		$this->form_validation->set_rules('latest_request_ending_soon', 'Latest Request Ending Soon', 'required');		
		if ($this->form_validation->run() == FALSE){			
			$this->load->view('header',$menu);
			$this->load->view('home_settings',$data);
			$this->load->view('footer');
		}
		else{	
			$result=$this->Settings_Model->update_settings();
			if($result){
				$this->session->set_flashdata('message', 'Home Page Settings has been saved successfully.');
				redirect(site_url('/admin/settings/home/'));	
			}
		}	
	}
	public function meta()
	{		
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=2;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
        $this->load->view('header',$menu);
		$this->load->view('meta_settings',$data);
		$this->load->view('footer');
	}
	public function meta_submit(){
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=2;
		$this->form_validation->set_rules('metadescription', 'Meta Description', 'required|xss_clean');
		$this->form_validation->set_rules('metakeywords', 'Meta Keywords', 'required|xss_clean');		
		if ($this->form_validation->run() == FALSE){			
			$this->load->view('header',$menu);
			$this->load->view('meta_settings',$data);
			$this->load->view('footer');
		}
		else{	
			$result=$this->Settings_Model->update_settings();
			if($result){
				$this->session->set_flashdata('message', 'Meta Settings has been saved successfully.');
				redirect(site_url('/admin/settings/meta/'));	
			}
		}
	}
	public function slider()
	{		
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=2;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
        $this->load->view('header',$menu);
		$this->load->view('slider_settings',$data);
		$this->load->view('footer');
	}
	public function slider_submit(){		
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=2;		
		$result=$this->Settings_Model->update_settings();
		if($result){
			$this->session->set_flashdata('message', 'Slider Settings has been saved successfully.');
			redirect(site_url('/admin/settings/slider/'));	
		}		
	}
	public function email()
	{		
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=2;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
        $this->load->view('header',$menu);
		$this->load->view('email_settings',$data);
		$this->load->view('footer');
	}
	public function email_submit(){
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=2;
		$this->form_validation->set_rules('registration_email', 'Registration Email', 'required|xss_clean');
		$this->form_validation->set_rules('account_approval', 'Account Approval', 'required|xss_clean');		
		$this->form_validation->set_rules('forgot_password', 'Forgot Password', 'required|xss_clean');		
		$this->form_validation->set_rules('write_a_review', 'Write A Rewiew', 'required|xss_clean');		
		
		if ($this->form_validation->run() == FALSE){			
			$this->load->view('header',$menu);
			$this->load->view('email_settings',$data);
			$this->load->view('footer');
		}
		else{	
			$result=$this->Settings_Model->update_settings();
			if($result){
				$this->session->set_flashdata('message', 'Meta Settings has been saved successfully.');
				redirect(site_url('/admin/settings/email/'));	
			}
		}	
	}
	public function static_pages()
	{		
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=2;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
        
		//Ckeditor's configuration
		$data['ckeditor_1'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'about_value',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);	
		//Ckeditor's configuration
		$data['ckeditor_2'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'contact_value',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);	
		//Ckeditor's configuration
		$data['ckeditor_3'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'privacy_value',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);	
		//Ckeditor's configuration
		$data['ckeditor_4'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'terms_value',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);		
 
		$this->load->view('header',$menu);
		$this->load->view('static_settings',$data);
		$this->load->view('footer');
	}
	public function submit_pages(){
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=2;
		
		$result=$this->Settings_Model->update_static_pages();
		if($result){
			$this->session->set_flashdata('message', 'Page has been saved successfully.');
			if($this->input->post('submitform1') == "1"){
				redirect(site_url('/admin/cms_pages/about_us/'));
			}
			if($this->input->post('submitform2') == "1"){
				redirect(site_url('/admin/cms_pages/contact_us/'));
			}
			if($this->input->post('submitform3') == "1"){
				redirect(site_url('/admin/cms_pages/privacy_policy/'));
			}
			if($this->input->post('submitform4') == "1"){
				redirect(site_url('/admin/cms_pages/terms_conditions/'));
			}
		}
	}
	public function upload_image(){
		$data['message']='';
		$data['error']='';
		$this->load->view('upload_form',$data);
	}
	public function do_upload(){
		$this->load->library('upload');
        $this->load->library('image_lib');
		if (isset($_FILES['filePhoto']) && is_uploaded_file($_FILES['filePhoto']['tmp_name'])) {
			$upload_conf = array(
			'upload_path'   => FCPATH.'../uploads/images/',
			'allowed_types' => 'gif|jpg|png',
			'max_size'      => '30000',
			);
	
			$this->upload->initialize( $upload_conf );
			
			// Put eah errors and upload data to an array
			$error = array();
			$success = array();
			
			if ( ! $this->upload->do_upload('filePhoto'))
			{
				// if upload fail, grab error 
				$error['upload'][] = $this->upload->display_errors();
			}
			else
			{
				// otherwise, put the upload datas here.			
				$upload_data = $this->upload->data();				
				$success[] = $upload_data;					
			}				
			// see what we get
			if(count($error) > 0)
			{
				$data['message'] = '';	
				$data['error'] = "<p>".$error['upload'][0]."</p>";									
				$this->load->view('upload_form',$data);					
			}
			else
			{
				$data['error'] ='';
				$data_['success'] = $upload_data;	
				$data['message']=$data_['success']['file_name'];	
				$this->load->view('upload_form',$data);				
			}		
			$this->upload->initialize( $upload_conf );				
		}
		else{
			$data['message'] = '';	
			$data['error'] = '<p>Please upload a slider image.</p>';									
			$this->load->view('upload_form',$data);		
		}
	}
	private function check_isvalidated(){ 
        if(!$this->session->userdata('isadmin')){
            redirect('admin/login');
        }
    }
}