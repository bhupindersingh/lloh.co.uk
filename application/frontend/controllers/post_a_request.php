<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post_A_Request extends CI_Controller {
	function  __construct()  {
        parent::__construct();
		$this->load->library('common');   
		$this->load->library('recaptcha'); 
		$this->check_isvalidated();
    }
	public function index()
	{
		$this->global_theme();		
	}
	public function submit(){
		$this->load->library('form_validation');
		$this->load->library('upload');
        $this->load->library('image_lib');		
		$this->form_validation->set_rules('txtNameOfRequest', 'Name of Request', 'required');
		$this->form_validation->set_rules('txtDescription', 'Description', 'required');
		$this->form_validation->set_rules('txtQuantity', 'Quantity Required', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('txtDeadline', 'Deadline', 'required');
		if ($this->form_validation->run() == FALSE){ 	
			$data['error'] = validation_errors();
			$this->global_theme($data['error']);						
		}
		else{
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
				// Load the model
				$this->load->model('request_model');
				$result = $this->request_model->post_request($data);	
				if($result){
					$this->session->set_flashdata('message', 'Your request has been submitted successfully.');
					redirect('request_published');	
				}
			}
			else{
				$data['error']='<p>Code entered is invalid.</p>';	
				$this->global_theme($data['error']);								
			}
		}	
	}
	private function global_theme($error=''){
		$data['mainmenu']='';
		$data['request_form_errors']='';
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Post A Request | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');
		//Store the captcha HTML for correct MVC pattern use.
		$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
		if($error<>''):
			$data['request_form_errors']=$error;
		endif;	
		$this->load->theme('poverty');
		$this->load->view('post_a_request',$data);
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('validated') && !$this->session->userdata('member')){
            redirect('');
        }
    }
}