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

class Common extends Model {

	function is_login($is_redirect='')
	{
		$username=$this->session->userdata('username');
		$password=$this->session->userdata('password');
		
		if($username==''&&$password=='')
		{
			if($is_redirect==1)
				redirect(not_login_page());
			return false;
		}
		else
		{
			$query = $this->db->get_where('users',array('username' => $username,'password' => $password));
			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				if($is_redirect==1)
					redirect(not_login_page());
				return false;
			}
		}
	}
	
	function is_elogin($is_redirect='')
	{
		$username=$this->session->userdata('username');
		$password=$this->session->userdata('password');
		
		if($username==''&&$password=='')
		{
			if($is_redirect==1)
				redirect(not_elogin_page());
			return false;
		}
		else
		{
			$query = $this->db->get_where('employee',array('username' => $username,'password' => $password));
			if($query->num_rows() > 0)
			{
				return true;
			}
			else
			{
				if($is_redirect==1)
					redirect(not_elogin_page());
				return false;
			}
		}
	}
	
	
	function select_banner_by_page($page)
	{
		$query = $this->db->get_where('banners',array('page' => $page,'status' => 0));
        $banner=$query->result_array(); 		
		return $banner;
	}
	
	function csm_content($title)
	{
		$query = $this->db->get_where('cms',array('title' => $title));
		$arr=$query->row();		
		return $arr->desc;
	}
	
	function select_country()
	{
		$query=$this->db->query("select * from country order by countryname asc");
		$arr=$query->result_array();	
		return $arr;
	}
	
	function get_user_data($userid)
	{
		$query = $this->db->get_where('users',array('userid' => $userid));
		$arr=$query->result_array();	
		return $arr[0];
	}
	
	function select_cat_list()
	{
		$query=$this->db->query("select * from category where status=0 order by catname asc");
		$arr=$query->result_array();	
		return $arr;
	}
	
	function select_brand()
	{
		$query=$this->db->query("select * from brand where status=0 order by brandname ASC");
		$arr=$query->result_array();	
		return $arr;
	}
	
	function select_dealer()
	{
		//$sql = "select * from `$this->tablename` where `status`='0' and `user_type`='1'";//echo $sql;die();
		$query = $this->db->get_where('users',array('status' => '0', 'user_type' => '1'));
		$res = $query->result_array();
		return $res;
	}
	
	function setting()
	{
		$query=$this->db->get('settings');
		$arr=$query->result_array();	
		return $arr[0];
	}
	
	function get_header_banner($page='')
	{
		$arr=array('home','sell','buy','contactus','news');
		if(in_array($page,$arr))
				$str =$page.'_header';
		else
				$str ='home_header';	
		
		$query=$this->db->query("select * from banners where page='$str' and status=1 order by rand() limit 0,4 ");
		return $query->result_array();	
	}
	
	function model_name($id)
	{
		$query = $this->db->get_where('brand',array('brandid' => $id));
		$res = $query->row_array();
		return $res['brandname'];
	}
	
	function category_name($id)
	{
		$query = $this->db->get_where('category',array('catid' => $id));
		$res = $query->row_array();
		return $res['catname'];
	}
	
	function is_dealer($uid)
	{
		$query=$this->db->get_where('users',array('userid' => $uid, 'status' => 0, 'user_type' => 1));
		$arr=$query->result_array();
		if(count($arr)>0)
			return true;
		else
			return false;
	}
}

?>