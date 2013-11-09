<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_Pages extends CI_Controller {
	function __construct(){
        parent::__construct();		
		$this->load->model("Pages");
		$this->load->helper('ckeditor');
        $this->load->library("pagination");
        $this->check_isvalidated();
    }
	public function index()
	{					
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=10;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
		//DELETE
		if($this->security->xss_clean($this->input->post('action')) == 'delete')
		{
			$POSTID = $this->security->xss_clean($this->input->post('POSTID'));			
			$this->Pages->delete_pages($POSTID);
			$data['message']='Page is deleted successfully.';
		}
		//DELETE
		$config = array();
        $config["base_url"] = site_url('/admin/manage_pages/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->Pages->record_count_pages();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
 		
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->Pages->record_count_pages();
        $data["results"] = $this->Pages->fetch_pages($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 		
		
        $this->load->view('header',$menu);
		$this->load->view('manage_pages',$data);
		$this->load->view('footer');
	}
	public function add_pages(){
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=10;		
		//Ckeditor's configuration
		$data['ckeditor_1'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'txtDescrition',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"600px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);		
		$this->load->view('header',$menu);		
		$this->load->view('add_pages',$data);
		$this->load->view('footer');	
	}
	public function submit(){		
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('title', 'Page Title', 'required');	
		$this->form_validation->set_rules('txtDescription','Page Description','required');		
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=10;	
		if ($this->form_validation->run() == FALSE){	
			//Ckeditor's configuration
			$data['ckeditor_1'] = array(
	 
				//ID of the textarea that will be replaced
				'id' 	=> 	'txtDescrition',
				'path'	=>	'themes/admin/js/ckeditor',
	 
				//Optionnal values
				'config' => array(
					'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
					'width' 	=> 	"600px",	//Setting a custom width
					'height' 	=> 	'300px',	//Setting a custom height
					'uiColor' => '#9AB8F3'
	 
				)			
			);						
			$this->load->view('header',$menu);
			$this->load->view('add_pages',$data);
			$this->load->view('footer');
		}
		else{	
			$result=$this->Pages->add_pages();	
			if($result){
				$this->session->set_flashdata('message', 'Page has been created successfully.');
				redirect('admin/manage_pages');
			}
		}	
	}
	public function edit(){		
		$this->load->library('form_validation');
		//Ckeditor's configuration
		$data['ckeditor_1'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'txtDescrition',
			'path'	=>	'themes/admin/js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
				'width' 	=> 	"600px",	//Setting a custom width
				'height' 	=> 	'300px',	//Setting a custom height
				'uiColor' => '#9AB8F3'
 
			)			
		);
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=10;
		$data["results"] = $this->Pages->get_pages($this->input->get('POSTID'));	
		
		$this->load->view('header',$menu);
		$this->load->view('pages_edit',$data);
		$this->load->view('footer');
	}
	public function update_pages(){		
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('title', 'Page Title', 'required');	
		$this->form_validation->set_rules('txtDescription','Page Description','required');		
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=10;
		
		if ($this->form_validation->run() == FALSE){			
			//Ckeditor's configuration
			$data['ckeditor_1'] = array(
	 
				//ID of the textarea that will be replaced
				'id' 	=> 	'txtDescrition',
				'path'	=>	'themes/admin/js/ckeditor',
	 
				//Optionnal values
				'config' => array(
					'toolbar' 	=> 	"Standard", 	//Using the Full toolbar
					'width' 	=> 	"600px",	//Setting a custom width
					'height' 	=> 	'300px',	//Setting a custom height
					'uiColor' => '#9AB8F3'
	 
				)			
			);		
			$data["results"] = $this->Pages->get_pages($this->input->get('POSTID'));	
			
			$this->load->view('header',$menu);
			$this->load->view('pages_edit',$data);
			$this->load->view('footer');
		}
		else{
			$result=$this->Pages->update_pages();								
			if($result){
				$this->session->set_flashdata('message', 'Page has been updated successfully.');
				redirect('admin/manage_pages');	
			}		
		}
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('isadmin')){
            redirect('admin/login');
        }
    }
}