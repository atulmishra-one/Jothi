<?php

class Products_Model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function getParentCategories($parent =0)
	{
		$q = $this->db->query("select * from categories where ParentId=$parent order by CategoriesName");
		return $q->result();
	}
	
	public function total()
	{
		$q = $this->db->query("select * from products where products_status=0
						and
					stock_status=0 and products_qty > 0");
		return $q->num_rows();
	}
	
	public function getProducts($limit, $start)
	{
		
		
		$list = array();
		
		$q = $this->db->query("select 
								products_id as pid, 
								products_name as name,
								products_currency as cur,
								products_price as price,
								products_qty as qty,
								discount as dis
								
								
					 from 
				
					products 
					
						where 
					products_status=0
						and
					stock_status=0
						and 
					products_qty > 0
					
					ORDER BY date_added, pid desc limit $start, $limit");
		  
		foreach( $q->result_array() as $p )
		{
			if( $this->getQty( $p['pid']) )
			{
				$list[] = array(
				'pid' => $p['pid'],
				'name' => $p['name'],
				'cur' => $p['cur'],
				'price' => $this->afterDiscount($p['pid']),
				'dis' => $this->Discount($p['pid']),
				'image' => $this->getImage($p['pid']),
				'qty' => $this->getQty( $p['pid'])
				
				);
			}
		}
		
			return $list;
		
	}
	
	public function getProductById($id)
	{
		$list = array();
		
		$q = $this->db->query("select 
								products_id as pid, 
								products_name as name,
								products_currency as cur,
								products_price as price,
								products_qty as qty,
								discount as dis,
								products_description as des,
								products_sht_des as sht_des,
								brand as br,
								stock_status as stock,
								shipping_charges as ship
								
								
					 from 
				
					products 
					
						where 
					products_id=$id
						and
					products_status=0
						and
					stock_status=0
						and 
					products_qty > 0
					
					");
					
		foreach( $q->result_array() as $p )
		{
			
				$list[] = array(
				'pid' => $p['pid'],
				'name' => ucwords($p['name']),
				'cur' => $p['cur'],
				'price' => $this->afterDiscount($p['pid']),
				'dis' => $this->Discount($p['pid']),
				'image' => $this->getImage($p['pid']),
				'qty' =>  $p['qty'],
				'brand'=> ucfirst($this->getBrands($p['br'])),
				'details' => $p['des'],
				'short_details' => $p['sht_des'],
				'shipping_charge' => $p['ship'],
				'stock' => $p['stock'],
				'dis2' => $p['dis'],
				'price2' => $p['price']
				
				);
			
		}
		
		return $list;
	}
	
	
	public function getProductsByCats($data)
	{
		$list = array();
		
		$q = $this->db->query("select * from products 
								INNER JOIN product_categories 
								ON
								product_categories.pid=products.products_id
								WHERE product_categories.cid IN ($data)
								and
								products.products_status=0
								and
								products.stock_status=0
								and 
								products.products_qty > 0
								");
								
		foreach( $q->result_array() as $c )
		{
			$list[] = array(
			'pid' => $c['products_id'],
			'name' => $c['products_name'],
			'image' => $this->getImage($c['products_id'])
			
			);
		}
		
		return $list;
		
	}
	
	public function totalByCatId($id)
	{
		$q = $this->db->query("select * from products INNER JOIN product_categories 
								ON
								product_categories.pid=products.products_id
								WHERE product_categories.cid = $id and
								products_status=0
								and
								stock_status=0 
								and 
								products_qty > 0");
		return $q->num_rows();
	}
	
	public function getProductsByCatId($id, $limit, $start)
	{
		$list = array();
		
		$q = $this->db->query("select 
		
								products_id as pids, 
								products_name as name,
								products_currency as cur,
								products_price as price,
								products_qty as qty,
								discount as dis
				
								from products 
								INNER JOIN product_categories 
								ON
								product_categories.pid=products.products_id
								WHERE product_categories.cid = $id
								and
								products.products_status=0
								and
								products.stock_status=0
								and 
								products.products_qty > 0
								
								ORDER BY date_added, pids desc limit $start, $limit
								");
								
		foreach( $q->result_array() as $p )
		{
			if( $this->getQty( $p['pids']) )
			{
				$list[] = array(
				'pid' => $p['pids'],
				'name' => $p['name'],
				'cur' => $p['cur'],
				'price' => $this->afterDiscount($p['pids']),
				'dis' => $this->Discount($p['pids']),
				'image' => $this->getImage($p['pids']),
				'qty' => $this->getQty( $p['pids'])
				
				);
			}
		}
		
		return $list;
		
	}
	
	public function totalByBrands($id)
	{
		$q = $this->db->query("select * from products 
								WHERE brand = $id 
								and
								products_status=0
								and
								stock_status=0 
								and 
								products_qty > 0");
		return $q->num_rows();
	}
	
	public function getProductsByBrands($id, $limit, $start)
	{
		$list = array();
		
		$q = $this->db->query("select 
		
								products_id as pids, 
								products_name as name,
								products_currency as cur,
								products_price as price,
								products_qty as qty,
								discount as dis
				
								from products 
								
								WHERE brand = $id
								and
								products.products_status=0
								and
								products.stock_status=0
								and 
								products.products_qty > 0
								
								ORDER BY date_added, pids desc limit $start, $limit
								");
								
		foreach( $q->result_array() as $p )
		{
			if( $this->getQty( $p['pids']) )
			{
				$list[] = array(
				'pid' => $p['pids'],
				'name' => $p['name'],
				'cur' => $p['cur'],
				'price' => $this->afterDiscount($p['pids']),
				'dis' => $this->Discount($p['pids']),
				'image' => $this->getImage($p['pids']),
				'qty' => $this->getQty( $p['pids'])
				
				);
			}
		}
		
		return $list;
		
	}
	
	public function totalBySearch($data = array() )
	{
		$sql = '';
		$sql2 = "";
		
		if($data)
		{
			$sql .= " ";
			
			$sql2 .= "";
		
			if($data['category_id'])
			{
				$sql .= "INNER JOIN product_categories 
								ON
								product_categories.pid=products.products_id
								";
				$sql2 .= " and product_categories.cid = {$data['category_id']}";
			}
		
			if($data['q'])
			{
				$sql2 .= "and products.products_name LIKE '%{$data['q']}%'";
			}
		}
		$q = $this->db->query("select * from products 
								$sql
								WHERE
								products_status=0
								and
								stock_status=0 
								and 
								products_qty > 0
								$sql2
								");
		return $q->num_rows();
	}
	
	public function getProductsBySearch($limit, $start, $data = array() )
	{
		
		$sql = '';
		$sql2 = "";
		
		if($data)
		{
			$sql .= " ";
			
			$sql2 .= "";
		
			if($data['category_id'])
			{
				$sql .= "INNER JOIN product_categories 
								ON
								product_categories.pid=products.products_id
								";
				$sql2 .= " and product_categories.cid = {$data['category_id']}";
			}
		
			if($data['q'])
			{
				$sql2 .= "and products.products_name LIKE '%{$data['q']}%'";
			}
		}
		
		$list = array();
		
		$q = $this->db->query("select 
		
								products_id as pids, 
								products_name as name,
								products_currency as cur,
								products_price as price,
								products_qty as qty,
								discount as dis
				
								from products 
								
								$sql
								
								WHERE 
							
								products.products_status=0
								and
								products.stock_status=0
								and 
								products.products_qty > 0
								$sql2
								ORDER BY date_added, pids desc limit $start, $limit
								");
								
		foreach( $q->result_array() as $p )
		{
			if( $this->getQty( $p['pids']) )
			{
				$list[] = array(
				'pid' => $p['pids'],
				'name' => $p['name'],
				'cur' => $p['cur'],
				'price' => $this->afterDiscount($p['pids']),
				'dis' => $this->Discount($p['pids']),
				'image' => $this->getImage($p['pids']),
				'qty' => $this->getQty( $p['pids'])
				
				);
			}
		}
		
		return $list;
		
	}
	
	
	public function getProCategories($id)
	{
		$q = $this->db->query("select * from product_categories WHERE pid=$id");
						 
		return $q->result_array();
	}
	
	
	public function getBrands($id)
	{
		$q = $this->db->query("select brandsName from brands where brandsId='$id' limit 1");
		$row = $q->row();
		return @$row->brandsName;	
	}
	
	public function getImage($id)
	{
		$q = $this->db->query("select image from product_images where pid='$id' limit 1");
		$row = $q->row();
		return @$row->image;
	}
	
	public function getImages($id)
	{
		$q = $this->db->query("select * from product_images where pid='$id' order by product_images_id desc ");
		return $q->result_array();
	}
	
	public function afterDiscount($p)
	{
		$q = $this->db->get_where('products', array('products_id' => $p) );
		$row = $q->row();
		
		if( $row->discount > 0 )
		{
			//return $
			return "<span style='text-decoration:line-through'>".number_format($row->products_price, 2)."</span>";
			//return number_format($row->price - $row->discount);
		}
		else {
			return number_format($row->products_price, 2);
		}
	}
	
	public function Discount($p)
	{
		$q = $this->db->get_where('products', array('products_id' => $p) );
		$row = $q->row();
		
		if( $row->discount > 0 )
		{
			return $row->products_currency."&nbsp;".($row->products_price - $row->discount);	
		}
		else {
			return '';
		}
	}
	
	
	public function getQty($p)
	{
		$q = $this->db->get_where('products', array('products_id' => $p) );
		$row = $q->row();
		
		if( $row->products_qty >  0 && $row->stock_status == 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	
	
	
}