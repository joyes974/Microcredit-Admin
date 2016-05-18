<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package        CodeIgniter
 * @author        ExpressionEngine Dev Team
 * @copyright    Copyright (c) 2006, EllisLab, Inc.
 * @license        http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since        Version 1.0
 * @filesource
 */

class Common extends Model {
    function check_admin_login($is_redirect='')
    {
        $username=$this->session->userdata('admin_username');
        $password=$this->session->userdata('admin_password');

        if($username==''&&$password=='')
        {
            if($is_redirect==1)
                redirect('');
            return false;
        }
		else
			return true;

    }
    
    function setting()
    {
        $query=$this->db->query("select * from setting");
        $con=$query->result_array();
       // pr($con);
        foreach($con as $c)
        {
            define(strtoupper($c['setting_key']),$c['value']);
        }
    }
	
	function get_setting($key)
	{
		$qrysel1 = "select value from setting where setting_key='$key'";
		$ressel1 = mysql_query($qrysel1);
		$objsel1 = mysql_fetch_array($ressel1);
		return $objsel1['value'] ;
	}
	
		
	function count_unverification()
	{
		$sql="select count(*) as total from member_verify where is_verify_url =0 and verify_url!=''";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		
		$sql="select count(*) as total from member_verify where is_verify_address =0 and address!=''";
		$query = $this->db->query($sql);
		$row1 = $query->row_array();
		
		return $row['total']+$row1['total']+0;
	}
	
	function count_pending_article()
	{
		$query = $this->db->query("select count(*) as total from article where 	status='Pending'");
		$arr   = $query->row_array();
		return $arr['total']+0;
	}
	
	function count_pending_topics()
	{
		$query = $this->db->query("select count(*) as total from article_topic where status='Pending'");
		$arr   = $query->row_array();
		return $arr['total']+0;
	}
	
	function get_emp_data($id)
	{
		$query = $this->db->get_where('emp_details',array('id' => $id));
		$arr=$query->result_array();	
		return $arr[0];
	}
	function get_use_data($id)
	{
		$query = $this->db->get_where('user',array('id' => $id));
		$arr=$query->result_array();	
		return $arr[0];
	}
}

?>
