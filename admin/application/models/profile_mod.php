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

class Profile_mod extends Model {

	function save($eid)
	{
		$data=array(	'fullname' => $_REQUEST['fullname'],							
						'fathersname' => $_REQUEST['fathersname'],
						'motthersname' => $_REQUEST['motthersname'],
						'pres_address' => $_REQUEST['pres_address'],
						'pst_address' => $_REQUEST['pst_address'],
						'phone' => $_REQUEST['phone'],
						'email' => $_REQUEST['email'],
						'dist' => $_REQUEST['dist'],
						'salary' => $_REQUEST['salary'],
						'password'     => $data['password'],
						'status'  => 'Active',
						'register_date'=> $_REQUEST['register_date']
					);
		$this->db->update('emp_details', $data, array('id' => $eid)); 
	}
}

?>