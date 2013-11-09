<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directory_Detail extends CI_Controller {
	function  __construct()  {
        parent::__construct();
		$this->load->library('common');
		$this->load->model('directory_model');
		$this->load->library("pagination");
    }
	public function index()
	{
		$data['error']='';
		$data['mainmenu']=2;
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Directory | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');
        $data["results"] = $this->directory_model->get_organization_detail();       
		$this->load->theme('poverty');
		$this->load->view('directory_detail',$data);
	}
}