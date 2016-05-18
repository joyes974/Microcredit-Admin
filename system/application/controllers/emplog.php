<?php

class Emplog extends Controller{

function index()
	{
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');
		//$this->load->model('welcome_mod');	
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|md5|required|min_length[8]|xss_clean');

			
		if ($this->form_validation->run() == FALSE)
		{
		      $data['error']='Enter you username and password:';
			$this->load->view('emplogin_form',$data);
		}
		else
		{
                $query= $this->db->get_where('employee', array('username' => $_REQUEST['username'],'password' => $_REQUEST['password']));
                if($query->num_rows() == 0)
				{
					$data['error']='Wrong Username or password';
					$this->load->view('emplogin_form',$data);
                }
				else
				{					
					$row1 = $query->row_array(); 
					$numb= $row1['id'];
					$user= $row1['username'];
					$pass= $row1['password'];	
					//$status = $row['user_type'];					
					$this->session->set_userdata('num', $numb);
					$this->session->set_userdata('username', $user);
					$this->session->set_userdata('password', $pass);
					//$this->session->set_userdata('type', $status);
					redirect('m_collection');
				}
            }
		
	}
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */