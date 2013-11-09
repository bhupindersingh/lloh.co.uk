<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_Videos extends CI_Controller {
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
			$this->Media->delete_video($MEDIAID);
			$data['message']='Video is deleted successfully.';
		}
		//DELETE
		$config = array();
        $config["base_url"] = site_url('/admin/manage_videos/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->Media->record_count_videos();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
 		
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->Media->record_count_videos();
        $data["results"] = $this->Media->fetch_videos($config["per_page"],$page);
        $data["links"] = $this->pagination->create_links(); 		
		
        $this->load->view('header',$menu);
		$this->load->view('manage_videos',$data);
		$this->load->view('footer');
	}
	public function add_video(){
		$data['error'] = '';
		$data['message']='';
		$menu['mainmenu']=3;			
		$this->load->view('header',$menu);
		$this->load->view('add_video',$data);
		$this->load->view('footer');	
	}
	public function submit(){		
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('title', 'Media Title', 'required');	
		$this->form_validation->set_rules('media_url', 'Video URL', 'required');
			
		$menu['mainmenu']=3;
		if ($this->form_validation->run() == FALSE){
			$data['error'] = '';
			$data['message']='';
			$menu['mainmenu']=3;				
			$this->load->view('header',$menu);
			$this->load->view('add_video',$data);
			$this->load->view('footer');
		}
		else{	
			$result = $this->Media->upload_video();									
			if($result){
				$this->session->set_flashdata('message', 'Video has been added successfully.');
				redirect('admin/manage_videos');	
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
		$this->load->view('video_edit',$data);
		$this->load->view('footer');
	}
	public function update_video(){		
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('title', 'Media Title', 'required');	
		$this->form_validation->set_rules('media_url', 'Video URL', 'required');	
		if ($this->form_validation->run() == FALSE){
			$data['error'] = '';
			$data['message']='';
			$menu['mainmenu']=3;
			$data["results"] = $this->Media->get_media($this->input->get('MEDIAID'));			
			$this->load->view('header',$menu);
			$this->load->view('video_edit',$data);
			$this->load->view('footer');
		}
		else{			
			$result = $this->Media->update_video();
			if($result){
				$this->session->set_flashdata('message', 'Media has been updated successfully.');
				redirect('admin/manage_videos');	
			}		
		}
	}
	public function get_youtube_id($url){
		if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
    		$video_id = $match[1];
		}	
		return $video_id;
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('isadmin')){
            redirect('admin/login');
        }
    }
}