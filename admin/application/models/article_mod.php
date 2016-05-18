<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2006, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

class Article_mod extends Model 
{
	function all_article()
	{
		if($_REQUEST['type']!='')
		{
			$str = "order by ".$_REQUEST['type']." ".$_REQUEST['sort'];
		}
		$sql="select article.id as id,
					 article_topic.topic as topic,
					 writer.name as name,
					 writer.email as email,
					 article.article_body as article_body,
					 article.post_time as post_time,
					 article.status as status,
					 article.document as document
							from article,article_topic,writer where 	
										article.writer_id  = writer.id and
										article.topic_id   = article_topic.id  $str";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function writer_info($uid)
	{
		$query  = $this->db->get_Where("writer",array("id"=>$uid));
		return $query->row_array();
	}
	
	function insert_article($data)
	{ 	 	 	 	
		$data=array("topic_id"=>$data['topic_id'],
					"writer_id"=>$data['writer_id'],	
					"article_body"=>$data['article_body'],
					"post_time"=>time(),
					"status"=>"Approved"
					);
		$this->db->insert('article',$data);		
		$this->db->query("update article_topic set 	used=used+1 where id=".$data['topic_id']);
	}
	
	function search_writer($data)
	{
		if($data['id']!='')
			$sql[] = " id ='$_REQUEST[id]'";
		if($data['name']!='')
			$sql[] = " name like '%$_REQUEST[name]%'";
		if($data['email']!='')
			$sql[] = " email like '%$_REQUEST[email]%'";
		if($_REQUEST['date_from']!='')
		{
			$date = explode('/',$_REQUEST['date_from']);
			$date_from = $date[2].'-'.$date[0].'-'.$date[1];
			$sql[]=" register_date >='$date_from'";
		}
		if($_REQUEST['date_to']!='')
		{
			$date = explode('/',$_REQUEST['date_to']);
			$date_to = $date[2].'-'.$date[0].'-'.$date[1];
			$sql[]=" register_date <='$date_to'";
		}
		if(count($sql)>0)
			$str = "Where ".implode(" and ",$sql);
			
		$sql = "select * from writer ".$str;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function delete_article($aid)
	{	
		$query  = $this->db->get_where("article",array("id"=>$aid));
		$arr 	= $query->row_array();
		
		if(count($arr)>0)
		{
			$this->db->query("update article_topic set used=used-1 where id=".$arr['topic_id']);
			$this->db->delete("article",array('id'=>$aid));	
		}
	}
	
	function all_article_topics()
	{
		$query = $this->db->query("select article_topic.id as id,
										  article_topic.topic as topic,
										  article_topic.status as status,
										  article_topic.used as used,
										  article_topic.limits as limits
										from article_topic where
															article_topic.status != 'Deleted'");
		return $query->result_array();
	}
	
	function article_topic_info($tid)
	{
		$query = $this->db->get_where("article_topic",array("id"=>$tid));
		return $query->row_array();
	}
	
	function all_writer()
	{
		$query = $this->db->query("select * from writer where status='Active' and id>0 order by id ASC");
		return $query->result_array();
	}
	
	function insert_topics($data)
	{	 	 	 	 	 
		$datas=array("topic"	 => $data['topic'],	
					 "status"	 => 'Approved',
					 "limits"	 =>	$data['limits'],
					 "keywords"  => $data['keywords'],
					 "comment" 	 => $data['comment'],
					 "post_time" => time()
					 );
		$this->db->insert('article_topic',$datas);
		$topic_id = $this->db->insert_id();
		$check=true;
		for($i=0;$i<count($data['suggested_writer_id']);$i++)
		{
			if($data['suggested_writer_id'][$i]!="")
			{
				$check = false;
				$info  = array("topic_id"=>$topic_id,"writer_id"=>$data['suggested_writer_id'][$i]);
				$this->db->insert('topic_writer_link',$info);
			}
		}
		if($check)
			$this->db->insert('topic_writer_link',array("topic_id"=>$topic_id,"writer_id"=>0));
	}
	
	function delete_topics($tid)
	{
		$this->db->update("article_topic",array("status"=>"Deleted"),array("id"=>$tid));
	}
	
	function article_info($aid)
	{
		$query = $this->db->get_where("article",array("id"=>$aid));
		return $query->row_array();
	}
	
	function available_topic()
	{
		$query = $this->db->query("select * from article_topic where used < limits and status='Approved'");
		return $query->result_array();
	}
	
	function details($aid)
	{
		$sql="select article.id as id,
					 article_topic.topic as topic,
					 writer.name as name,
					 writer.email as email,
					 article.article_body as article_body,
					 article.post_time as post_time,
					 article.status as status,
					 article.document as document
							from article,article_topic,writer where 	
										article.writer_id  = writer.id and
										article.topic_id   = article_topic.id and
										article.id    = $aid
										";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	function update_article($info)
	{
		if($info['status']=='Rejected' && $info['comment'] !="")
		{
			$time = time();
			$comment_reason = ($info['comment_reason']=="")?$info["other_reason"]:$info["comment_reason"];
			$data = array(	"article_id" 	 => $info['article_id'],
							"comment"		 => $info['comment'],
							"comment_reason" => $comment_reason,
							"comment_time"  => $time
						);
			$this->db->insert("article_comment",$data);
		}
		$this->db->update("article",array('status'=>$info['status']),array('id'=>$info['article_id']));	
	}
	
	function article_comment($article_id)
	{
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get_where("article_comment",array("article_id"=>$article_id));
		return $query->result_array();
	}
	
	function comment_reason()
	{
		$query = $this->db->get("comment_reasons");
		return $query->result_array();
	}
	
	function all_topic_writer($topic_id)
	{
		$query = $this->db->query("select * from topic_writer_link,writer where 
																	topic_writer_link.topic_id = $topic_id and
																	topic_writer_link.writer_id = writer.id
								");
		$arr = $query->result_array();
		$str = array();
		for($i=0;$i<count($arr);$i++)
		{
			$str[]=$arr[$i]['email']; 
		}
		return implode(", ",$str);
	}
}

?>