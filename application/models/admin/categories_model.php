<?php

class Categories_Model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getTotal()
	{
		$q = $this->db->get('categories');
		return $q->num_rows();
	}
	
	function getCategories($limit, $start, $parentId=0)
	{
		/*$q = $this->db->query("select * from categories order by CategoriesName, ParentId, CategoriesId limit $start, 
		$limit ");
		*/
		
		$list = array();
		
		$q = $this->db->query("select * from categories where ParentId='$parentId' ORDER BY ParentId, CategoriesId, CategoriesName limit $start, $limit ");
		
		foreach($q->result() as $c)
		{
			$list[] = array(
			'CategoriesId'=>$c->CategoriesId,
			'CategoriesName'=>$this->getPath($c->CategoriesId),
			'CategoriesImage'=>$c->CategoriesImage,
			);
			
			$list = array_merge($list, $this->getCat($c->CategoriesId));
		}
		
		
		return $list;
		
		//return $q->result();
	}
	
	function info($id){
		$q= $this->db->get_where('categories', array('CategoriesId'=>$id));
		return $q->result_array();
	}
	
	function AddCategories($file = false)
	{
	
			if( !$this->CheckCategory($this->input->post('category_name', true) ) )
			{
				$data = array(
				'CategoriesName'=> $this->input->post('category_name', true),
				'ParentId'=> $this->input->post('parent_id', true),
				'CategoriesDetails'=> $this->input->post('details', true),
				'CategoriesStatus'=> $this->input->post('status', true),
				'CategoriesImage'=> $file
				);
				
				return $this->db->insert('categories', $data) ? 's' : 'e';
				
				
			}
			else{
				return 'c';
			}
		
	}
	
	function EditCategories($id)
	{
			$data = array(
				'CategoriesName'=> $this->input->post('category_name', true),
				'ParentId'=> $this->input->post('parent_id', true),
				'CategoriesDetails'=> $this->input->post('details', true),
				'CategoriesStatus'=> $this->input->post('status', true),
				);
		 $this->db->where('CategoriesId', $id);
		 return $this->db->update('categories', $data) ? 's' : 'e';
	}
	
	function UpdateImage($file, $id)
	{
		$data = array(
		'CategoriesImage'=> $file
		);
		
		$this->db->where('CategoriesId', $id);
		$this->db->update('Categories', $data);
	}
	
	function CheckCategory($name)
	{
		$q = $this->db->get_where('categories', array('CategoriesName'=>$name));
		
		if($q->num_rows() > 0 )
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	
	
	function getCat($parentId=0)
	{
		$list = array();
		
		$q = $this->db->query("select * from categories where ParentId='$parentId' ORDER BY ParentId, CategoriesId, CategoriesName ");
		
		foreach($q->result() as $c)
		{
			$list[] = array(
			'CategoriesId'=>$c->CategoriesId,
			'CategoriesName'=>$this->getPath($c->CategoriesId)
			);
			
			$list = array_merge($list, $this->getCat($c->CategoriesId));
		}
		
		
		return $list;
		
	}
	
	function getPath($catId)
	{
		$q = $this->db->query("select CategoriesName, ParentId from categories WHERE CategoriesId=$catId");
		
		$row = $q->result_array();
		
		if($row[0]['ParentId'] != 0)
		{
			return $this->getPath($row[0]['ParentId']).' > '.$row[0]['CategoriesName'];
		}
		else{
			return $row[0]['CategoriesName'];
		}
	}
	
	function delete($id)
	{
		$this->db->where('CategoriesId', $id);
		$this->db->delete('categories');
		
	}
	
}