<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_Comments extends CI_Controller {
	function __construct(){
        parent::__construct();		
		$this->load->model("Comments");
        $this->load->library("pagination");
        $this->check_isvalidated();
    }
	public function index()
	{					
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=4;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;
		//ACTIVE
		if($this->security->xss_clean($this->input->post('rsub')) == 1)
		{
			$REVIEWID = $this->security->xss_clean($this->input->post('REVIEWID'));
			$aval = $this->security->xss_clean($this->input->post('rval'));
			if($aval == "draft")
			{
				$aval2 = "published";
				$data['message']='Testimonial is published successfully. Now it will be shown in website.';
			}
			else
			{
				$aval2 = "draft";
				$data['message']='Testimonial is deactivated successfully. Now it will not be shown in website.';
			}			
			$this->Comments->update_status($aval2,$REVIEWID);
			
		}
		//ACTIVE
		//DELETE
		if($this->security->xss_clean($this->input->post('action')) == 'delete')
		{
			$REVIEWID = $this->security->xss_clean($this->input->post('REVIEWID'));			
			$this->Comments->delete_review($REVIEWID);
			$data['message']='Testimonial is deleted successfully.';
		}
		//DELETE
		$config = array();
        $config["base_url"] = site_url('/admin/manage_comments/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->Comments->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
 		
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->Comments->record_count();
        $data["results"] = $this->Comments->fetch_reviews($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 		
		
        $this->load->view('header',$menu);
		$this->load->view('manage_comments',$data);
		$this->load->view('footer');
	}
	public function edit(){		
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=4;
		$data["results"] = $this->Comments->get_review($this->input->get('REVIEWID'));
		$data['group_types'] = $this->Comments->list_group_types();
		$this->load->view('header',$menu);
		$this->load->view('review_edit',$data);
		$this->load->view('footer');
	}
	public function update_review(){
		$this->load->library('form_validation');			
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('organization', 'Organization', 'required');
		$this->form_validation->set_rules('review', 'Review', 'required');	
		
		if ($this->form_validation->run() == FALSE){
			$data['error'] = '';
			$data['message']='';
			$menu['mainmenu']=4;
			$data["results"] = $this->Comments->get_review($this->input->get('REVIEWID'));
			$data['group_types'] = $this->Comments->list_group_types();
			$this->load->view('header',$menu);
			$this->load->view('review_edit',$data);
			$this->load->view('footer');
		}
		else{			
			$result = $this->Comments->update_review();	
			if($result){
				$this->session->set_flashdata('message', 'Testimonial has been updated successfully.');
				redirect('admin/manage_comments');	
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