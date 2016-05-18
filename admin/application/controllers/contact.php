<?php
class Contact extends Controller {
    var $banner;
    function Contact()
    {
        parent::Controller();
		$this->load->model("contact_mod");
		$this->common->check_admin_login(1);
    }
    
    function index()
    {
		$this->load->helper("text");
		$data['contact'] = $this->contact_mod->all_contact();
		$this->load->view("contact/index",$data);		
    }
	
	function search_contact()
	{
		$this->load->helper("text");
		if(isset($_REQUEST['submit']))
		{
			$data['contact'] = $this->contact_mod->search_contact();
		}
		$this->load->view("contact/search_contact",$data);		
	}
	
	function view()
    {
		$id = $this->uri->segment(3);
		if(isset($_REQUEST['Submit']))
		{
			$from=$this->common->get_setting('support_email');
			$site_name=$this->common->get_setting('site_name');
			$this->load->library('email');
			$this->email->from($from,$site_name);
			$this->email->to($_REQUEST['email']);
			$this->email->subject($_REQUEST['subject']);
			$this->email->message($_REQUEST['message']);
			$this->email->send();
			$this->contact_mod->save_reply($_REQUEST,$id);
			$data['message'] = 'ok';
		}
		$this->db->update("contact",array('is_read'=>1),"id=".$id);
		$data['contact'] = $this->contact_mod->get_contact($id);
		$data['contact_reply'] = $this->contact_mod->get_contact_reply($id);
		
		$data['default_message'] = $this->contact_mod->default_message();
		if($_REQUEST['default_message']!='')
			$data['df_message'] = $this->contact_mod->get_default_message($_REQUEST['default_message']);
		
		$this->load->view("contact/view",$data);		
    }
	
	function read_contact()
	{
		$id=$this->uri->segment(3);
		$this->db->update("contact",array('is_read'=>1),"id=".$id);
	}
	
	function unread_contact()
	{
		$id=$this->uri->segment(3);
		$this->db->update("contact",array('is_read'=>0),"id=".$id);
	}
	
	function default_message()
	{
		$data['message'] = $this->contact_mod->default_message();
		$this->load->view("contact/default_message",$data);	
	}
	
	function add_default_message()
	{
		$id = $this->uri->segment(3);
		if($_REQUEST['submit']!='')
		{
			$this->contact_mod->add_message($id);
			$data['message'] = 'ok';
		}
		
		if($id != '')
			$data['default_message'] = $this->contact_mod->get_default_message($id);
		
		$this->load->view("contact/add_default_message",$data);	
	}
	
	function delete_default_message()
	{
		$id =  $this->uri->segment(3);
		$this->db->delete("default_message",array("id"=>$id));
		redirect("contact/default_message");
	}
}

?>
