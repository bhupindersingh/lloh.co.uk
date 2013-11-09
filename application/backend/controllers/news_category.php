<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_Category extends CI_Controller {
	function __construct(){
        parent::__construct();		
		$this->load->model("News");
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
			$CATEGORYID = $this->security->xss_clean($this->input->post('CATEGORYID'));			
			$this->News->delete_category($CATEGORYID);
			$data['message']='Category is deleted successfully.';
		}
		//DELETE
		$config = array();
        $config["base_url"] = site_url('/admin/category/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->News->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
 		
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->News->record_count();
        $data["results"] = $this->News->fetch_categories($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 		
		
        $this->load->view('header',$menu);
		$this->load->view('news_category',$data);
		$this->load->view('footer');
	}
	public function add_news_category(){
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=6	;			
		$this->load->view('header',$menu);
		$this->load->view('add_news_category',$data);
		$this->load->view('footer');	
	}
	public function submit(){
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('category_name', 'Catgeory Name', 'required');		
		
		if ($this->form_validation->run() == FALSE){
			$data['error'] = '';
			$data['message']='';
			$menu['mainmenu']=6;				
			$this->load->view('header',$menu);
			$this->load->view('add_news_category',$data);
			$this->load->view('footer');
		}
		else{			
			$result = $this->News->create_category();	
			if($result){
				$this->session->set_flashdata('message', 'Category has been created successfully.');
				redirect('admin/news_category');	
			}
		}	
	}
	public function edit(){		
		$this->load->library('form_validation');
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=6;
		$data["results"] = $this->News->get_category($this->input->get('CATEGORYID'));		
		$this->load->view('header',$menu);
		$this->load->view('news_category_edit',$data);
		$this->load->view('footer');
	}
	public function update_category(){
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('category_name', 'Category Name', 'required');		
		
		if ($this->form_validation->run() == FALSE){
			$data['error'] = '';
			$data['message']='';
			$menu['mainmenu']=6;
			$data["results"] = $this->News->get_category($this->input->get('CATEGORYID'));			
			$this->load->view('header',$menu);
			$this->load->view('category_edit',$data);
			$this->load->view('footer');
		}
		else{			
			$result = $this->News->update_category();	
			if($result){
				$this->session->set_flashdata('message', 'Category has been updated successfully.');
				redirect('admin/news_category');	
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