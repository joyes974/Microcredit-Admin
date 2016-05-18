<?php
class Minfo extends Controller 
{
    function Minfo()
    {
        parent::Controller();
        $this->load->model("minfo_mod");
		$this->common->check_admin_login(1);
    }
    
   function index()
    {
		//$data['m_collection']=$this->minfo_mod->all_minfo();
        $this->load->view("content/index",$data);
    }
	
}


   

?>
