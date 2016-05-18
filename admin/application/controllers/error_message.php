<?php
class Error_message extends Controller 
{
    function Error_message()
    {
        parent::Controller();
		$this->common->check_admin_login(1);
    }
    
    function index()
    {
	   $query = $this->db->get("error_message");
	   $data['pages'] = $query->result_array();
       $this->load->view("static_page/error_message",$data);
    }
	
	function edit_message()
	{
		$error_id = $this->uri->segment(3);
		if($_REQUEST['submit']!='')
		{
			if($error_id!='')
			{
				$sql_content = array("message"=>$_REQUEST['message'],
									 "last_update"=>date('Y-m-d H:i:s'));
				$this->db->update("error_message",$sql_content,array('id'=>$error_id));
				redirect('error_message');
			}
		}
		if($error_id!='')
		{
			$query = $this->db->get_where("error_message",array(' id'=>$error_id));
			$data['page'] = $query->row_array();
		}
        $this->load->view("static_page/edit_error_message",$data);
	}
}

?>
