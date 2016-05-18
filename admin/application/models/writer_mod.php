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

class Writer_mod extends Model 
{
	function all_writer($start=0,$limit=5)
	{
		if($_REQUEST['type']!='')
		{
			$str = "order by ".$_REQUEST['type']." ".$_REQUEST['sort'];
		}
		$sql="select *,(select count(*) as total from article where article.writer_id = emp_details.id and article.status='Approved') as total_article 
									from emp_details where status !='Deleted' and id>0 $str limit $start,$limit";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function all_writer_count()
	{
		if($_REQUEST['type']!='')
		{
			$str = "order by ".$_REQUEST['type']." ".$_REQUEST['sort'];
		}
		$sql="select *,(select count(*) as total from article where article.writer_id = emp_details.id and article.status='Approved') as total_article 
									from emp_details where status !='Deleted' and id>0 $str ";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	function writer_info($uid)
	{
		$query  = $this->db->get_Where("emp_details",array("id"=>$uid));
		return $query->row_array();
	}
	
	function insert_userdata($data)
	{
		$date		 = 	date('Y-m-d H:i:s');		
		$data=array("fullname"    => $data['fullname'],
					"fathersname" => $data['fathersname'],	
					"motthersname" => $data['motthersname'],
					"pres_address" => $data['pres_address'],
					"pst_address" => $data['pst_address'],
					"phone"     => $data['phone'],
					"email"     => $data['email'],
					"dist"     => $data['dist'],
					"salary"     => $data['salary'],
					"password"     => $data['password'],
					"status"   => "Active",					
					"register_date" => $date
					);
		$this->db->insert('emp_details',$data);
		$uid = $this->db->insert_id();
	}
	
	function insert_userdata1($data)
	{
		$date		 = 	date('Y-m-d H:i:s');		
		$data=array("email"    => $data['email'],
					"password" => $data['password'],	
					"name"     => $data['name'],	 	 	 	
					"status"   => "Active",					
					"street"   => $data['street'],
					"city"     => $data['city'],
					"state"    => $data['state'],
					"zip_code" => $data['zip_code'],
					"register_date" => $date
					);
		$this->db->insert('writer',$data);
		$uid = $this->db->insert_id();
	}
	
	function search_writer($data)
	{
		if($data['id']!='')
			$sql[] = " id ='$_REQUEST[id]'";
		if($data['fullname']!='')
			$sql[] = " fullname like '%$_REQUEST[fullname]%'";
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
			$str = " and ".implode(" and ",$sql);
			
		$sql = "select * from emp_details where id>0 ".$str;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function delete_writer($uid)
	{
		$this->db->update("emp_details",array('status'=>"Deleted"),array('id'=>$uid));	
	}
}

?>