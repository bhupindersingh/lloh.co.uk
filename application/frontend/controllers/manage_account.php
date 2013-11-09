<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_Account extends CI_Controller {

	function  __construct()  {
        parent::__construct();
		$this->check_isvalidated();
		$this->load->library('common');  
		$this->load->library('recaptcha'); 
		// Load the model
		$this->load->model('member_model'); 
    }
	public function index()
	{
		$this->global_theme('');				
	}
	
	 public function update() {
		$this->load->library('form_validation');
		$this->load->library('upload');
        $this->load->library('image_lib');		
		$this->form_validation->set_rules('txtFirstname', 'First Name', 'required');
		$this->form_validation->set_rules('txtLastname', 'Last Name', 'required');
		$this->form_validation->set_rules('txtOrganization', 'Organization', 'required');
		$this->form_validation->set_rules('txtEmail', 'Email', 'required');						

		if ($this->form_validation->run() == FALSE)
		{			          
			$data['error'] = validation_errors();	
			$this->global_theme($data['error']);			
		}
		else
		{			
			//Call to recaptcha to get the data validation set within the class. 
			$this->recaptcha->recaptcha_check_answer();	
			if($this->recaptcha->getIsValid()){
				$data=array();
				if (isset($_FILES['filePhoto']) && is_uploaded_file($_FILES['filePhoto']['tmp_name'])) {
					$upload_conf = array(
					'upload_path'   => FCPATH.'/uploads/images/',
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
				$result = $this->member_model->update_user($data);
				if($result){
					$this->session->set_flashdata('message', 'Your account has been updated successfully.');
					redirect('manage_account');	
				}	
			}
			else{
				$data['error']='<p>Code entered is invalid.</p>';	
				$this->global_theme($data['error']);	
			}
		}
    }//.submit()	
	private function global_theme($error=''){
		$data['error']='';
		$data['message']='';
		$data['mainmenu']='';
		$data['manage_form_errors']='';
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Manage Account | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');	
		$data['organisation_groups']=$this->common->list_group_types();
		$data['results']=$this->member_model->get_member();		
		//Store the captcha HTML for correct MVC pattern use.
		$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
		if($error<>''):
			$data['manage_form_errors']=$error;
		endif;		
		$this->load->theme('poverty');
		$this->load->view('manage_account',$data);	
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('validated') && !$this->session->userdata('member')){
            redirect('');
        }
    }
}