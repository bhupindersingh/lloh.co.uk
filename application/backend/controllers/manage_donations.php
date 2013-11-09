<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_Donations extends CI_Controller {
	function __construct(){
        parent::__construct();		
		$this->load->model("Donations");
        $this->load->library("pagination");
        $this->check_isvalidated();
    }
	public function index()
	{					
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=7;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;		
		//DELETE
		if($this->security->xss_clean($this->input->post('action')) == 'delete')
		{
			$APOSTID = $this->security->xss_clean($this->input->post('APOSTID'));			
			$this->Donations->delete_post($APOSTID);
			$data['message']='Post & its donar has been deleted successfully.';
		}
		//DELETE
		$config = array();
        $config["base_url"] = site_url('/admin/manage_donations/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->Donations->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
 		
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->Donations->record_count();
        $data["results"] = $this->Donations->fetch_posts($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 		
		
        $this->load->view('header',$menu);
		$this->load->view('manage_donations',$data);
		$this->load->view('footer');
	}
	public function edit(){		
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=7;
		$data["results"] = $this->Donations->get_post_request($this->input->get('POSTID'));		
		$this->load->view('header',$menu);
		$this->load->view('post_edit',$data);
		$this->load->view('footer');
	}
	public function update_post(){
		$this->load->library('form_validation');			
		$this->form_validation->set_rules('post_name', 'Name of Request', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('quantity_required', 'Quantity Required', 'required');
		$this->form_validation->set_rules('deadline', 'Deadline', 'required');
				
		if ($this->form_validation->run() == FALSE){
			$data['error'] = '';
			$data['message']='';
			$menu['mainmenu']=7;
			$data["results"] = $this->Donations->get_post_request($this->input->get('POSTID'));			
			$this->load->view('header',$menu);
			$this->load->view('post_edit',$data);
			$this->load->view('footer');
		}
		else{			
			$result = $this->Donations->update_post();	
			if($result){
				$this->session->set_flashdata('message', 'Post request has been updated successfully.');
				redirect('admin/manage_donations');	
			}
		}
	}
	public function view_donar(){		
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=7;
		$data["results"] = $this->Donations->get_donar($this->input->get('POSTID'));		
		$this->load->view('header',$menu);
		$this->load->view('view_donar',$data);
		$this->load->view('footer');	
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('isadmin')){
            redirect('admin/login');
        }
    }
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */