<?php
class User extends Controller 
{
    function User()
    {
        parent::Controller();
        $this->load->model("user_mod");
		$this->common->check_admin_login(1);
    }
    
    function index()
    {
      $start=($this->uri->segment(3)=='')?0:$this->uri->segment(3);
	  $limit=$start+5;
	  $data['user']=$this->user_mod->all_user($start,$limit); 
	  $this->load->library('pagination');
	
      $config['base_url'] =site_url().'user/index/';
      $config['total_rows'] =$this->user_mod->all_user_count();
      $config['per_page'] = '5';
	  $this->pagination->initialize($config);

		$data['links']=$this->pagination->create_links();

   	   // $data['user']=$this->user_mod->all_user();
        $this->load->view("user/user",$data);
    }
	
	function add()
	{
		$this->load->library('validation');
		$rules['username']	      = "required";	
		$rules['email']	      = "required|callback_email_check|valid_email";
		$rules['password']	  = "required|min_length[5]|matches[passconf]";
		$rules['passconf']	  = "required";
		$this->validation->set_rules($rules);
		
		$fields['username']		= 'Username';
		$fields['email']	= 'Email';
		$fields['password']	= 'Password';
		$fields['passconf']	= 'Password Confirmation';
		$this->validation->set_fields($fields);
			
		if ($this->validation->run() == TRUE)
		{
			$this->user_mod->insert_userdata($_REQUEST);
			redirect('user');
		}
        $this->load->view("user/add_user",$data);
	}
	
	function status()
	{
		$uid = $this->uri->segment(3);
		$user_info = $this->user_mod->user_info($uid);
		if($user_info['status']=='Active')
			$status='Pending';
		else
			$status='Active';
		$this->db->update("user",array('status'=>$status),array('id'=>$uid));	
		redirect('user');
	}
	
	function search()
	{
		$data['user']=array();
		if(isset($_REQUEST['submit']))
		{
			$data['user']=$this->user_mod->search_user($_REQUEST);
		}
		$this->load->view("user/search_user",$data);
	}
	
	function email_check($email)
	{
		$query=$this->db->query("select * from user where email='$email' and status in ('Active','Expired')");
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
		$this->user_mod->delete_user($uid);
		redirect('user');
	}
	
	/*function city_by_state()
	{
		$zip_code = $_REQUEST['zip_code'];
		$query    = $this->db->get_where("zipcodes",array("zipcode"=>$zip_code));
		$arr	  = $query->row_array();
		$str 	  = json_encode($arr);
		echo $str;
	}*/
	/*function add_content()
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
	}*/
function edit_user()
	{		
		$this->load->library('validation');
		$eid=$this->uri->segment(3);
		if(isset($_REQUEST['Submit']) && trim($_REQUEST['Submit']!=""))
		{
			$rules['username']      = "required|xss_clean";
            
			$rules['phone']       	 = "required|xss_clean";
			$rules['email']       	 = "required|xss_clean";
			
            $this->validation->set_rules($rules);

            $fields['username']      = "UserName";
            
			$fields['phone']       = "Phone";
			$fields['email']       = "Email";
			
			//$fields['address1']       = "Address1";
			//$fields['address2']       = "Address2";
			
            $this->validation->set_fields($fields);

            if ($this->validation->run() == TRUE){
				$this->user_mod->save($eid);
				//$this->member_mod->update_article($_REQUEST,$article_id,$uid);
			redirect('user/user');
            }
		}
		
		$data['use']=$this->common->get_use_data($eid);
		$this->load->view('user/edit_user',$data);
	}
	
	
	
	/*function page_details()
	{
		$id = $this->uri->segment(3);
		
		$query 		   = $this->db->get_where("user",array("id"=>$id));
		$data['user'] = $query->result_array();
        
		//$query    = $this->db->get_where("pages",array("id"=>$page_id));
		//$data['content'] = $query->row_array();
		
		$this->load->view("user/page_details",$data);
	}*/
	 
}


   

?>
