<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Requests_And_Donations extends CI_Controller {
	function  __construct()  {
        parent::__construct();
		$this->load->library('common');	
		$this->load->model('home_model');
    }
	public function index()
	{
		$data['error']='';
		$data['message']='';
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;
		$data['mainmenu']='';
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Directory | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');	
		$data['list_latest_requests']=$this->home_model->list_latest_requests();
		$data['list_request_ending_soon']=$this->home_model->list_request_ending_soon();
		$this->load->theme('poverty');
		$this->load->view('requests_and_donations',$data);
	}
	public function load_more(){
		$data=$this->home_model->load_more_latest_requests();
		echo $data;
		exit;	
	}
}