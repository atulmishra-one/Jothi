<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('admin/login_model', 'logs');
	}
	
	public function index()
	{
		
		if( $this->input->post('btn') )
		{
			if( $this->logs->login() == 's' ) {
				redirect(site_url('admin/dashboard'), 'refresh');
			}
			exit;
		}
		
		$this->load->view('admin/login');
	}
}