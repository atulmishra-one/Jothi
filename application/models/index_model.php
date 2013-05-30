<?php

class Index_Model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function getParentCategories($parent =0)
	{
		$q = $this->db->query("select * from categories where ParentId=$parent order by CategoriesName");
		return $q->result();
	}
	
	public function getNewArrivals()
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
					
					ORDER BY date_added, pid desc limit 9");
		  
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
	
	public function getImage($id)
	{
		$q = $this->db->query("select image from product_images where pid='$id' limit 1");
		$row = $q->row();
		return @$row->image;
	}
	
	public function afterDiscount($p)
	{
		$q = $this->db->get_where('products', array('products_id' => $p) );
		$row = $q->row();
		
		if( $row->discount > 0 )
		{
			//return $
			return "<span style='text-decoration:line-through'>".number_format($row->products_price, 2)."<span>";
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
	
	public function getBrands()
	{
		$q = $this->db->get('brands');
		return $q->result_array();
	}
	
	
	
}