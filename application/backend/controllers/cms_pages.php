<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_Pages extends CI_Controller {	
	function __construct(){
        parent::__construct();
		$this->load->model("Settings_Model");       
		$this->load->helper('ckeditor');
        $this->check_isvalidated();
    }
	public function about_us(){
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=10;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
        
		//Ckeditor's configuration
		$data['ckeditor_1'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'static_page',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);	
		$data['pagenumber']=1;
		$data['page_title']='About Us Title';
		$data['page_data']='About Us Data';
		$this->load->view('header',$menu);
		$this->load->view('page',$data);
		$this->load->view('footer');	
	}
	public function contact_us(){
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=10;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
        
		//Ckeditor's configuration
		$data['ckeditor_1'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'static_page',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);	
		$data['pagenumber']=2;
		$data['page_title']='Contact Us Title';
		$data['page_data']='Contact Us Data';
		$this->load->view('header',$menu);
		$this->load->view('page',$data);
		$this->load->view('footer');	
	}
	public function privacy_policy(){
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=10;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
        
		//Ckeditor's configuration
		$data['ckeditor_1'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'static_page',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);	
		$data['pagenumber']=3;
		$data['page_title']='Privacy Policy Title';
		$data['page_data']='Privacy Policy Data';
		$this->load->view('header',$menu);
		$this->load->view('page',$data);
		$this->load->view('footer');	
	}
	public function terms_conditions(){
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=10;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
        
		//Ckeditor's configuration
		$data['ckeditor_1'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'static_page',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"700px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);	
		$data['pagenumber']=4;
		$data['page_title']='Terms & Conditions Title';
		$data['page_data']='Terms & Conditions Data';
		$this->load->view('header',$menu);
		$this->load->view('page',$data);
		$this->load->view('footer');	
	}
	private function check_isvalidated(){ 
        if(!$this->session->userdata('isadmin')){
            redirect('admin/login');
        }
    }
}