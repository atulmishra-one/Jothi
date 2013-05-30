<?php

class Login_Model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function login()
	{
	   $q = $this->db->get_where('admin', array('Username'=> $this->input->post('username', true) ) );
		
		if($q->num_rows() > 0 )
		{
			
			
			$qb = $this->db->get_where('admin', array(
			
			'Username'=> $this->input->post('username', true) ,
			'Password'=> $this->input->post('password', true)
			
			
			) );
			
			if($qb->num_rows() > 0 )
			{
				$row = $qb->row();
				
				$data = array(
				'Admin_Id'=> $row->Id,
				'Username'=> $row->Username,
				'validated'=>true
				);
				
				
				$now = date('Y-m-d h:i:s', time());
				
				
				$updata = array(
				'LastLogin'=> $now
				);
				
				$this->db->where('Id', $row->Id);
				
				$this->db->update('admin', $updata);
				
				$this->session->set_userdata($data);
				
				return 's';
			}
			else
			{
				return 'p';
			}
			
			
		}
		else{
			return 'u';
		}
	}// END Login //


} //*END CLASS*//
