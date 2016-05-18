<?php
class Home extends Controller {
    var $banner;
    function Home()
    {
        parent::Controller();

    }
    
    function index()
    {

        if($_REQUEST['task']=="login")
        {
            if($_REQUEST['username']=="" || $_REQUEST['password']=="")
                $data['error']="Please enter your username and/or password";
            else
            {
                $password=md5($_REQUEST['password']);
                $query=$this->db->query("select * from admin where username='$_REQUEST[username]' and password='$password'");
                if($query->num_rows()>0)
                {
                    $row=$query->row_array();
                    $this->session->set_userdata(array('admin_username'=>$row['username'],'admin_password'=>$row['password'],'admin_id'=>$row['id']));
                    redirect("setting/admin_setting");
                   // $this->session->set_userdata("admin_password");
                }
                else
                {
                    $data['error']="Invalid username and/or passwords";
                }
            }
        }
		if(!$this->common->check_admin_login())
			$this->load->view("home",$data);
		else
			redirect("setting/admin_setting");
    }
     function edit_user($id)
    {

        $data['user']=$this->common->user_edit_data($id);

        if($_REQUEST['submit'])
        {
            $this->common->edit_user($id);
        }
         $this->load->view("edit_user",$data);
    }
}


/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
