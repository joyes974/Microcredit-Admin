<?php

class User extends Controller {
	
	function index()
	{
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		$this->load->model('welcome_mod');	
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
$this->form_validation->set_rules('address', 'Address', 'trim|required');
$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('user_reg');
		}
		else
		{
			$this->welcome_mod->user_regi();
			$data['ur']='user';
			$this->load->view('eformsuccess',$data);
		}
	}
	
	function employee(){
	$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		$this->load->model('welcome_mod');	
	
	$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');

if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('employee');
		}
		else
		{
			$this->welcome_mod->emp_regi();
		}
	}
	
	function l_app(){
	$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		$this->load->model('welcome_mod');	
	
	$this->form_validation->set_rules('asking', 'Asking ammount', 'trim|required|min_length[5]|max_length[12]|xss_clean');
$this->form_validation->set_rules('nomini', 'Password', 'trim|required|min_length[5]|max_length[12]|xss_clean');
//$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');

if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('l_appview');
		}
		else
		{
			$this->welcome_mod->l_app();
		}
	}
	
	function m_collection(){
	$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		$this->load->model('welcome_mod');	

		$this->form_validation->set_rules('username', 'Number', 'trim|required|min_length[5]|max_length[12]|xss_clean');
$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
$this->form_validation->set_rules('mnumber', 'Month number', 'trim|required');
$this->form_validation->set_rules('mrate', 'Monthly rate', 'trim|required');
$this->form_validation->set_rules('due', 'Due', 'trim|required');
$this->form_validation->set_rules('fine', 'Fine', 'trim|required');
$this->form_validation->set_rules('book', 'Book', 'trim|required');
$this->form_validation->set_rules('tdeposit', 'Total deposit', 'trim|required');
$this->form_validation->set_rules('tpay', 'Total payment', 'trim|required');

if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('m_collection');
		}
		else
		{
			$this->welcome_mod->mcollection();
		}
	}
	

	}
	

?>