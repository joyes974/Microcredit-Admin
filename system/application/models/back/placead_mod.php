<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package                CodeIgniter
 * @author                ExpressionEngine Dev Team
 * @copyright        Copyright (c) 2006, EllisLab, Inc.
 * @license                http://codeigniter.com/user_guide/license.html
 * @link                http://codeigniter.com
 * @since                Version 1.0
 * @filesource
 */

class Placead_mod extends Model {

        function save_ads()
        {
        $dtadded = date("Y-m-d");
        $expdate  = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+28, date("Y")));//echo $expdate;die();
        $deldate  = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+48, date("Y"))); //echo $deldate;die();

        $uid=$this->session->userdata('userid');
        $data=array(
                                        'catid' => $_REQUEST['catid'],
                                        'userid' => $uid,
                                        'model'        => $_REQUEST['model'],                                
                                        'variant' => $_REQUEST['variant'],                                                        
                                        'year' => $_REQUEST['year'],
                                        'price' => $_REQUEST['price'],
                                        'other_details' => $_REQUEST['otherdetails'],
                                        'fuel_type' => $_REQUEST['fuel_type'],
                                        'phoneno' => $_REQUEST['phoneno'],
                                        'email' => $_REQUEST['email'],
                                        'location' => $_REQUEST['county'],
                                        'private_trade' => $_REQUEST['private_trade'],
                                        'other_details2' => $_REQUEST['otherdetails'],
                                        'web_link' => $_REQUEST['web_link'],
                                        'status' => 3,
                                        'dtadded' => $dtadded,
                                        'dtend' => $expdate,
                                        'remove_date' => $deldate
                                );
        $this->db->insert('ads', $data);
    return mysql_insert_id();        
        }
        
        function save_image($ads_id)
        {                
                $config['upload_path'] = './images/ads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']        = '2000';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';
                
                $this->load->library('upload', $config);
                
                for($i=1;$i<=5;$i++)
                {
                        $field_name = "image".$i;
                        if ( ! $this->upload->do_upload($field_name))
                        {
                                $error = array('error' => $this->upload->display_errors());                                
                        }        
                        else
                        {
                                $data = $this->upload->data();
                                
                                
                                
                                $this->load->library('zthumb');
                $this->zthumb->createThumb($data['file_name'],$data['file_name'],'./images/ads/','./images/ads/big/',300,300,true);
                                
                                $this->load->library('zthumb');
                $this->zthumb->createThumb($data['file_name'],$data['file_name'],'./images/ads/','./images/ads/th/',100,100,true);
                                
                                $data=array(
                                                'adsid' => $ads_id,
                                                'image' => $data['file_name']
                                        );
                                        
                                $fname = 'img'.$i;
                                if($_REQUEST[$fname]!='')
                                {                
                                        $this->delete_image($_REQUEST[$fname]);
                                        $this->db->update('images', $data,"imageid = ".$_REQUEST[$fname]);
                                }
                                else
                                        $this->db->insert('images', $data);
                        }
                }
        }
        
        function edit_ads($ads_id)
        {
                $dtedit = date("Y-m-d");
                
                $uid=$this->session->userdata('userid');
                $data=array(
                                                'catid' => $_REQUEST['catid'],        
                                                'model'        => $_REQUEST['model'],                                                
                                                'variant' => $_REQUEST['variant'],                                                        
                                                'year' => $_REQUEST['year'],
                                                'price' => $_REQUEST['price'],
                                                'other_details' => $_REQUEST['otherdetails'],
                                                'fuel_type' => $_REQUEST['fuel_type'],
                                                'phoneno' => $_REQUEST['phoneno'],
                                                'email' => $_REQUEST['email'],
                                                'location' => $_REQUEST['county'],
                                                'private_trade' => $_REQUEST['private_trade'],
                                                'other_details2' => $_REQUEST['otherdetails'],
                                                'web_link' => $_REQUEST['web_link'],
                                                'update_date' => $dtedit
                                        );
                $this->db->update('ads', $data,"adsid = $ads_id");
        }
        
        function update_ads_status($ads_id)
        {
                $data=array('status' => 1);
                $this->db->update('ads', $data,"adsid = $ads_id");
        }
        
        function get_ads_data($ads_id)
        {
                $query = $this->db->get_where('ads',array('adsid' => $ads_id));
        $ads=$query->result_array();                 
                return $ads[0];
        }
        
        function get_image_data($ads_id)
        {
                $this->db->order_by("imageid", "asc"); 
                $query = $this->db->get_where('images',array('adsid' => $ads_id));
        $ads=$query->result_array();                 
                return $ads;
        }
        
        function delete_all_image($ads_id)
        {
                $iarray=$this->get_image_data($ads_id);
                for($j=0;$j<count($iarray);$j++)
                {
                        $this->delete_image($iarray[$j]['imageid'],$iarray[$j]['image']);
                }
        }
        
        function delete_image($id)
        {
                $query = $this->db->get_where('images',array('imageid' => $id));
        $img=$query->result_array();                 
                @unlink(site_dir().'images/ads/'.$img[0]['image']);
                @unlink(site_dir().'images/ads/big/'.$img[0]['image']);
                @unlink(site_dir().'images/ads/th/'.$img[0]['image']);
        }
        
        function delete_image_from_db($id)
        {
                $this->delete_image($id);
                $this->db->delete('images',array('imageid' => $id));
        }
        
        function save_payment($ads_id)
        {
                $data=array(
                                                'location' => $_REQUEST['location'],        
                                                'listing_type'        => $_REQUEST['listing_type'],                                                
                                                'milage' => $_REQUEST['milage']
                                        );
                $this->db->update('ads', $data,"adsid = $ads_id");
        }
        
}

?>
