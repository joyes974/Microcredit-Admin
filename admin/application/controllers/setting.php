<?php
class Setting extends Controller {
    function Setting()
    {
        parent::Controller();
        $this->load->model('setting_mod');
		$this->common->check_admin_login(1);
    }

    function index()
    {
		if($_REQUEST['submit']!='')
		{
			$all_setting = $this->setting_mod->all_setting();
			foreach($all_setting as $setting)
			{
				$key 		= $setting['setting_key'];
				if($_REQUEST[$key]!='')
				{
					$this->db->query("update setting set value='".$_REQUEST[$key]."' where setting_key='".$key."'");
				}
				$data[$key] = $setting['value'];
			}
		}
		$all_setting = $this->setting_mod->all_setting();
		foreach($all_setting as $setting)
		{
			$key 		= $setting['setting_key'];
			$data[$key] = $setting['value'];
		}
        $this->load->view("setting",$data);
    }
     function admin_setting()
    {

        $data['admin']=$this->setting_mod->get_admin();
        if($_REQUEST['submit']=="Update")
        {
            if($_REQUEST['admin_username']=="")
                $data['error']="Please enter your username";
            elseif($_REQUEST['admin_email']=="")
                $data['error']="Please enter your email address";
            else
            {
                if($this->setting_mod->update_admin())
                {
                    redirect("setting/admin_setting");
                }
            }
        }
        elseif($_REQUEST['submit']=="Change")
        {
            if($_REQUEST['old_password']=='')
                $data['pass_error']="Please enter your old password";
            elseif(!$this->setting_mod->check_password($_REQUEST['old_password']))
                $data['pass_error']="Incorrect old password";
            elseif($_REQUEST['new_password']=='')
                $data['pass_error']="Please enter your new password";
            elseif($_REQUEST['new_password']!=$_REQUEST['confirm_password'])
                $data['pass_error']="New password and confirm password is mismatch";
            else
            {
                if($this->setting_mod->change_password($_REQUEST['new_password']))
                    redirect("setting/admin_setting");
            }
            
        }

        $this->load->view("admin_setting",$data);
    }
 }
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
