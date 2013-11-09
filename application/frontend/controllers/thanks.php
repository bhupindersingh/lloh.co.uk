<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thanks extends CI_Controller {

	function  __construct()  {
        parent::__construct();
		$this->load->library('common');    
    }
	public function index()
	{
		//Checks to see if the user is logged in
        if ($this->session->userdata('logged_in') == false)
        {			
			$data['error']='';
			$data['mainmenu']='';
			$images=$this->common->get_slider_images();		
			$data['slider_images']=$images;	
			$data['title']='Thanks for register an account with us | '.get_setting('site_name');
			$data['meta_desc']=get_setting('metadescription');
			$data['meta_keyword']=get_setting('metakeywords');
			$this->load->theme('poverty');
			$this->load->view('thanks',$data);
		}	
		else{
			redirect('');	
		}	
	}
}