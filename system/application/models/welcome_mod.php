<?php

class Welcome_mod extends Model {
	
	function get_country()
	{
		$query = $this->db->get_where('country',array('coutnryid'=>1866));
		return $query->result_array();
	}
	function get_data()
	{
	$query = $this->db->get('admin');//query('SELECT firstname, lastname, email FROM admin');
    return $query->result_array();
	}
	function user_regi(){
	      $data=array(
						'username' => $_REQUEST['username'],							
						'password' => $_REQUEST['password'],
						'fullname' => $_REQUEST['fullname'],							
						'address' => $_REQUEST['address'],
						'mobile' => $_REQUEST['mobile'],							
						'email ' => $_REQUEST['email']
						
					);
		$this->db->insert('users', $data); 
		}
	function emp_regi(){
	$data=array(
						'username' => $_REQUEST['username'],							
						'password' => $_REQUEST['password']
						
						
					);
		$this->db->insert('employee', $data); 
	
	}	
	
	function l_app(){
	$data=array(
	                    'num' =>$this->session->userdata('num'),
						'asking' => $_REQUEST['asking'],							
						'skim' => $_REQUEST['skim'],
						'nomini' => $_REQUEST['nomini'],
						'date' => date("Y-m-d h:i:s"),
						'status' => 'Inactive'
						
						
					);
		$this->db->insert('loan_app', $data); 
	
	}	
	
	function mcollection(){
	$data=array(
						'numb' => $_REQUEST['username'],							
						'name' => $_REQUEST['fullname'],
						'm_number' => $_REQUEST['mnumber'],
						'm_rate' => $_REQUEST['mrate'],							
						'due' => $_REQUEST['due'],
						'fine' => $_REQUEST['fine'],
						'book' => $_REQUEST['book'],
						't_deposit' => $_REQUEST['tdeposit'],
						't_pay' => $_REQUEST['tpay'],
						'date' => date("Y-m-d h:i:s")
						
						
						
					);
		$this->db->insert('m_collection', $data); 
	
	}	
	
}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */