<?php
class Article extends Controller 
{
    function Article()
    {
        parent::Controller();
        $this->load->model("article_mod");
		$this->common->check_admin_login(1);
    }
    
    function index()
    {
		$this->load->helper('text');
		$data['article']=$this->article_mod->all_article();
        $this->load->view("article/index",$data);
    }
	
	function add_article()
	{
		$this->load->library('validation');
		$rules['article_body']	= "required";	
		$rules['topic_id']	    = "required";
		$this->validation->set_rules($rules);
		
		$fields['article_body']		= 'Article';
		$fields['topic_id']	= 'Topic';
		$this->validation->set_fields($fields);
			
		if ($this->validation->run() == TRUE)
		{
			$this->article_mod->insert_article($_REQUEST);
			redirect('article');
		}
		$data['topics'] = $this->article_mod->available_topic();
		$data['all_writer'] = $this->article_mod->all_writer();
        $this->load->view("article/add_article",$data);
	}
	
	function status()
	{
		$uid = $this->uri->segment(3);
		$user_info = $this->article_mod->article_info($uid);
		if($user_info['status']=='Approved')
			$status='Pending';
		else
			$status='Approved';
		$this->db->update("article",array('status'=>$status),array('id'=>$uid));	
		redirect('article');
	}
	
	function delete()
	{
		$uid = $this->uri->segment(3);
		$this->article_mod->delete_article($uid);
		redirect('article');
	}
	
	
	function article_topics()
    {
		$data['article_topics']=$this->article_mod->all_article_topics();
        $this->load->view("article/article_topics",$data);
    }
	
	function topic_status()
	{
		$tid = $this->uri->segment(3);
		$topic_info = $this->article_mod->article_topic_info($tid);
		if($topic_info['status']=='Approved')
			$status='Pending';
		else
			$status='Approved';
		$this->db->update("article_topic",array('status'=>$status),array('id'=>$tid));	
		
		redirect('article/article_topics');
	}
	
	function add_article_topic()
	{
		$this->load->library('validation');
		$rules['topic']	      = "required";	
		$this->validation->set_rules($rules);
		
		$fields['topic']		= 'Topic';
		$this->validation->set_fields($fields);
			
		if ($this->validation->run() == TRUE)
		{
			$this->article_mod->insert_topics($_REQUEST);
			redirect('article/article_topics');
		}
		$data['all_writer'] = $this->article_mod->all_writer();
        $this->load->view("article/add_article_topic",$data);
	}
	
	function topic_delete()
	{
		$tid = $this->uri->segment(3);
		$this->article_mod->delete_topics($tid);
		redirect('article/article_topics');
	}
	
	function details()
	{
		$article_id = $this->uri->segment(3);	
		if($_REQUEST['update']=='Update')
		{
			$this->article_mod->update_article($_REQUEST);
		}
		$data['article'] 		 = $this->article_mod->details($article_id);		
		$data['article_comment'] = $this->article_mod->article_comment($article_id);
		$data['comment_reason']  = $this->article_mod->comment_reason();
		$this->load->view("article/details",$data);
	}
	
	function download()
	{
		$this->load->helper('download');
		
		$article_id =  $this->uri->segment(3);
		$article    =  $this->article_mod->details($article_id);	

		$data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/documents/".$article['document']); 
		
		//print_R($_SERVER);
		$name = $article['document'];		
		force_download($name, $data); 
	}

}
?>
