<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editor extends CI_Controller {

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
		/*
		-$data['content'] = $this->load->view('admin/Categories/Index', '', true);
     	-$this->load->view('admin/Layout', $data);
		*/
	
	}
	
	public function TinyMce()
	{
		if($this->input->post('btn') )
		{
			
			echo '<b>Copy N Paste this into the Description Text Box</b>';
			echo '<hr />';
			
			//echo strip_tags( $_POST['TextEditor'] );
			
			$val =  $this->input->post('TextEditor');
			
			echo htmlentities($val ); 
			
			exit;
		}
		$this->load->view('Editor/TinyMce');
	}
}