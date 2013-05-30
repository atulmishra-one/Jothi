<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		if( ! $this->session->userdata('validated') )
		{
			redirect(site_url('admin'), 'redirect');
		}
		$this->load->model('admin/categories_model', 'cat');
		$this->load->model('admin/products_model', 'pro');
		$this->load->library('pagination');
	}
	
	public function index()
	{
		
		$total = $this->pro->getTotalProduct();
		
		
		$config['base_url'] = base_url().'admin/products/index/page';
		$config['total_rows'] = $total;
		
		$config['full_tag_open'] = '<div class="pagination pagination-mini"><ul>';
		
		$config['prev_link'] = '&laquo;&nbsp;Prev';
		$config['next_link'] = '&nbsp;Next &raquo;';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = '';
		$config['first_link'] = '';
		
	    $config['full_tag_close'] = '<ul></div><!--CLOSE PAGINATION-->';
		
		
		$config['per_page'] = 20;
		$config["uri_segment"] = 5;
		
		$this->pagination->initialize($config); 
		
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0 ;
		
		
		/*****************************************************/
	
	
		$sort = array(
			
			'p' => $this->input->get('p'),
			'q' => $this->input->get('q'),
			's' => $this->input->get('s'),
			'stk' => $this->input->get('stk')	
		);
		
		
		
		$data = array(
		'p'=> true,
		'products' => $this->pro->getProducts($config['per_page'], $page, $sort),
		'pagination'=>$this->pagination->create_links()
		);
		
		$data['content'] = $this->load->view('admin/Products/Index', $data, true);
     	$this->load->view('admin/Layout', $data);
	}
	
	function add_products()
	{
		
		if($this->input->post('btn') )
		{
			if( $this->pro->AddProducts() )
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Product Added Successfully !</div>');
				redirect(site_url('admin/products/add_products'), 'refresh');
			}
		}
		$data['getBrands'] = $this->pro->getBrands();
		$data['categories'] = $this->cat->getCat();
		$data['content'] = $this->load->view('admin/Products/Add', $data, true);
		$this->load->view('admin/Layout', $data);
	}
	
	
	function edit($id = false)
	{
		if( !$id)
		{
			show_404();
		}
		
		
		if($this->input->post('btn') )
		{
			//exit;
			if( $this->pro->EditProduct($id) )
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Product Edited Successfully !</div>');
				redirect(site_url('admin/products/edit/'.$id), 'refresh');
			}
		}
		$data['getBrands'] = $this->pro->getBrands();
		$data['getProCategories'] = $this->pro->getProCategories($id);
		
		$data['images'] = $this->pro->getImages($id);
		
		$data['v'] = $this->pro->info($id);
		
		$data['categories'] = $this->cat->getCat();
		$data['content'] = $this->load->view('admin/Products/Edit', $data, true);
		$this->load->view('admin/Layout', $data);
		
	}
	
	function delete($id = false)
	{
		if( $id )
		{
			$this->pro->delete($id);
		}
	}


}// End Class