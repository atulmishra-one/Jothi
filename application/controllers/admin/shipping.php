<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shipping extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		if( ! $this->session->userdata('validated') )
		{
			redirect(site_url('admin'), 'redirect');
		}
		$this->load->model('admin/categories_model', 'cat');
		$this->load->model('admin/brands_model', 'br');
		$this->load->model('admin/shipping_model', 'ship');
		$this->load->library('pagination');
	}
	
	public function index()
	{
		
		
		
		$data = array (
		'shipping' => $this->ship->getShipping()
		
		);
		
		
		
		$data['content'] = $this->load->view('admin/Shipping/shipping', $data, true);
		
     	$this->load->view('admin/Layout', $data);
	
	}
	
	
	

	public function edit($id = false)
	{
		if( !$id) {
			show_404();
		}
		
		if( $this->input->post('btn') )
		{
			
			echo $this->ship->Edit($id);
			
			exit;
		}
		
		
		$data['v'] = $this->ship->info($id);
		
		
		$data['content'] = $this->load->view('admin/Shipping/Add', $data, true);
     	$this->load->view('admin/Layout', $data);
	}
	

	
	
	
}