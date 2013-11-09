<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reviews extends CI_Controller {

	function  __construct()  {
        parent::__construct();
		$this->load->library('common');    
		$this->load->library('recaptcha');	  
		$this->load->library('form_validation');
		$this->load->model('reviews_model');
		$this->load->library("pagination");
    }
	public function index()
	{					
		$data['error']='';
		$data['mainmenu']=5;
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Reviews | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');
		if($this->session->flashdata('error')<>''):
			$data['review_form_errors']=$this->session->flashdata('error');
		endif;		
		$data['organisation_groups']=$this->common->list_group_types();
		//Store the captcha HTML for correct MVC pattern use.
		$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
		
		$config = array();
        $config["base_url"] = site_url('/reviews/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->reviews_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
		/*$config['first_link'] = 'First';
		$config['first_tag_open'] = '<div>';
		$config['first_tag_close'] = '</div>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<div>';
		$config['last_tag_close'] = '<div>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div class="next">';
		$config['next_tag_close'] = '</div>';		
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div class="previous">';
		$config['prev_tag_close'] = '<div>';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';
		$config['num_tag_open'] = '<div>';
		$config['num_tag_close'] = '</div>';*/
 		
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->reviews_model->record_count();
        $data["results"] = $this->reviews_model->list_reviews($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 
		
		$this->load->theme('poverty');
		$this->load->view('reviews',$data);
	}
	public function post_review(){
		$this->form_validation->set_rules('selGroup', 'Organization', 'required');		
		$this->form_validation->set_rules('txtFeedback', 'Feedback', 'required');
		if($this->form_validation->run())
		{
			//Call to recaptcha to get the data validation set within the class. 
			$this->recaptcha->recaptcha_check_answer();	
			if($this->recaptcha->getIsValid()){
				$result = $this->reviews_model->postreview();	
				if($result){
					redirect('/reviews/thanks/');	
				}
			}
			else{
				if(!$this->recaptcha->getIsValid()) {
					$this->session->set_flashdata('error','<p>Code entered is invalid.</p>');
				}	
				redirect('/reviews/');
			}
		}
		else{
			$data['error']='';
			$data['mainmenu']=5;
			$images=$this->common->get_slider_images();		
			$data['slider_images']=$images;	
			$data['title']='Reviews | '.get_setting('site_name');
			$data['meta_desc']=get_setting('metadescription');
			$data['meta_keyword']=get_setting('metakeywords');
			if($this->session->flashdata('error')<>''):
				$data['review_form_errors']=$this->session->flashdata('error');
			endif;
			$data['review_form_errors'] = validation_errors();			
			$data['organisation_groups']=$this->common->list_group_types();
			//Store the captcha HTML for correct MVC pattern use.
			$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
			$this->load->theme('poverty');
			$this->load->view('reviews',$data);	
		}
	}
	public function thanks(){		
		$data['mainmenu']=5;
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Thanks For Review | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');
		$this->load->theme('poverty');
		$this->load->view('thanks_review',$data);	
	}
}