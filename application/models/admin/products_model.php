<?php

class Products_Model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function AddProducts()
	{
		
		$date = date('Y-m-d', time());
		
		$data1 = array(
		'products_name' => $this->input->post('product_name', true),
		'products_price' => $this->input->post('product_price', true),
		'products_currency'=> $this->input->post('currency', true),
		'products_qty'=> $this->input->post('quantity', true),
		'products_status'=> $this->input->post('status', true),
		'stock_status'=> $this->input->post('stock_status', true),
		'products_description'=> $this->input->post('details'),
		'products_sht_des' => $this->input->post('sht_details'),
		'date_added'=> $date,
		'brand' => $this->input->post('brands'),
		'shipping_charges' => $this->input->post('shipping'),
		'discount' => $this->input->post('discount'),
		'product_weight' => $this->input->post('product_weight'),
		'weight_class' => $this->input->post('weight_class')
		);
		
		$this->db->insert('products', $data1);
		
		$id = $this->db->insert_id();
		
		
	if($this->input->post('category_id') )
	{	
		foreach($this->input->post('category_id') as $c)
		{
			$data2 = array(
			'pid'=> $id,
			'cid'=> $c
			);
			
			$this->db->insert('product_categories', $data2);
		}
	} // close category 
		
		if(isset ( $_FILES['image']['name'] ) )
		{
					
					foreach( $_FILES['image']['name']  as $i => $img)
					{
						
						$tmp = $_FILES['image']['tmp_name'][$i];
						$name = $_FILES['image']['name'][$i];
						
						if( !empty($name) ){
							move_uploaded_file($tmp, './Public/ProductImages/'.$name);
							$this->UploadImage($name, $id);
						}
					}
			
            
			
		}// close image upload
		
		return true;
	}//
	
	
	public function EditProduct($id)
	{
		
		$date = date('Y-m-d', time());
		
		$data1 = array(
		'products_name' => $this->input->post('product_name', true),
		'products_price' => $this->input->post('product_price', true),
		'products_currency'=> $this->input->post('currency', true),
		'products_qty'=> $this->input->post('quantity', true),
		'products_status'=> $this->input->post('status', true),
		'stock_status'=> $this->input->post('stock_status', true),
		'products_description'=> $this->input->post('details'),
		'products_sht_des' => $this->input->post('sht_details'),
		'date_added'=> $date,
		'brand' => $this->input->post('brands'),
		'shipping_charges' => $this->input->post('shipping'),
		'discount' => $this->input->post('discount'),
		'product_weight' => $this->input->post('product_weight'),
		'weight_class' => $this->input->post('weight_class')
		);
		$this->db->where('products_id', $id);
		$this->db->update('products', $data1);
		
		$this->db->query("delete from product_categories where pid='$id'");
		
	if($this->input->post('category_id') )
	{	
		foreach($this->input->post('category_id') as $c)
		{
			$data2 = array(
			'pid'=> $id,
			'cid'=> $c
			);
			
			$this->db->insert('product_categories', $data2);
		}
	} // close category 
	
	
	if(isset ( $_FILES['image']['name'] )  and count( $_FILES['image']['name'] ) > 0 and  $_FILES['image']['size'] > 0)
		{
		
			
					
					foreach( $_FILES['image']['name']  as $i => $img)
					{
						
						$tmp = $_FILES['image']['tmp_name'][$i];
						$name = $_FILES['image']['name'][$i];
						
						if( !empty($name) ){
							$this->db->query("delete from product_images where image='$id'");
							move_uploaded_file($tmp, './Public/ProductImages/'.$name);
							$this->UploadImage($name, $id);
						}
					}
			
            
			
		}// close image upload
		
		
		return true;
		
	}
	
	
	public function UploadImage($file, $id)
	{
			$data = array(
			'pid'=> $id,
			'image'=>$file
			);
			//$this->db->where('pid', $id);
			$this->db->insert('product_images', $data);
	} // close UploadImage //
	
	public function getTotalProduct()
	{
		$q = $this->db->query("select * from products
								INNER JOIN product_categories ON 
								products.products_id=product_categories.pid
		");
		
		return $q->num_rows();
	}
	
	
	public function getProducts($limit, $start, $data = array())
	{
		$sql = '';
		
		if($data)
		{
			$sql .= "where products_price is not null ";
			
			if( $data['p'] && !is_null($data['p']) )
			{
				$sql .= "and products_name LIKE '%{$data['p']}%' ";
			}
			
			if( $data['q'] && !is_null( $data['q'] ) )
			{
				$sql .= "and products_qty='{$data['q']}'";
			}
			
			if( $data['s'] && !is_null( $data['s'] ) )
			{
				$sql .= "and products_status='{$data['s']}'";
			}
			if( $data['stk']   && !is_null( $data['stk'] ) )
			{
				$sql .= "and stock_status='{$data['stk']}'";
			}
		}
		
		$list = array();
		
		$q = $this->db->query("select * from products $sql
		 order by date_added limit $start, $limit");
		
		foreach( $q->result() as $p )
		{
			$list[] = array(
			'products_id' => $p->products_id,
			'products_name' => $p->products_name,
			'products_qty'=> $p->products_qty,
			'products_status'=> $p->products_status,
			'stock_status'=> $p->stock_status,
			'image'=> $this->getImage($p->products_id)
			
			);
		}
		
		return $list;
	}
	
	public function getImage($id)
	{
		$q = $this->db->query("select * from product_images where pid='$id' order  by product_images_id limit 1");
		$row = $q->row();
		return @$row->image;
	}
	
	public function  delete($id)
	{
		$this->db->query("delete from products where products_id='$id'");
		$this->db->query("delete from product_categories where pid='$id'");
		$this->db->query("delete from product_images where pid='$id'");
		
	}
	
	public function info($id)
	{
		$q = $this->db->query("select * from products WHERE products.products_id=$id");
						 
		return $q->result_array();
	}
	
	public function getProCategories($id)
	{
		$q = $this->db->query("select * from product_categories WHERE pid=$id");
						 
		return $q->result();
	}
	
	public function getImages($id)
	{
		$q = $this->db->query("select * from product_images where pid='$id' order by product_images_id desc ");
		return $q->result();
	}
	
	
	public function getBrands()
	{
		$q = $this->db->get('brands');
		return $q->result();
	}
	
}









