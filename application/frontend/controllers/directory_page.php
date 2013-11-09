<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directory_Page extends CI_Controller {
	function  __construct()  {
        parent::__construct();
		$this->load->library('common');
		$this->load->library('recaptcha'); 
		$this->load->model('directory_model');
		$this->load->library("pagination");
		$this->check_isvalidated();
    }
	public function index()
	{		
		$data['error']='';
		$data['message']='';
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;
		$data['mainmenu']=2;
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Directory | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');
		$data['organisation_groups']=$this->common->list_group_types();
		
		$config = array();
        $config["base_url"] = site_url('/directory_page/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->directory_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->directory_model->record_count();
        $data["results"] = $this->directory_model->list_organizations($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 
		
		$this->load->theme('poverty');
		$this->load->view('directory_page',$data);
	}
	public function submit_details(){
		$this->global_theme('');
	}
	public function submit(){
		$this->load->library('form_validation');
		$this->load->library('upload');
        $this->load->library('image_lib');		
		$this->form_validation->set_rules('txtOrganizationName', 'Organization Name', 'required');
		$this->form_validation->set_rules('txtAddress', 'Address', 'required');
		$this->form_validation->set_rules('txtCity', 'City', 'required');
		$this->form_validation->set_rules('txtPostalCode', 'Postal Code', 'required');						
		$this->form_validation->set_rules('txtTelephone', 'Telephone', 'required');
		$this->form_validation->set_rules('txtEmail', 'Email', 'required');
		$this->form_validation->set_rules('txtWebsite', 'Website', 'required');	
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
				$result = $this->directory_model->submit_details($data);	
				if($result){
					$this->session->set_flashdata('message', 'Your details has been submitted successfully.');
					redirect('directory_page');	
				}
			}
			else{
				$data['error']='<p>Code entered is invalid.</p>';	
				$this->global_theme($data['error']);	
			}
		}			          	
	}
	private function global_theme($error=''){
		$data['error']='';
		$data['message']='';
		$data['submit_form_errors']='';
		$data['mainmenu']=2;
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='New Organization - Submit Your Details | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');	
		$data['organisation_groups']=$this->common->list_group_types();		
		//Store the captcha HTML for correct MVC pattern use.
		$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
		if($error<>''):
			$data['submit_form_errors']=$error;
		endif;		
		$this->load->theme('poverty');
		$this->load->view('submit_details',$data);	
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('validated') && !$this->session->userdata('member')){
            redirect('');
        }
    }
}