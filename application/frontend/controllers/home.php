<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
        parent::__construct();      
		$this->load->library('common');   
		$this->load->model('home_model');
    }	
	public function index()
	{
		$images=$this->common->get_slider_images();
		$youtuube_id=$this->common->get_youtube_id(get_setting('video_link'));
		$data['mainmenu']=1;
		$data['slider_images']=$images;
		$data['youtuube_id']=$youtuube_id;
		$data['title']=get_setting('home_page_title_tag').' | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');
		$data['list_latest_requests']=$this->home_model->list_latest_requests();
		$data['list_request_ending_soon']=$this->home_model->list_request_ending_soon();
		$this->load->theme('poverty');
		$this->load->view('home', $data);
	}	
	public function load_more(){
		$data=$this->home_model->load_more_latest_requests();
		echo $data;
		exit;	
	}
}