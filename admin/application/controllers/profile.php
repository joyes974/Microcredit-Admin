<?php
class Profile extends Controller {
	//var $banner;
	function Profile()
	{
		parent::Controller();
		//$this->banner=$this->common->select_banner_by_page('home');	
		$this->load->model('profile_mod');		
		$this->common->check_admin_login(1);
		
	}
	
	function index()
	{		
		$this->load->library('validation');
		$eid=$this->uri->segment(3);
		if(isset($_REQUEST['Submit']) && trim($_REQUEST['Submit']!=""))
		{
			$rules['fullname']      = "required|xss_clean";
            
			$rules['phone']       	 = "required|xss_clean";
			$rules['email']       	 = "required|xss_clean";
			
            $this->validation->set_rules($rules);

            $fields['fullname']      = "Name";
            
			$fields['phone']       = "Phone";
			$fields['email']       = "Email";
			
			//$fields['address1']       = "Address1";
			//$fields['address2']       = "Address2";
			
            $this->validation->set_fields($fields);

            if ($this->validation->run() == TRUE){
				$this->profile_mod->save($eid);
				//$this->member_mod->update_article($_REQUEST,$article_id,$uid);
			redirect('writer/user');
            }
		}
		
		$data['emp']=$this->common->get_emp_data($eid);
		$this->load->view('writer/edit_emp',$data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */