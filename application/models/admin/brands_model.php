<?php

class Brands_Model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getTotal()
	{
		$q = $this->db->get('brands');
		return $q->num_rows();
	}
	
	function getBrands($limit, $start)
	{
		
		$q = $this->db->query("select * from brands limit $start, $limit ");

		return $q->result();
	}
	
	function info($id){
		$q= $this->db->get_where('brands', array('brandsId'=>$id));
		return $q->result_array();
	}
	
	function AddBrands($file = false)
	{
	
			if( !$this->CheckBrand($this->input->post('brands_name', true) ) )
			{
				$data = array(
				'brandsName'=> $this->input->post('brands_name', true),
				'brandsImage'=> $file
				);
				
				return $this->db->insert('brands', $data) ? 's' : 'e';
				
				
			}
			else{
				return 'c';
			}
		
	}
	
	function EditBrands($id)
	{
			$data = array(
				'brandsName'=> $this->input->post('brands_name', true)
				);
				
		 $this->db->where('brandsId', $id);
		 return $this->db->update('brands', $data) ? 's' : 'e';
	}
	
	function UpdateImage($file, $id)
	{
		$data = array(
		'brandsImage'=> $file
		);
		
		$this->db->where('brandsId', $id);
		$this->db->update('brands', $data);
	}
	
	function CheckBrand($name)
	{
		$q = $this->db->get_where('brands', array('brandsName'=>$name));
		
		if($q->num_rows() > 0 )
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	
	
	
	function delete($id)
	{
		$this->db->where('brandsId', $id);
		$this->db->delete('brands');
		
	}
	
}