<?php
class Logout extends Controller {
	function Logout()
	{
		parent::Controller();
	}
	
	function index()
	{			
		$this->session->sess_destroy();
		redirect('welcome');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */