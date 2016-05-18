<?php
class Logout extends Controller {
	function Logout()
	{
		parent::Controller();
	}
	
	function index()
	{			
		$this->session->destroy();
		redirect('home');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */