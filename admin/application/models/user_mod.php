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

class User_mod extends Model 
{
	function all_user($start=0,$limit=5)
	{
		if($_REQUEST['type']!='')
		{
			$str = "order by ".$_REQUEST['type']." ".$_REQUEST['sort'];
		}
		$sql="select *,(select count(*) as total from article where article.user.id = user.id and article.status='Approved') as total_article 
									from user where status !='Deleted' and id>0 $str limit $start,$limit ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function all_user_count()
	{
		if($_REQUEST['type']!='')
		{
			$str = "order by ".$_REQUEST['type']." ".$_REQUEST['sort'];
		}
		$sql="select *,(select count(*) as total from article where article.writer_id = user.id and article.status='Approved') as total_article 
									from user where status !='Deleted' and id>0 $str";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	
	function user_info($uid)
	{
		$query  = $this->db->get_Where("user",array("id"=>$uid));
		return $query->row_array();
	}
	
	function insert_userdata($data)
	{
		$date		 = 	date('Y-m-d H:i:s');		
		$data=array("fathername" => $data['fathername'],	
					"username"    => $data['username'],
					"password"     => $data['password'],
					"address"     => $data['address'],
					"dist"     => $data['dist'],
					"phone"     => $data['phone'],
					"email"     => $data['email'],
					"status"   => "Active",					
					"register_date" => $date
					);
		$this->db->insert('user',$data);
		$uid = $this->db->insert_id();
	}
	
	/*function insert_userdata1($data)
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
	}*/
	
	function search_user($data)
	{
		if($data['id']!='')
			$sql[] = " id ='$_REQUEST[id]'";
		if($data['username']!='')
			$sql[] = " username like '%$_REQUEST[username]%'";
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
			
		$sql = "select * from user where id>0 ".$str;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function delete_user($uid)
	{
		$this->db->update("user",array('status'=>"Deleted"),array('id'=>$uid));	
	}
	
	function save($eid)
	{
		$data=array(	'username' => $_REQUEST['username'],							
						
						'phone' => $_REQUEST['phone'],
						'email' => $_REQUEST['email'],
						'address' => $_REQUEST['address'],
						'dist' => $_REQUEST['dist'],	
						'status'  => 'Active',
						'register_date'=> $_REQUEST['register_date']
					);
		$this->db->update('user', $data, array('id' => $eid)); 
	}
	
	function get_user(){
	   $query_str = "SELECT * FROM user";
	   
	   $result = $this->db->query($query_str);
       
	   return $result;
	   }
	
	
	
}

?>