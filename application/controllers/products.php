<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('index_model', 'index');
		$this->load->model('products_model', 'pro');
		$this->load->library('pagination');
	}
	
	public function index()
	{	
		
		$config['base_url'] = base_url().'products/index/page';
		$config['total_rows'] = $this->pro->total();
		
		$config['full_tag_open'] = '<div class="panigation-menu">';
		$config['full_tag_close'] = '</div><!--CLOSE PAGINATION-->';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<button>';
		$config['first_tag_close'] = '</button>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<button>';
		$config['last_tag_close'] = '</button>';
		
		$config['next_link'] = 'Next &raquo;';
		$config['prev_link'] = '&laquo; Prev';
		$config['next_tag_open'] = '<button>';
		$config['next_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button>';
		$config['prev_tag_close'] = '</button>';
		
		
		$config['cur_tag_open'] = '<button class="active">';
	    $config['cur_tag_close'] = '</button>';
		$config['num_tag_open'] = '<button>';
		$config['num_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button>';
		$config['prev_tag_close'] = '</button>';
		$config['next_tag_open'] = '<button>';
		$config['next_tag_close'] = '</button>';
		
		//$config['display_pages'] = FALSE;
		
		$config['per_page'] = 36;
		$config["uri_segment"] = 4;
		
		$this->pagination->initialize($config); 
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0 ;
		
	
		$data = array(
			'heading' => 'Product List',
			'ParentCategories' => $this->index->getParentCategories(0),
			'cat' => $this->getSideCategories(),
			'getBrands' => $this->index->getBrands(),
			'products' => $this->pro->getProducts((int)$config['per_page'], (int)$page),
			'pagination'=>$this->pagination->create_links()
		);
	
		$this->load->view('Products/products.html', $data);
	}
	
	public function u($id = false)
	{	
		
		if( !$id )
		{
			show_404();
		}
		
			$catids = '';
		
		foreach( $this->pro->getProCategories($id) as $c )
		{
			$catids .= $c['cid']. " ,";
		}
		
		$catids = rtrim( $catids, ',');
		
		
		$cat = $this->pro->getProductsByCats($catids);
		
		//print_r($cat);
		
		$data = array(
		'ParentCategories' => $this->index->getParentCategories(0),
		'pro' => $this->pro->getProductById($id),
		'images' => $this->pro->getImages($id),
		'getProductsByCats' => $cat
		
		);
	
		$this->load->view('Products/details.html', $data);
	}
	
	public function categories($id = false, $text = false)
	{
		if( !$id)
		{
			show_404();
		}
		
		$config['base_url'] = base_url().'products/categories/'.$id.'/page';
		$config['total_rows'] = $this->pro->totalByCatId($id);
		
		$config['full_tag_open'] = '<div class="panigation-menu">';
		$config['full_tag_close'] = '</div><!--CLOSE PAGINATION-->';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<button>';
		$config['first_tag_close'] = '</button>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<button>';
		$config['last_tag_close'] = '</button>';
		
		$config['next_link'] = 'Next &raquo;';
		$config['prev_link'] = '&laquo; Prev';
		$config['next_tag_open'] = '<button>';
		$config['next_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button>';
		$config['prev_tag_close'] = '</button>';
		
		
		$config['cur_tag_open'] = '<button class="active">';
	    $config['cur_tag_close'] = '</button>';
		$config['num_tag_open'] = '<button>';
		$config['num_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button>';
		$config['prev_tag_close'] = '</button>';
		$config['next_tag_open'] = '<button>';
		$config['next_tag_close'] = '</button>';
		
		//$config['display_pages'] = FALSE;
		
		$config['per_page'] = 36;
		$config["uri_segment"] = 5;
		
		$this->pagination->initialize($config); 
		
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0 ;
		
	
		$data = array(
			'heading' => 'Category',
			'text' => $text,
			'ParentCategories' => $this->index->getParentCategories(0),
			'cat' => $this->getSideCategories(),
			'getBrands' => $this->index->getBrands(),
			'products' => $this->pro->getProductsByCatId($id, (int)$config['per_page'], (int)$page),
			'pagination'=>$this->pagination->create_links()
		);
	
		$this->load->view('Products/products.html', $data);
		
	}
	
	public function brands($id = false, $text = false)
	{
		if( !$id)
		{
			show_404();
		}
		
		$config['base_url'] = base_url().'products/brands/'.$id.'/page';
		$config['total_rows'] = $this->pro->totalByBrands($id);
		
		$config['full_tag_open'] = '<div class="panigation-menu">';
		$config['full_tag_close'] = '</div><!--CLOSE PAGINATION-->';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<button>';
		$config['first_tag_close'] = '</button>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<button>';
		$config['last_tag_close'] = '</button>';
		
		$config['next_link'] = 'Next &raquo;';
		$config['prev_link'] = '&laquo; Prev';
		$config['next_tag_open'] = '<button>';
		$config['next_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button>';
		$config['prev_tag_close'] = '</button>';
		
		
		$config['cur_tag_open'] = '<button class="active">';
	    $config['cur_tag_close'] = '</button>';
		$config['num_tag_open'] = '<button>';
		$config['num_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button>';
		$config['prev_tag_close'] = '</button>';
		$config['next_tag_open'] = '<button>';
		$config['next_tag_close'] = '</button>';
		
		//$config['display_pages'] = FALSE;
		
		$config['per_page'] = 36;
		$config["uri_segment"] = 5;
		
		$this->pagination->initialize($config); 
		
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0 ;
		
	
		$data = array(
			'heading' => 'Brands',
			'text' => humanize($text),
			'ParentCategories' => $this->index->getParentCategories(0),
			'cat' => $this->getSideCategories(),
			'getBrands' => $this->index->getBrands(),
			'products' => $this->pro->getProductsByBrands($id, (int)$config['per_page'], (int)$page),
			'pagination'=>$this->pagination->create_links()
		);
	
		$this->load->view('Products/products.html', $data);
		
	}
	
	public function search()
	{
		$s = array(
		'category_id' => (int)$this->input->get('categories_id'),
		'q' => $this->input->get('q')
		);
		
		$config['base_url'] = base_url().'products/search/page';
		$config['total_rows'] = $this->pro->totalBySearch($s);
		
		$config['full_tag_open'] = '<div class="panigation-menu">';
		$config['full_tag_close'] = '</div><!--CLOSE PAGINATION-->';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<button>';
		$config['first_tag_close'] = '</button>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<button>';
		$config['last_tag_close'] = '</button>';
		
		$config['next_link'] = 'Next &raquo;';
		$config['prev_link'] = '&laquo; Prev';
		$config['next_tag_open'] = '<button>';
		$config['next_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button>';
		$config['prev_tag_close'] = '</button>';
		
		
		$config['cur_tag_open'] = '<button class="active">';
	    $config['cur_tag_close'] = '</button>';
		$config['num_tag_open'] = '<button>';
		$config['num_tag_close'] = '</button>';
		$config['prev_tag_open'] = '<button>';
		$config['prev_tag_close'] = '</button>';
		$config['next_tag_open'] = '<button>';
		$config['next_tag_close'] = '</button>';
		
		//$config['display_pages'] = FALSE;
		
		$config['per_page'] = 36;
		$config["uri_segment"] = 4;
		
		$this->pagination->initialize($config); 
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0 ;
		
	
		$data = array(
			'heading' => 'Search',
			'ParentCategories' => $this->index->getParentCategories(0),
			'cat' => $this->getSideCategories(),
			'getBrands' => $this->index->getBrands(),
			'products' => $this->pro->getProductsBySearch((int)$config['per_page'], (int)$page, $s),
			'pagination'=>$this->pagination->create_links()
		);
	
		$this->load->view('Products/products.html', $data);
		
	}
	
	
	public function getSideCategories($parent =0, $level= 0)
	{
		$level++;
		
		$data = array();
		
		$results = $this->index->getParentCategories($parent);
		
		foreach( $results as $res )
		{
			$data[] = array(
				'category_id' => $res->CategoriesId,
				'name' => str_repeat('&nbsp;&nbsp;', $level).$res->CategoriesName. ""
			
			);
			
			$children = $this->getSideCategories($res->CategoriesId, $level);
			
			if ($children) {
			  $data = array_merge($data, $children);
			}
		}
		
		return $data;
		
	}//
}