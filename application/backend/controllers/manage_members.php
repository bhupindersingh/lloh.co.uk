<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_Members extends CI_Controller {
	function __construct(){
        parent::__construct();		
		$this->load->model("Members");
        $this->load->library("pagination");
        $this->check_isvalidated();
    }
	public function index()
	{					
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=8;
		if($this->session->flashdata('message')<>''):
			$data['message']=$this->session->flashdata('message');
		endif;
		//ACTIVE
		if($this->security->xss_clean($this->input->post('asub')) == 1)
		{
			$AUSERID = $this->security->xss_clean($this->input->post('AUSERID'));
			$aval = $this->security->xss_clean($this->input->post('aval'));
			if($aval == "0")
			{
				$aval2 = "1";
				$data['message']='Member is activated successfully. Now he/she is able to logged in to website.';
			}
			else
			{
				$aval2 = "0";
				$data['message']='Member is deactivated successfully. Now he/she weill not able to logged in to website.';
			}			
			$this->Members->update_status($aval2,$AUSERID);
			
		}
		//ACTIVE
		//DELETE
		if($this->security->xss_clean($this->input->post('action')) == 'delete')
		{
			$AUSERID = $this->security->xss_clean($this->input->post('AUSERID'));			
			$this->Members->delete_member($AUSERID);
			$data['message']='Member is deleted successfully.';
		}
		//DELETE
		$config = array();
        $config["base_url"] = site_url('/admin/manage_members/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->Members->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
 		
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->Members->record_count();
        $data["results"] = $this->Members->fetch_members($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 		
		
        $this->load->view('header',$menu);
		$this->load->view('manage_members',$data);
		$this->load->view('footer');
	}
	public function edit(){		
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=8;
		$data["results"] = $this->Members->get_member($this->input->get('USERID'));
		$data['group_types'] = $this->Members->list_group_types();
		$this->load->view('header',$menu);
		$this->load->view('member_edit',$data);
		$this->load->view('footer');
	}
	public function update_member(){
		$this->load->library('form_validation');			
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('organization_name', 'Organization', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$query = $this->db->get_where('members', array('USERID' => $this->input->get('USERID')),1, 0);
		$username='';
		if ($query->num_rows() > 0) {
			$row=$query->result();		
			$usrename=$row[0]->username;	
		}		
		if($this->input->post('user_name') != $username){
		   $is_unique =  '|is_unique[members.username]';
		} else {
		   $is_unique =  '';
		}
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]|xss_clean'.$is_unique);		
		
		if ($this->form_validation->run() == FALSE){
			$data['error'] = '';
			$data['message']='';
			$menu['mainmenu']=8;
			$data["results"] = $this->Members->get_member($this->input->get('USERID'));
			$data['group_types'] = $this->Members->list_group_types();
			$this->load->view('header',$menu);
			$this->load->view('member_edit',$data);
			$this->load->view('footer');
		}
		else{			
			$result = $this->Members->update_member();	
			if($result){
				$this->session->set_flashdata('message', 'Member has been updated successfully.');
				redirect('admin/manage_members');	
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