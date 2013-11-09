<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends CI_Controller {
	function  __construct()  {
        parent::__construct();
		$this->load->library('common');	
		$this->load->model('media_model');
    }
	public function index()
	{		
		$data['error']='';
		$data['message']='';
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;
		$data['mainmenu']=4;
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Media | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');	
		$data['results']=$this->media_model->list_media();	
		
		$this->load->theme('poverty');
		$this->load->view('media',$data);
	}
}