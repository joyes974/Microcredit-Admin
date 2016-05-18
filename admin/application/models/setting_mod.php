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

class Setting_mod extends Model {

    function update_admin()
    {
        $data=array('username'=>$_REQUEST['admin_username'],'email'=>$_REQUEST['admin_email']);
        $this->db->update('admin',$data,array('id'=>$this->session->userdata('admin_id')));
        return true;
    }
    function get_admin()
    {
        $admin_id=$this->session->userdata('admin_id');
        $query=$this->db->query("select * from admin where id='$admin_id'");
        return $query->row_array();
    }
    function check_password($pass)
    {
        $pass=md5($pass);
        $admin_id=$this->session->userdata('admin_id');
        $query=$this->db->query("select * from admin where password='$pass'");
        return $query->num_rows();
    }
    function change_password($pass)
    {
        $pass=md5($pass);
        $data=array('password'=>$pass);
        $this->db->update('admin',$data,array('id'=>$this->session->userdata('admin_id')));
        return true;
    }
	
	function all_setting()
	{
		$query = $this->db->get("setting");
		return $query->result_array();
	}
	
	
	
}

?>
