<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
	public function index()
	{		
		$data['error'] = '';	
		$data['message'] = '';
		$menu['mainmenu'] = '1';
		$this->load->view('header',$menu);
		$this->load->view('home',$data);
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