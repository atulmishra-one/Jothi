<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		if( ! $this->session->userdata('validated') )
		{
			redirect(site_url('admin'), 'redirect');
		}
		//$this->load->model('admin/login_model', 'logs');
	}
	
	public function index()
	{
		$data['content'] = $this->load->view('admin/Dashboard/Index', '', true);
     	$this->load->view('admin/Layout', $data);
	
	}
}