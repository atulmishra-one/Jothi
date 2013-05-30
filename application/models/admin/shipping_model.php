<?php

class Shipping_Model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}

	
	function getShipping()
	{
		
		$q = $this->db->query("select * from shipping");

		return $q->result_array();
	}
	
	function info($id){
		$q= $this->db->get_where('shipping', array('shipping_id'=>$id));
		return $q->result_array();
	}
	
	
	
	function Edit($id)
	{
			$data = array(
				'shipping_rate'=> $this->input->post('shipping_rate', true),
				'shipping_status' => $this->input->post('status', true)
				);
				
		 $this->db->where('shipping_id', $id);
		 return $this->db->update('shipping', $data) ? 's' : 'e';
	}
	
	
	
	
	
}