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

class Contact_mod extends Model 
{
	function all_contact()
	{
		if($_REQUEST['type']!='')
		{
			$str = "order by ".$_REQUEST['type']." ".$_REQUEST['sort'];
		}
		$query = $this->db->query("select * from contact $str");
		return $query->result_array();
	}	
	
	function get_contact($id)
	{
		$query = $this->db->get_Where("contact",array('id'=>$id));
		return $query->row_array();
	}
	
	function search_contact()
	{
		if($_REQUEST['reason']!='')
			$sql[]=" reason ='$_REQUEST[reason]'";
		if($_REQUEST['email']!='')
			$sql[]=" email like '%$_REQUEST[email]%'";
		if($_REQUEST['phone']!='')
			$sql[]=" phone like '%$_REQUEST[phone]%'";
		if($_REQUEST['website']!='')
			$sql[]=" website like '%$_REQUEST[website]%'";
		if($_REQUEST['date_from']!='')
		{
			$date = explode('/',$_REQUEST['date_from']);
			$date_from = $date[2].'-'.$date[0].'-'.$date[1]." 00:00:00";
			$sql[]=" send_date >='$date_from'";
		}
		if($_REQUEST['date_to']!='')
		{
			$date = explode('/',$_REQUEST['date_to']);
			$date_to = $date[2].'-'.$date[0].'-'.$date[1]." 23:59:59";
			$sql[]=" send_date <='$date_to'";
		}
		
		if(count($sql)>0)
			$sql_str = " where ".implode(" and ",$sql);
		$query = $this->db->query("select * from contact $sql_str");
		return $query->result_array();
	}
	
	function save_reply($data,$cid)
	{
		$date_time=date('Y-m-d H:i:s');
		$subject = $_REQUEST['subject'];
		$data=array("contact_id"=>$cid,
					"subject"=>$subject,
					"message"=>$_REQUEST['message'],
					"date_time"=>$date_time
					);
		$this->db->insert("contact_reply",$data);
	}
	
	function get_contact_reply($cid)
	{
		$query = $this->db->get_Where("contact_reply",array("contact_id"=>$cid));
		return $query->result_array();
	}
	
	function default_message()
	{
		$query  = $this->db->get("default_message");
		return $query->result_array();
	}
	
	function add_message($id='')
	{
		$data=array(
					"subject"=>$_REQUEST['subject'],
					"message"=>$_REQUEST['message'],
					"update_date"=>date("Y-m-d H:i:s")
					);
		if($id=='')
		{
			$this->db->insert("default_message",$data);
		}
		else
		{
			$this->db->update("default_message",$data,array("id"=>$id));
		}
	}
	
	function get_default_message($id)
	{
		$query = $this->db->get_Where("default_message",array("id"=>$id));
		return $query->row_array();
	}
}

?>