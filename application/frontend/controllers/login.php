<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function  __construct()  {
        parent::__construct();
		$this->load->library('common');    
		$this->load->library('recaptcha');	  
		$this->load->library('form_validation');
		$this->check_isvalidated();
    }	
	public function index()
	{
		$data['error']=$data['message']=$data['mainmenu']=$data['forgot_form_errors']='';
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Login / Register an account | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');	
			
		if($this->session->flashdata('error')<>''):
			$data['error']=$this->session->flashdata('error');
		endif;
		//Checks to see if the user is logged in
        if ($this->session->userdata('logged_in') == false)
        {			      
			$data['organisation_groups']=$this->common->list_group_types();							
			//Store the captcha HTML for correct MVC pattern use.
			$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
			$this->load->theme('poverty');
			$this->load->view('login',$data);
		}
	}
	public function register(){		
		$data['register_form_errors']='';
		$this->load->library('upload');
        $this->load->library('image_lib');		
		$this->form_validation->set_rules('txtFirstname', 'First Name', 'required');
		$this->form_validation->set_rules('txtLastname', 'Last Name', 'required');
		$this->form_validation->set_rules('txtOrganization', 'Organization', 'required');
		$this->form_validation->set_rules('txtEmail', 'Email', 'required');
		$this->form_validation->set_rules('regUsername', 'Username', 'required|min_length[4]|max_length[12]|is_unique[members.username]');
		$this->form_validation->set_rules('regPassword', 'Password', 'required');
		$this->form_validation->set_rules('regPassword2', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('chkTerms', 'Terms & Conditions', 'required');		
		
		if($this->form_validation->run())
		{			           
			//Call to recaptcha to get the data validation set within the class. 
			$this->recaptcha->recaptcha_check_answer();	
			if($this->recaptcha->getIsValid()){
				$data=array();
				if (isset($_FILES['filePhoto']) && is_uploaded_file($_FILES['filePhoto']['tmp_name'])) {
					$upload_conf = array(
					'upload_path'   => realpath('uploads/images/'),
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
						// if you want to use database, put insert query in this loop
						$upload_data = $this->upload->data();
						// set the resize config
						$resize_conf = array(
							// it's something like "/full/path/to/the/image.jpg" maybe
							'source_image'  => $upload_data['full_path'], 
							// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
							// or you can use 'create_thumbs' => true option instead
							'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
							'width'         => 300,
							'height'        => 300
							);
		
						// initializing
						$this->image_lib->initialize($resize_conf);
						// do it!
						if ( ! $this->image_lib->resize())
						{
							// if got fail.
							$error['resize'][] = $this->image_lib->display_errors();
						}
						else
						{
							// otherwise, put each upload data to an array.
							$success[] = $upload_data;
						}
					}				
					// see what we get
					if(count($error) > 0)
					{
						$data['error'] = $error;
					}
					else
					{
						$data['success'] = $upload_data;
					}		
					$this->upload->initialize( $upload_conf );
				}
				// Load the model
				$this->load->model('login_model');
				$result = $this->login_model->register_user($data);	
				if($result){
					redirect('thanks');	
				}
			}
			else{
				if(!$this->recaptcha->getIsValid()) {
					$this->session->set_flashdata('error','<p>Code entered is invalid.</p>');
				}
				else{
					redirect('register');
				}	
			}
		}
		else
		{
			$data['error']=$data['message']=$data['mainmenu']=$data['forgot_form_errors']='';
			$images=$this->common->get_slider_images();		
			$data['slider_images']=$images;	
			$data['title']='Login / Register an account | '.get_setting('site_name');
			$data['meta_desc']=get_setting('metadescription');
			$data['meta_keyword']=get_setting('metakeywords');	
			if($this->session->flashdata('error')<>''):
				$data['register_form_errors']=$this->session->flashdata('error');
			endif;
			$data['register_form_errors'] = validation_errors();
			$data['organisation_groups']=$this->common->list_group_types();		
			//Store the captcha HTML for correct MVC pattern use.
			$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
			$this->load->theme('poverty');
			$this->load->view('login',$data);			
		}			
	}
	//Login to the system
	public function login_user(){
		$data['login_form_errors']='';
		$this->form_validation->set_rules('txtUsername', 'User Name', 'required');
		$this->form_validation->set_rules('txtPassword', 'Password', 'required');
		if($this->form_validation->run()){
			// Load the model
			$this->load->model('login_model');
			// Validate the user can login
			$result = $this->login_model->validate();
			if($result===FALSE){
				$data['error']=$data['message']=$data['mainmenu']=$data['forgot_form_errors']='';
				$images=$this->common->get_slider_images();		
				$data['slider_images']=$images;	
				$data['title']='Login / Register an account | '.get_setting('site_name');
				$data['meta_desc']=get_setting('metadescription');
				$data['meta_keyword']=get_setting('metakeywords');
				$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
				$data['login_form_errors']='<p>Invalid Username/Password.</p>';
				$data['organisation_groups']=$this->common->list_group_types();					
				$this->load->theme('poverty');
				$this->load->view('login',$data);	
			}
			else{
				redirect('');
			}							
		}
		else{
			$data['error']=$data['message']=$data['mainmenu']=$data['forgot_form_errors']='';
			$images=$this->common->get_slider_images();		
			$data['slider_images']=$images;	
			$data['title']='Login / Register an account | '.get_setting('site_name');
			$data['meta_desc']=get_setting('metadescription');
			$data['meta_keyword']=get_setting('metakeywords');
			$data['login_form_errors']=validation_errors();
			$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();			
			$data['organisation_groups']=$this->common->list_group_types();			
			$this->load->theme('poverty');
			$this->load->view('login',$data);	
		}
	}
	public function forgot_password(){
		$data['forgot_form_errors']='';
		$this->form_validation->set_rules('txtForgotEmail', 'Email Address', 'required');		
		if($this->form_validation->run()){
			// Load the model
			$this->load->model('login_model');
			// Validate the user can login
			$result = $this->login_model->forgot_password();
			if($result===FALSE){
				$data['error']=$data['message']=$data['mainmenu']=$data['forgot_form_errors']='';
				$images=$this->common->get_slider_images();		
				$data['slider_images']=$images;	
				$data['title']='Login / Register an account | '.get_setting('site_name');
				$data['meta_desc']=get_setting('metadescription');
				$data['meta_keyword']=get_setting('metakeywords');
				$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
				$data['forgot_form_errors']='<p>Email Address does not exists.</p>';
				$data['organisation_groups']=$this->common->list_group_types();					
				$this->load->theme('poverty');
				$this->load->view('login',$data);	
			}
			else{
				$this->session->set_flashdata('message', 'Your account details are sent.');
				redirect('/login/');
			}							
		}
		else{
			$data['error']=$data['message']=$data['mainmenu']=$data['forgot_form_errors']='';
			$images=$this->common->get_slider_images();		
			$data['slider_images']=$images;	
			$data['title']='Login / Register an account | '.get_setting('site_name');
			$data['meta_desc']=get_setting('metadescription');
			$data['meta_keyword']=get_setting('metakeywords');
			$data['login_form_errors']=validation_errors();
			$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();			
			$data['organisation_groups']=$this->common->list_group_types();			
			$this->load->theme('poverty');
			$this->load->view('login',$data);	
		}
	}	
	private function check_isvalidated(){
        if($this->session->userdata('validated') && $this->session->userdata('member')){
            redirect('');
        }
    }
}