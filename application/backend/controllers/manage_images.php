<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_Images extends CI_Controller {
	function __construct(){
        parent::__construct();		
		$this->load->model("Media");
        $this->load->library("pagination");
        $this->check_isvalidated();
    }
	public function index()
	{					
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=3;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
		//DELETE
		if($this->security->xss_clean($this->input->post('action')) == 'delete')
		{
			$MEDIAID = $this->security->xss_clean($this->input->post('MEDIAID'));			
			$this->Media->delete_image($MEDIAID);
			$data['message']='Image is deleted successfully.';
		}
		//DELETE
		$config = array();
        $config["base_url"] = site_url('/admin/manage_images/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->Media->record_count_images();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
 		
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->Media->record_count_images();
        $data["results"] = $this->Media->fetch_images($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 		
		
        $this->load->view('header',$menu);
		$this->load->view('manage_images',$data);
		$this->load->view('footer');
	}
	public function add_image(){
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=3;			
		$this->load->view('header',$menu);
		$this->load->view('add_image',$data);
		$this->load->view('footer');	
	}
	public function submit(){
		$this->load->library('upload');
        $this->load->library('image_lib');
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('title', 'Media Title', 'required');	
		if (empty($_FILES['filePhoto']['name']))
		{
			$this->form_validation->set_rules('filePhoto', 'Image', 'required');
		}	
		$menu['mainmenu']=3;
		if ($this->form_validation->run() == FALSE){
			$data['error'] = '';
			$data['message']='';
			$menu['mainmenu']=3;				
			$this->load->view('header',$menu);
			$this->load->view('add_image',$data);
			$this->load->view('footer');
		}
		else{	
			$result=NULL;		
			if (isset($_FILES['filePhoto']) && is_uploaded_file($_FILES['filePhoto']['tmp_name'])) {
				$upload_conf = array(
				'upload_path'   => FCPATH.'../uploads/media/',
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
						'width'         => 500,
						'height'        => 500
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
					$data['message']='';
					$this->load->view('header',$menu);
					$this->load->view('add_image',$data);
					$this->load->view('footer');
				}
				else
				{
					$data['success'] = $upload_data;
					$result = $this->Media->upload_image($data);
				}		
				$this->upload->initialize( $upload_conf );
			}						
			if($result){
				$this->session->set_flashdata('message', 'Image has been uploaded successfully.');
				redirect('admin/manage_images');	
			}
		}	
	}
	public function edit(){		
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=3;
		$data["results"] = $this->Media->get_media($this->input->get('MEDIAID'));		
		$this->load->view('header',$menu);
		$this->load->view('image_edit',$data);
		$this->load->view('footer');
	}
	public function update_image(){
		$this->load->library('upload');
        $this->load->library('image_lib');
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('title', 'Media Title', 'required');	
		if (empty($_FILES['filePhoto']['name']))
		{
			$this->form_validation->set_rules('filePhoto', 'Image', 'required');
		}		
		
		if ($this->form_validation->run() == FALSE){
			$data['error'] = '';
			$data['message']='';
			$menu['mainmenu']=3;
			$data["results"] = $this->Media->get_media($this->input->get('MEDIAID'));			
			$this->load->view('header',$menu);
			$this->load->view('image_edit',$data);
			$this->load->view('footer');
		}
		else{	
			$result=NULL;		
			if (isset($_FILES['filePhoto']) && is_uploaded_file($_FILES['filePhoto']['tmp_name'])) {
				$upload_conf = array(
				'upload_path'   => FCPATH.'../uploads/media/',
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
						'width'         => 500,
						'height'        => 500
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
					$data['message']='';
					$menu['mainmenu']=3;
					$data["results"] = $this->Media->get_media($this->input->get('MEDIAID'));
					$this->load->view('header',$menu);
					$this->load->view('image_edit',$data);
					$this->load->view('footer');
				}
				else
				{
					$data['success'] = $upload_data;
					$result = $this->Media->update_image($data);
				}		
				$this->upload->initialize( $upload_conf );
			}						
			if($result){
				$this->session->set_flashdata('message', 'Media has been updated successfully.');
				redirect('admin/manage_images');	
			}		
		}
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('isadmin')){
            redirect('admin/login');
        }
    }
}