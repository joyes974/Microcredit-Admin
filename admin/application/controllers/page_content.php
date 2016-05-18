<?php
class Page_content extends Controller 
{
    function Page_content()
    {
        parent::Controller();
		$this->common->check_admin_login(1);
    }
    
    function index()
    {
		$query 		   = $this->db->get("pages");
		$data['pages'] = $query->result_array();
        $this->load->view("content/index",$data);
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
	
	function topic_order()
	{
		$order = array();
		$is_error = false;
		for($i=0;$i<$_REQUEST['num_topics'];$i++)
		{
			if($_REQUEST["title"][$i]!="")
			{
				if(in_array($_REQUEST['topics_order'][$i],$order))
				{
					$is_error = true;				
					break;
				}
				array_push($order,$_REQUEST['topics_order'][$i]);
			}
		}
		if($is_error)
		{
			$this->validation->set_message('topic_order', 'Topics order must be different');
			return false;
		}
	}
	
	function delete_content()
	{
		$page_id = $this->uri->segment(3);
		if($page_id != "")
			$this->db->delete("pages",array("id"=>$page_id));
		redirect('page_content');
	}
	
	function page_details()
	{
		$page_id = $this->uri->segment(3);
		
		$query 		   = $this->db->get_where("page_topics",array("page_id"=>$page_id));
		$data['pages'] = $query->result_array();
        
		$query    = $this->db->get_where("pages",array("id"=>$page_id));
		$data['content'] = $query->row_array();
		
		$this->load->view("content/page_details",$data);
	}
	
	function delete_topics()
	{
		$page_id = $this->uri->segment(3);	
		$topic_id = $this->uri->segment(4);
		if($topic_id!="")
		{
			$this->db->delete("page_topics",array("id"=>$topic_id));
		}
		redirect('page_content/page_topics/'.$page_id);
	}
	
	function categories()
	{
		$query	  = $this->db->get("category");
		$data["categories"] = $query->result_array();
		$this->load->view("content/categories",$data);
	}
	
	function add_category()
	{
		$this->load->helper('file');
		$category_id = $this->uri->segment(3);
		
		$this->load->library('validation');
		$rules['category']	= "required";
		$this->validation->set_rules($rules);
		
		$fields['category']	= 'Category';
		$this->validation->set_fields($fields);		
		
		if ($this->validation->run() == TRUE)
		{
			$array = array("category"=>$_REQUEST['category']);
			if($_REQUEST['id']!="")
				$this->db->update("category",$array,array("id"=>$_REQUEST['id']));
			else	
			{
				$this->db->insert("category",$array);
				
				$new_dir = strtolower($_REQUEST['category']);
				mkdir("../".$new_dir, 0777);
				
				$file1    = "../copy_dir/.htaccess";
				$newfile1 = "../".$new_dir."/.htaccess";
				copy($file1, $newfile1); 
				
				$file2    = "../copy_dir/index.php";
				$newfile2 = "../".$new_dir."/index.php";
				copy($file2, $newfile2); 
				
				$file3    = "../copy_dir/medical.php";
				$newfile3 = "../".$new_dir."/medical.php";
				copy($file3, $newfile3);
				
				$somecontent = strtolower($_REQUEST['category']);
				write_file("../".$new_dir."/category.txt", $somecontent, 'w+');
			}
			redirect('page_content/categories');
		}
		
		if($category_id!="")
		{
			$query  = $this->db->get_where("category",array("id"=>$category_id));
			$data['category'] = $query->row_array();
		}
		$this->load->view("content/add_category",$data);
	}
	
	function delete_category()
	{
		$this->load->helper('file');
		$category_id = $this->uri->segment(3);
		$query    = $this->db->get_where("category",array("id"=>$category_id));
		$category = $query->row_array();
		$this->db->delete("category",array("id"=>$category_id));
		$dir = strtolower($category['category']);
		delete_files("../".$dir);
		rmdir("../".$dir);

		redirect('page_content/categories');
	}
	
}
?>
