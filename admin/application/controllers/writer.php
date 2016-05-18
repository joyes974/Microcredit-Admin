<?php
class Writer extends Controller 
{
    function Writer()
    {
        parent::Controller();
        $this->load->model("writer_mod");
		$this->common->check_admin_login(1);
    }
    
    function index()
    {
	
	$start=($this->uri->segment(3)=='')?0:$this->uri->segment(3);
	$limit=$start+5;
	$data['user']=$this->writer_mod->all_writer($start,$limit);
		
	$this->load->library('pagination');
	
      $config['base_url'] =site_url().'writer/index/';
      $config['total_rows'] =$this->writer_mod->all_writer_count();
      $config['per_page'] = '5';

		$this->pagination->initialize($config);

		$data['links']=$this->pagination->create_links();
        $this->load->view("writer/user",$data);
    }
	
	function add()
	{
		$this->load->library('validation');
		$rules['fullname']	      = "required";	
		$rules['email']	      = "required|callback_email_check|valid_email";
		$rules['password']	  = "required|min_length[5]|matches[passconf]";
		$rules['passconf']	  = "required";
		$this->validation->set_rules($rules);
		
		$fields['fullname']		= 'Name';
		$fields['email']	= 'Email';
		$fields['password']	= 'Password';
		$fields['passconf']	= 'Password Confirmation';
		$this->validation->set_fields($fields);
			
		if ($this->validation->run() == TRUE)
		{
			$this->writer_mod->insert_userdata($_REQUEST);
			redirect('writer');
		}
        $this->load->view("writer/add_writer",$data);
	}
	
	function status()
	{
		$uid = $this->uri->segment(3);
		$user_info = $this->writer_mod->writer_info($uid);
		if($user_info['status']=='Active')
			$status='Pending';
		else
			$status='Active';
		$this->db->update("emp_details",array('status'=>$status),array('id'=>$uid));	
		redirect('writer');
	}
	
	function search()
	{
		$data['user']=array();
		if(isset($_REQUEST['submit']))
		{
			$data['user']=$this->writer_mod->search_writer($_REQUEST);
		}
		$this->load->view("writer/search_user",$data);
	}
	
	function email_check($email)
	{
		$query=$this->db->query("select * from emp_details where email='$email' and status in ('Active','Expired')");
		if($query->num_rows()>0)
		{
			$this->validation->set_message('email_check', 'Email Already Used');
			return FALSE;
		}
		else
			return TRUE;
	}
	
	function delete()
	{
		$uid = $this->uri->segment(3);
		$this->writer_mod->delete_writer($uid);
		redirect('writer');
	}
	
	function city_by_state()
	{
		$zip_code = $_REQUEST['zip_code'];
		$query    = $this->db->get_where("zipcodes",array("zipcode"=>$zip_code));
		$arr	  = $query->row_array();
		$str 	  = json_encode($arr);
		echo $str;
	}
	function add_content()
	{
		$eid = $this->uri->segment(3);		
		$this->load->library('validation');
		$rules['page_title']	= "required";
		$rules['page_content']	= "required|callback_topic_order";
		$this->validation->set_rules($rules);
		
		$fields['page_title']	= 'Page Title';
		$fields['page_content']	= 'Page Content';
		$this->validation->set_fields($fields);		
		
		if ($this->validation->run() == TRUE)
		{
			$data=array("category" => $_REQUEST['category_link'],
						"page_url"      => $_REQUEST["page_url"],
						"page_header"   => $_REQUEST["page_header"],
						"page_title"    => $_REQUEST["page_title"],
						"page_content"  => stripslashes($_REQUEST["page_content"]),
						"update_time"   => time()
						);
			if($_REQUEST['id']!="")
			{
				$this->db->update("pages",$data,array("id"=>$eid));
				$this->db->delete("page_topics",array("page_id"=>$eid));
				$page_id = $eid;
			}
			else
			{
				$this->db->insert("pages",$data);
				$page_id = $this->db->insert_id();
			}
			
			for($i=0;$i<$_REQUEST['num_topics'];$i++)
			{
				if($_REQUEST["title"][$i]!="")
				{
					$datas=array("page_id" => $page_id,
								"title"    =>    $_REQUEST["title"][$i],
								"description" => stripslashes($_REQUEST["description"][$i]),
								"video_code"  => $_REQUEST["video_code"][$i],
								"topics_order"=> $_REQUEST['topics_order'][$i],
								"update_time" => time()
							);
					$this->db->insert("page_topics",$datas);
				}
			}
			redirect('page_content');
		}
		if($eid!='')
		{
			$query = $this->db->get_where("pages",array('id'=>$eid));
			$data['content'] = $query->row_array();
			
			$this->db->order_by("topics_order", "asc");
			$query 		   = $this->db->get_where("page_topics",array("page_id"=>$eid));
			$data['pages'] = $query->result_array();
		}
		
		$query = $this->db->get('category');
		$data['category'] = $query->result_array();
        $this->load->view("content/add_content",$data);
	}

	 
}


   

?>
