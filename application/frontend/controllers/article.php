<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article extends CI_Controller {
	function  __construct()  {
        parent::__construct();
		$this->load->library('common');		
		$this->load->model('article_model');
		$this->load->model('home_model');
		$this->load->library("pagination");		
    }
	public function index()
	{		
		$data['mainmenu']='';
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['title']='Poverty Busters | '.get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');		
		
		$config = array();
        $config["base_url"] = site_url('/article/index/');
		$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        $config["total_rows"] = $this->article_model->record_count();
		$items_per_page=get_setting('items_per_page');
        $config["per_page"] = $items_per_page;
        $config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
		
		$this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['record_count']=$this->article_model->record_count();
        $data["results"] = $this->article_model->list_articles($config["per_page"],$page);
		$data['list_request_ending_soon']=$this->home_model->list_request_ending_soon();
        $data["links"] = $this->pagination->create_links(); 
		
		$this->load->theme('poverty');
		$this->load->view('articles',$data);
	}	
	public function view($slug){		
		$data['mainmenu']='';
		$images=$this->common->get_slider_images();		
		$data['slider_images']=$images;	
		$data['page'] = $this->article_model->get_article($slug);
		$data['title']=$data['page']['title']. ' | '. get_setting('site_name');
		$data['meta_desc']=get_setting('metadescription');
		$data['meta_keyword']=get_setting('metakeywords');
		$data['list_latest_requests']=$this->home_model->list_latest_requests_inner();
		$this->load->theme('poverty');
		$this->load->view('article_detail',$data);	
	}
}