<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error404 extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('common');
		$this->load->model('page_model');
	}
	public function index()
	{		
		$data['error']='';
		$data['message']='';
		$data['mainmenu']='';
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']=get_setting('site_name').' | 404 Error';
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');
		$this->load->theme('poverty');
		$this->load->view('error404',$data);
	}
}