<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins_Manage extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model("Admins");
        $this->load->library("pagination");
        $this->check_isvalidated();
    }
	public function index()
	{		
		$data['error'] = '';	
		$data['message']='';
		$menu['mainmenu']=9;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;
		//DELETE
		if($this->security->xss_clean($this->input->post('action')) == 'delete')
		{
			$AUSERID = $this->security->xss_clean($this->input->post('AUSERID'));			
			$this->Admins->delete_admin($AUSERID);
			$data['message']='Admin is deleted successfully.';
		}
		//DELETE
		
		$config = array();
        $config["base_url"] = site_url('/admin/admins_manage/index/');
        $config["total_rows"] = $this->Admins->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
 		
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->Admins->record_count();
        $data["results"] = $this->Admins->fetch_admins($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links();
 
        $this->load->view('header',$menu);
		$this->load->view('admins_manage',$data);
		$this->load->view('footer');
	}
	public function create_admin(){
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=9;
		$this->load->view('header',$menu);
		$this->load->view('admins_create',$data);
		$this->load->view('footer');	
	}
	public function submit_admin(){		
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=9;
		$this->form_validation->set_rules('username', 'User Name', 'required|min_length[4]|xss_clean|is_unique[administrators.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');		
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() == FALSE){			
			$this->load->view('header',$menu);
			$this->load->view('admins_create',$data);
			$this->load->view('footer');
		}
		else{			
			$result = $this->Admins->create_admin();	
			if($result){
				$this->session->set_flashdata('message', 'Admin has been created successfully.');
				redirect('admin/admins_manage');	
			}
		}
	}
	public function edit(){
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=9;
		$data["results"] = $this->Admins->get_admin($this->input->get('ADMINID'));
		$this->load->view('header',$menu);
		$this->load->view('admin_edit',$data);
		$this->load->view('footer');
	}
	public function update_admin(){
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=9;
		$this->load->library('form_validation');			
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() == FALSE){			
			$this->load->view('header',$menu);
			$this->load->view('admin_edit',$data);
			$this->load->view('footer');
		}
		else{			
			$result = $this->Admins->update_admin();	
			if($result){
				$this->session->set_flashdata('message', 'Administrator has been updated successfully.');
				redirect('admin/admins_manage');	
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