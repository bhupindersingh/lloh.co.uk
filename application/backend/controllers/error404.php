<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error404 extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
	public function index()
	{			
		$data['error'] = '';	
		$data['message'] = '';
		$menu['mainmenu'] = '';
		$this->load->view('header',$menu);
		$this->load->view('error404');
		$this->load->view('footer');
	}
	private function check_isvalidated(){
        if(!$this->session->userdata('isadmin')){
            redirect('admin/login');
        }
    }
}