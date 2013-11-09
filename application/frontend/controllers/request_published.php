<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Request_Published extends CI_Controller {
	function  __construct()  {
        parent::__construct();
		$this->load->library('common');    
		$this->check_isvalidated();
    }
	public function index()
	{
		$data['message']='';
		$data['mainmenu']='';
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;
		$this->load->model('request_model');
		$images=$this->common->get_slider_images();	
		
		$data['slider_images']=$images;	
		$data['title']='Post A Request | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');
		$data["results"] = $this->request_model->fetch_requests();
		$this->load->theme('poverty');
		$this->load->view('request_published',$data);
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('validated') && !$this->session->userdata('member')){
            redirect('');
        }
    }
}