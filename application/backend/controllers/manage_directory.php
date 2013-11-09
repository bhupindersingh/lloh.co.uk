<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_Directory extends CI_Controller {
	function __construct(){
        parent::__construct();		
		$this->load->model("Directory_Model");
        $this->load->library("pagination");
        $this->check_isvalidated();
    }
	public function index()
	{					
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=5;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;
		//ACTIVE
		if($this->security->xss_clean($this->input->post('dsub')) == 1)
		{
			$DIRECTORYID = $this->security->xss_clean($this->input->post('DIRECTORYID'));
			$dval = $this->security->xss_clean($this->input->post('dval'));
			if($dval == "0")
			{
				$dval2 = "1";
				$data['message']='Organization is activated successfully.';
			}
			else
			{
				$dval2 = "0";
				$data['message']='Organization is deactivated successfully.';
			}			
			$this->Directory_Model->update_status($dval2,$DIRECTORYID);
			
		}
		//ACTIVE
		//DELETE
		if($this->security->xss_clean($this->input->post('action')) == 'delete')
		{
			$DIRECTORYID = $this->security->xss_clean($this->input->post('DIRECTORYID'));			
			$this->Directory_Model->delete_directory($DIRECTORYID);
			$data['message']='Organization is deleted successfully.';
		}
		//DELETE
		$config = array();
        $config["base_url"] = site_url('/admin/manage_directory/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->Directory_Model->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
 		
        $this->pagination->initialize($config); 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->Directory_Model->record_count();
        $data["results"] = $this->Directory_Model->fetch_directory($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 		
		
        $this->load->view('header',$menu);
		$this->load->view('manage_directory',$data);
		$this->load->view('footer');
	}
	public function add_organization(){
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=5;			
		$data['group_types'] = $this->Directory_Model->list_group_types();
		$this->load->view('header',$menu);
		$this->load->view('add_organization',$data);
		$this->load->view('footer');	
	}
	public function submit(){
		$this->load->library('form_validation');
		$this->load->library('upload');
        $this->load->library('image_lib');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=9;
		$this->form_validation->set_rules('organization_name', 'Organization Name', 'required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'required');	
		$this->form_validation->set_rules('city', 'City', 'required');	
		$this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('website', 'Website', 'required');
		if ($this->form_validation->run() == FALSE){			
			$this->load->view('header',$menu);
			$this->load->view('add_organization',$data);
			$this->load->view('footer');
		}
		else{	
			$data=array();
			if (isset($_FILES['organization_logo']) && is_uploaded_file($_FILES['organization_logo']['tmp_name'])) {
				$upload_conf = array(
				'upload_path'   => FCPATH.'../uploads/images/',
				'allowed_types' => 'gif|jpg|png',
				'max_size'      => '30000',
				);
		
				$this->upload->initialize( $upload_conf );
				
				// Put eah errors and upload data to an array
				$error = array();
				$success = array();
				
				if ( ! $this->upload->do_upload('organization_logo'))
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
			$result = $this->Directory_Model->create_organization($data);	
			if($result){
				$this->session->set_flashdata('message', 'Organization has been added to directory successfully.');
				redirect('admin/manage_directory');	
			}
		}	
	}
	public function edit(){		
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=5;
		$data["results"] = $this->Directory_Model->get_directory($this->input->get('DIRECTORYID'));
		$data['group_types'] = $this->Directory_Model->list_group_types();
		$this->load->view('header',$menu);
		$this->load->view('organization_edit',$data);
		$this->load->view('footer');
	}
	public function update_directory(){
		$this->load->library('form_validation');	
		$this->load->library('upload');
        $this->load->library('image_lib');		
		$this->form_validation->set_rules('organization_name', 'Organization Name', 'required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'required');	
		$this->form_validation->set_rules('city', 'City', 'required');	
		$this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('website', 'Website', 'required');
				
		if ($this->form_validation->run() == FALSE){
			$data['error'] = '';
			$data['message']='';
			$menu['mainmenu']=5;
			$data["results"] = $this->Directory_Model->get_directory($this->input->get('DIRECTORYID'));
			$data['group_types'] = $this->Directory_Model->list_group_types();
			$this->load->view('header',$menu);
			$this->load->view('directory_edit',$data);
			$this->load->view('footer');
		}
		else{	
			$data=array();			
			if (isset($_FILES['organization_logo']) && is_uploaded_file($_FILES['organization_logo']['tmp_name'])) {
				$upload_conf = array(
				'upload_path'   => FCPATH.'../uploads/images/',
				'allowed_types' => 'gif|jpg|png',
				'max_size'      => '30000',
				);
		
				$this->upload->initialize( $upload_conf );
				
				// Put eah errors and upload data to an array
				$error = array();
				$success = array();
				
				if ( ! $this->upload->do_upload('organization_logo'))
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
			
			$result = $this->Directory_Model->update_directory($data);	
			if($result){
				$this->session->set_flashdata('message', 'Directory has been updated successfully.');
				redirect('admin/manage_directory');	
			}
		}
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('isadmin')){
            redirect('admin/login');
        }
    }
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */