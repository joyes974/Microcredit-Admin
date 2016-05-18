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

class Search_mod extends Model 
{

	var $catid;
	var $make;
	var $model;
	var $private_dealer;
	var $min_price;
	var $max_price;
	var $min_year;
	var $max_year;
	var $total_row;
	var $listing_per_page=50;
	var $page;	
	function search()
	{
		
		if($_REQUEST['catid']!="") 
		{ 
		 $this->catid = "ads.catid ='$_REQUEST[catid]'";
		} 
		else 
		{ 
		 $this->catid = "ads.catid like '%%'";
		}
		  if($_REQUEST['make']!="") 
		{ 
		  $this->make = "`make`='$_REQUEST[make]'";
		} 
		else 
		{ 
		 $this->make = "`make` like '%%'";
		}                 
		if($_REQUEST['model']!="") 
		{ 
		  $this->model = "`model`='$_REQUEST[model]'";
		} 
		else 
		{ 
		 $this->model = "`model` like '%%'";
		}
		if($_REQUEST['private_dealer']!="") 
		{ 
		  $this->private_dealer = "`private_trade`='$_REQUEST[private_trade]'";
		} 
		else 
		{ 
		 $this->private_dealer = "`private_trade` like '%%'";
		}
		if($_REQUEST['min_price']!="") 
		{                  
		  $this->min_price = "`price` >= '$_REQUEST[min_price]'";                 
		} 
		else 
		{                  
		 $this->min_price = "`price` >= '0'";                 
		}                 
		if($_REQUEST['max_price']!="") 
		{                  
		  $this->max_price = "`price` <= '$_REQUEST[max_price]'";
		} 
		else 
		{                  
			$this->max_price = "`price` <= '10000000000'";                 
		}                 
		if($_REQUEST['min_year']!="") 
		{                  
		  $this->min_year = "and `year` >= '$_REQUEST[min_year]'";                 
		}               
		if($_REQUEST['max_year']!="") 
		{                  
		  $this->max_year = "and `year` <= '$_REQUEST[max_year]'";
		}
		if($_REQUEST['state']!='')
		{
			$location = "and location='$_REQUEST[state]'";
		}
		if($_REQUEST['dealer']!='' && $_REQUEST['dealer']!='0' )
		{
			$dealer=" and userid = '$_REQUEST[dealer]'";
		}
		
	   $sql= "select * from `ads` where $this->catid and $this->make and  $this->model and  $this->private_dealer and  $this->min_price and  $this->max_price $this->min_year  $this->max_year and status = 0 $location $dealer";             
		$query=$this->db->query($sql);		
		$this->total_row=$query->num_rows();
		
		
		if($_REQUEST['page']!='')
            $this->page = $_REQUEST['page'];
        else
            $this->page = 1;
		
        $start= ($this->page-1)*$this->listing_per_page;
		$db_name='ads';
		
		if($_REQUEST['make_order']!='')
		{
			$sorting='and brand.brandid = ads.model  order by brand.brandname '.$_REQUEST['make_order'];
			$db_name .=',brand';
		}
		
		else if($_REQUEST['category_order']!='')
		{
			$sorting='and category.catid = ads.catid  order by category.catname '.$_REQUEST['category_order'];
			$db_name .=',category';
		}
		
	    $sql= "select * from $db_name where $this->catid and $this->make and  $this->model and  $this->private_dealer and  $this->min_price and  $this->max_price $this->min_year $this->max_year and ads.status = 0 $location  $dealer $sorting limit $start, $this->listing_per_page";//echo $sql;die();                 
		$query=$this->db->query($sql);
		return $query->result_array();
	}	
	
	function save_search()
	{
		$userid=$this->session->userdata('userid');
		$data = array(
               'userid' => $userid ,
               'catid' => $_REQUEST['catid'] ,
               'model' => $_REQUEST['model'],
			   'dealer_type' => $_REQUEST['private_deler'] ,
               'min_price' => $_REQUEST['min_price'],
			   'max_price' => $_REQUEST['max_price'] ,
               'min_year' => $_REQUEST['min_year'],
			   'max_year' => $_REQUEST['max_year'] ,
               'state' => $_REQUEST['state'],
			   'dealer' => $_REQUEST['dealer'],
			   'state' => $_REQUEST['state']
            );
		$this->db->insert('save_search', $data); 
	}
	
	function paging()
	{
		$tpage = ceil($this->total_row/$this->listing_per_page);
        if($tpage==0) $spage=$tpage+1;
        else $spage = $tpage;
		
        $data['info'] = "<br>Page <b>$this->page</b> of <b>$spage</b>";
		
		$data['next_page']=($this->page==$spage)?'':"<a href='javascript:search(".($this->page+1).")'>NEXT</a>";
		$data['previous_page']=($this->page==1)?'':"<a href='javascript:search(".($this->page-1).")'>PREVIOUS</a>";
		return $data;
	}
	
	function count_photo($ads_id)
	{
		$query=$this->db->get_where('images', array('adsid' => $ads_id));	
		return $query->num_rows();
	}
	
	function seller_type($userid)
	{
		$query=$this->db->get_where('users', array('userid' => $userid));	
		$arr=$query->result_array();
		if($arr[0]['user_type']=='1')
			return 'Dealer';
		else
			return 'Private';
	}
	
	
}

?>