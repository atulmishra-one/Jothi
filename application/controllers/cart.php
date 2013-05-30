<?php ob_start(); if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

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
	
	public function addToCart($id, $qty)
	{
		$item = $this->pro->getProductById($id);
		//$this->cart->insert($item);
		
		if($qty > $item[0]['qty'] )
		{
			echo 'Limited Stock';
		}
		else {
		
		foreach( $item as $i ) {
			
			$price =  ($i['price2'] - $i['dis2']);
		    $name = htmlentities($i['name'], ENT_QUOTES);
			//$sht = (!empty($i['short_details'] ) ) ? $i['short_details']: '';
		    $image = (!empty($i['image'] ) ) ? $i['image']: '';
		
			$cartItems = array(
			'id' => $id,
			'qty' => $qty,
			'price' => $price,
			'name' => $name,
			'options' => array(
							'details' => '', 
							'image' => $image,
							'cur' => $i['cur']
							)
			
			);
			
			if( $this->cart->insert($cartItems) )
			{
				echo 's';
			}
			redirect(base_url('cart'), 'refresh');
			
			
		}
	  }
	}
	
	function update()
	{
			$data = array();
			
			$up = array();
		
			$exceed = false;
			$pname = '';
			$newline = "\n\t";
		
			foreach($_POST as $val){
					$data[] = $val;
			}
		
			foreach($data as $i=> $j){
				
					$q = $this->db->query("select products_qty as qty, products_name as pname from products where products_id={$j['id']}");
					
					$row = $q->row();
					
					if($j['qty'] > $row->qty )
					{
						$exceed .= true;
						$pname .= $row->pname.  " quantity is Limited <br />";
					}
					else{
						$up[] = array(
						'rowid' => $j['rowid'],
						'qty' => $j['qty']
						
						);
					}
				
			}
		if( !$exceed ){
			$this->cart->update($up);
			redirect(base_url('cart'), 'refresh');
		}else{
			$this->session->set_flashdata('msg', '<div class="error"> '.$pname.'</div>');
			redirect(base_url('cart'), 'refresh');
		}
		
		//
	}
	
	function total()
	{
		echo '( '.$this->cart->total_items(). ' )';
		exit;
	}
	
	function remove($id)
	{
		$data = array(
		'rowid'=> $id,
		'qty' => 0
		);
		
		$this->cart->update($data);
		redirect(base_url('cart'), 'refresh');
	}
}