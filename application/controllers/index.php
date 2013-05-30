<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('index_model', 'index');
		
	}
	
	public function index()
	{	
		$data = array(
		'ParentCategories' => $this->index->getParentCategories(0),
		'cat' => $this->getSideCategories(),
		'newArrivals' => $this->index->getNewArrivals(),
		'getBrands' => $this->index->getBrands()
		
		);
		$this->load->view('Index/index.html', $data);
		//str_replace(
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