<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('common');
		$this->load->model('page_model');
		$this->load->model('home_model');
	}
	
	public function view($slug)
	{
		$data['error']='';
		$data['message']='';
		$data['mainmenu']='';
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['page'] = $this->page_model->get_page($slug);
		$data['title']=$data['page']['title']. ' | '. get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');
		$data['list_latest_requests']=$this->home_model->list_latest_requests_inner();
		$this->load->theme('poverty');
		$this->load->view('page',$data);
	}
}