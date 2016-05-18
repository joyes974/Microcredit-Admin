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

class Minfo_mod extends Model 
{
	
	
	
	
	
	
	
	function get_m_collection(){
	   $query_str = "SELECT * FROM m_collection";
	   
	   $result = $this->db->query($query_str);
       
	   return $result;
	   }
	
	
	
}

?>