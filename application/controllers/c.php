<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('index_model', 'index');
		$this->load->model('products_model', 'pro');
		$this->load->library('pagination');
		//$this->load->library('cart');
		$this->load->helper('form');
	}
	
	public function index()
	{
		$data = array(
		'ParentCategories' => $this->index->getParentCategories(0)
		);
		
		$this->load->view('Cart/index.html', $data);
	}
	
	public function virtualTour()
	{
		$data = array(
		'ParentCategories' => $this->index->getParentCategories(0)
		);
		
		$this->load->view('Common/virtualtour.html', $data);
	}
	public function promotion()
	{
		$data = array(
		'ParentCategories' => $this->index->getParentCategories(0)
		);
		
		$this->load->view('Common/promotion.html', $data);
	}
	
	public function about()
	{
		$data = array(
		'ParentCategories' => $this->index->getParentCategories(0)
		);
		
		$this->load->view('Common/about.html', $data);
	}
	
	public function faq()
	{
		$data = array(
		'ParentCategories' => $this->index->getParentCategories(0)
		);
		
		$this->load->view('Common/faq.html', $data);
	}
	
	public function contactus()
	{
		$data = array(
		'ParentCategories' => $this->index->getParentCategories(0)
		);
		
		$this->load->view('Common/contactus.html', $data);
	}
	
}