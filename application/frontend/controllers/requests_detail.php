<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Requests_Detail extends CI_Controller {
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
		$data['request']=$this->home_model->show_post_details();
		$data['title']= $data['request'][0]->post_name.' | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');			
		$this->load->theme('poverty');
		$this->load->view('requests_detail',$data);
	}
}