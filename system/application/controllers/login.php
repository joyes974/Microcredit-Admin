<?php
class Login extends Controller {
	
	
	function index()
	{
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		$this->load->model('welcome_mod');	
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|md5|required|min_length[8]|xss_clean');

			
		if ($this->form_validation->run() == FALSE)
		{
		    $data['error']='Enter your your username and password:';
			$this->load->view('login_form',$data);
		}
		else
		{
                $query= $this->db->get_where('users', array('username' => $_REQUEST['username'],'password' => $_REQUEST['password']));
                if($query->num_rows() == 0)
				{
					$data['error']='Wrong Username or password';
					$this->load->view('login_form',$data);
                }
				else
				{					
					$row = $query->row_array(); 
					$num= $row['num'];
					$username= $row['username'];
					$password= $row['password'];	
					//$status = $row['user_type'];					
					$this->session->set_userdata('num', $num);
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('password', $password);
					//$this->session->set_userdata('type', $status);
					redirect('l_app');
				}
            }
		
	}
	
	
	
	
}

?>
