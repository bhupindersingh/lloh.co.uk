<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Logout extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}		
	private function check_isvalidated(){
		if(!$this->session->userdata('isadmin')){
            redirect('admin/login');
        }
	}	
	public function index(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}
 }