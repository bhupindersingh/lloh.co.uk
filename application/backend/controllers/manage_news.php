<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_News extends CI_Controller {
	function __construct(){
        parent::__construct();		
		$this->load->model("News");
		$this->load->helper('ckeditor');
        $this->load->library("pagination");
        $this->check_isvalidated();
    }
	public function index()
	{					
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=6;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
		//DELETE
		if($this->security->xss_clean($this->input->post('action')) == 'delete')
		{
			$POSTID = $this->security->xss_clean($this->input->post('POSTID'));			
			$this->News->delete_news($POSTID);
			$data['message']='News is deleted successfully.';
		}
		//DELETE
		$config = array();
        $config["base_url"] = site_url('/admin/manage_news/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->News->record_count_news();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
 		
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->News->record_count_news();
        $data["results"] = $this->News->fetch_news($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 		
		
        $this->load->view('header',$menu);
		$this->load->view('manage_news',$data);
		$this->load->view('footer');
	}
	public function add_news(){
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=6;		
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
		$this->load->view('add_news',$data);
		$this->load->view('footer');	
	}
	public function submit(){		
		$this->load->library('form_validation');
		$this->load->library('upload');
        $this->load->library('image_lib');		
		$this->form_validation->set_rules('title', 'News Title', 'required');	
		$this->form_validation->set_rules('txtDescription','News Description','required');		
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=6;	
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
			$this->load->view('add_news',$data);
			$this->load->view('footer');
		}
		else{	
			$data=array();			
			if (isset($_FILES['filePhoto']) && is_uploaded_file($_FILES['filePhoto']['tmp_name'])) {
				$upload_conf = array(
				'upload_path'   => FCPATH.'../uploads/images/',
				'allowed_types' => 'gif|jpg|png',
				'max_size'      => '30000',
				);
		
				$this->upload->initialize( $upload_conf );
				
				// Put eah errors and upload data to an array
				$error = array();
				$success = array();
				
				if ( ! $this->upload->do_upload('filePhoto'))
				{
					// if upload fail, grab error 
					$error['upload'][] = $this->upload->display_errors();
				}
				else
				{
					// otherwise, put the upload datas here.
					// if you want to use database, put insert query in this loop
					$upload_data = $this->upload->data();
					// set the resize config
					$resize_conf = array(
						// it's something like "/full/path/to/the/image.jpg" maybe
						'source_image'  => $upload_data['full_path'], 
						// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
						// or you can use 'create_thumbs' => true option instead
						'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
						'width'         => 140,
						'height'        => 140
						);
	
					// initializing
					$this->image_lib->initialize($resize_conf);
					// do it!
					if ( ! $this->image_lib->resize())
					{
						// if got fail.
						$error['resize'][] = $this->image_lib->display_errors();
					}
					else
					{
						// otherwise, put each upload data to an array.
						$success[] = $upload_data;
					}
				}				
				// see what we get
				if(count($error) > 0)
				{
					$data['error'] = $error;
				}
				else
				{
					$data['success'] = $upload_data;
				}		
				$this->upload->initialize( $upload_conf );
			}	
			$result=$this->News->add_news($data);	
			if($result){
				$this->session->set_flashdata('message', 'News has been created successfully.');
				redirect('admin/manage_news');
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
		$menu['mainmenu']=6;
		$data["results"] = $this->News->get_news($this->input->get('POSTID'));	
		
		$this->load->view('header',$menu);
		$this->load->view('news_edit',$data);
		$this->load->view('footer');
	}
	public function update_news(){		
		$this->load->library('form_validation');	
		$this->load->library('upload');
        $this->load->library('image_lib');	
		$this->form_validation->set_rules('title', 'News Title', 'required');	
		$this->form_validation->set_rules('txtDescription','News Description','required');		
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=6;
		
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
			$data["results"] = $this->News->get_news($this->input->get('POSTID'));	
			
			$this->load->view('header',$menu);
			$this->load->view('image_edit',$data);
			$this->load->view('footer');
		}
		else{
			$data=array();			
			if (isset($_FILES['filePhoto']) && is_uploaded_file($_FILES['filePhoto']['tmp_name'])) {
				$upload_conf = array(
				'upload_path'   => FCPATH.'../uploads/images/',
				'allowed_types' => 'gif|jpg|png',
				'max_size'      => '30000',
				);
		
				$this->upload->initialize( $upload_conf );
				
				// Put eah errors and upload data to an array
				$error = array();
				$success = array();
				
				if ( ! $this->upload->do_upload('filePhoto'))
				{
					// if upload fail, grab error 
					$error['upload'][] = $this->upload->display_errors();
				}
				else
				{
					// otherwise, put the upload datas here.
					// if you want to use database, put insert query in this loop
					$upload_data = $this->upload->data();
					// set the resize config
					$resize_conf = array(
						// it's something like "/full/path/to/the/image.jpg" maybe
						'source_image'  => $upload_data['full_path'], 
						// and it's "/full/path/to/the/" + "thumb_" + "image.jpg
						// or you can use 'create_thumbs' => true option instead
						'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
						'width'         => 140,
						'height'        => 140
						);
	
					// initializing
					$this->image_lib->initialize($resize_conf);
					// do it!
					if ( ! $this->image_lib->resize())
					{
						// if got fail.
						$error['resize'][] = $this->image_lib->display_errors();
					}
					else
					{
						// otherwise, put each upload data to an array.
						$success[] = $upload_data;
					}
				}				
				// see what we get
				if(count($error) > 0)
				{
					$data['error'] = $error;
				}
				else
				{
					$data['success'] = $upload_data;
				}		
				$this->upload->initialize( $upload_conf );
			}	
			$result=$this->News->update_news($data);								
			if($result){
				$this->session->set_flashdata('message', 'News has been updated successfully.');
				redirect('admin/manage_news');	
			}		
		}
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('isadmin')){
            redirect('admin/login');
        }
    }
}