<?php
class Dashboard_text extends Controller 
{
    function Dashboard_text()
    {
        parent::Controller();
		$this->common->check_admin_login(1);
    }
    
    function index()
    {
	   $query = $this->db->get("news");
	   $data['pages'] = $query->result_array();
       $this->load->view("static_page/dashboard_text",$data);
    }
	
	function edit_page()
	{
		$page_id = $this->uri->segment(3);
		if($_REQUEST['submit']!='')
		{
			if($page_id!='')
			{
				$sql_content = array("title" => $_REQUEST['title'],
									 "description" => $_REQUEST['description'],
									 "site_id"     => $_REQUEST['site_id'],
									 "news_date"=>date('Y-m-d H:i:s')
									 );
				$this->db->update("news",$sql_content,array('id'=>$page_id));
				redirect('dashboard_text');
			}
			else
			{
				$sql_content = array("title" => $_REQUEST['title'],
									 "description" => $_REQUEST['description'],
									 "site_id"     => $_REQUEST['site_id'],
									 "news_date"=>date('Y-m-d H:i:s')
									 );
				$this->db->insert("news",$sql_content);
				redirect('dashboard_text');
			}
		}
		if($page_id!='')
		{
			$query = $this->db->get_where("news",array(' id'=>$page_id));
			$data['page'] = $query->row_array();
		}
		
		$query = $this->db->get("website");
		$data["website"] = $query->result_array();
		
        $this->load->view("static_page/edit_dashboard_text",$data);
	}
	
	function delete_page()
	{
		$page_id = $this->uri->segment(3);
		$this->db->delete("news",array("id"=>$page_id));
		redirect("dashboard_text");
	}
}

?>
