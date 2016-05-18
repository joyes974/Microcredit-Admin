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

class Ajax_mod extends Model {

   /* function category_product($total_page,$type,$cid,$cpage)
    {
        $arr=array();
        $page=$total_page*$cpage;    
        $k=$this->common->all_product($cid,$k=0,$level=0);
        $data['product']=$this->common->product;
        for($i=$page,$l=0;$l<$total_page;$i++,$l++)
        {
            if($i==$k)
                break;
            $arr[$l]=$this->common->product[$i];
        }
        $data['product']=$arr;
        $data['tp']=ceil($k/$total_page);
        return $data;
    }
    
    function change_product_info($pid)
    {
        $data = array( 'quantity' => $_REQUEST['quantity'],
                       'max_discount' => $_REQUEST['discount']
                    );
        $this->db->update('product',$data,"id =$pid");
        
        $query=$this->db->get_where('product',array('id' => $pid));
        $arr=$query->result_array();
        return $arr[0];
    }
    
    function add_offer_product($pid)
    {
        $product = $this->common->product_info($pid);
        $data= array( 'tid' => $this->session->userdata('oid'),
                      'product_id' => $pid,
                      'quantity' => $product['quantity'],
                      'discount' => $product['max_discount'],
                      'total' => $product['sell']
                    );        
        $this->db->insert('offer_product',$data);
    }
    
    function del_offer_product($opid)
    {
        $this->db->delete('offer_product',array('id' => $opid));
    }
    
    function del_offer_file($id)
    {
        $query=$this->db->get_where('offer_file_link',array('id' => $id));
        $file=$query->result_array();
        
        $this->delete_file($file[0]['file_id']);
        $this->db->delete('offer_file_link',array('id' => $id));
    }
    
    function delete_file($file_id)
    {
        $query=$this->db->get_where('files',array('id' => $file_id));
        $file=$query->result_array();
        unlink(site_dir().'images/files/'.$file[0]['file_path']);
        $this->db->delete('files',array('id' => $file_id));
    }
    
    function delete_image($file_id)
    {
        $query=$this->db->get_where('images',array('id' => $file_id));
        $file=$query->result_array();
        unlink(site_dir().'images/photo/'.$file[0]['image_path']);
        unlink(site_dir().'images/photo/th/'.$file[0]['image_path']);
        $this->db->delete('images',array('id' => $file_id));
    }
    
    function offer_product()
    {
        $tid = $this->session->userdata('oid');
        $query=$this->db->query("select offer_product.id as opid,
                                        offer_product.quantity as quantity,
                                        offer_product.discount as discount,
                                        product.cwarning as cwarning,
                                        product.sell as sell,
                                        offer_product.total as total,
                                        product.title as title,
                                        product.cost as cost,
                                        product.id as pid
                                            from offer_product,product where 
                                                                offer_product.tid = $tid and 
                                                                offer_product.product_id = product.id
                                ");
        $arr = $query->result_array();
        $array['data'] = $arr;
        $array['count_product'] = count($arr);
        return $array;
    }
    
    function order_product()
    {
        $tid = $this->session->userdata('oid');
        $query=$this->db->query("select order_product.id as opid,
                                        order_product.quantity as quantity,
                                        order_product.discount as discount,
                                        order_product.total as total,
                                        product.title as title,
                                        product.cost as cost,
                                        product.id as pid
                                            from order_product,product where 
                                                                order_product.tid = $tid and 
                                                                order_product.product_id = product.id
                                ");
        $arr = $query->result_array();
        $array['data'] = $arr;
        $array['count_product'] = count($arr);
        return $array;
    }
    
    function add_order_product($pid)
    {
        $product = $this->common->product_info($pid);
        $data= array( 'tid' => $this->session->userdata('oid'),
                      'product_id' => $pid,
                      'quantity' => $product['quantity'],
                      'discount' => $product['max_discount'],
                      'total' => $product['cost']
                    );        
        $this->db->insert('order_product',$data);
    }
    
    function del_order_product($opid)
    {
        $this->db->delete('order_product',array('id' => $opid));
    }
    
    function del_order_file($id)
    {
        $query=$this->db->get_where('order_file_link',array('id' => $id));
        $file=$query->result_array();
        
        $this->delete_file($file[0]['file_id']);
        $this->db->delete('order_file_link',array('id' => $id));
    }
    
    function delete_tmp_image($id)
    {
        $query=$this->db->get_where('product_image_link',array('id' => $id));
        $file=$query->result_array();
        
        $this->delete_image($file[0]['image_id']);
        $this->db->delete('product_image_link',array('id' => $id));
    }
    
    function del_product_file($id)
    {
        $query=$this->db->get_where('product_file_link',array('id' => $id));
        $file=$query->result_array();
        
        $this->delete_file($file[0]['file_id']);
        $this->db->delete('product_file_link',array('id' => $id));
    }
    
    function add_archive_message($id)
    {
        $st=explode('_',$id);
        for($i=0;$i<count($st)-1;$i++)
        {
                $id=$st[$i];
                $data = array(
                               'archive' => 1
                            );
                $this->db->update('pm', $data, array('id' => $id));
        }
    }
    
    function delete_message($id)
    {
        $st=explode('_',$id);
        for($i=0;$i<count($st)-1;$i++)
        {
                $id=$st[$i];
                $data = array(
                               'receiver_delete' => 1
                            );
                $this->db->update('pm', $data, array('id' => $id));
        }
    }
    
    function category_nav($cid)
    {
        $this->common->category_nav($cid);
        $cat=array_reverse($this->common->category);
        return implode(' > ',$cat);
    }    */
     function check_username($username)
    {

        $query=$this->db->get_where('user',array('username' => $username));
        $row=$query->num_rows();

        return $row;
    }
    function move_trash_inbox($inbox_id)
    {
        for($i=0;$i<count($inbox_id);$i++)
        {
            $data = array('receiver_status'=>'Trash');
            $this->db->update('pm', $data, array('id' =>$inbox_id[$i]));
        }
        $id=$this->session->userdata('userid');
        $query=$this->db->query("select * from pm where receiver=$id and receiver_status='Active' order by created desc");
        $inbox=$query->result_array();
        $str='
            <table width="100%" border="0">';
        $str.="<tr><td>
            <table  cellpadding='3' cellspacing='3' border='0' align='center'>
                <tr align='center'>
                    <td class='msg'><b>
                        ".count($inbox_id)."</b> messege has been move to trash box.
                    </td>
                </tr>
            </table>
            </td></tr>";
            
            //echo count($inbox);
            for($i=0;$i<count($inbox);$i++)
            {
                $user=$this->common->user_data($inbox[$i]['sender']);
            $str.= "<tr>
                    <td valign='top'>
                        <table width='100%' cellpadding='3' cellspacing='3' border='0' style='border-bottom:#E1E1E1 1px solid' class='b_11'>
                        <tr  id='row_($i+1)'>
                            <td width='20' style='padding-left:15px'><INPUT type='checkbox' value='".$inbox[$i]['id']."'id='selecteditem_($i+1)' name='inbox_id[]' onclick='change_background(".($i+1).",this.checked);'></td>
                            <td width='150'>From:<a href=''>".$user[0]['first_name']."&nbsp;".$user[0]['last_name']."</a><br><font color='#777777' size='1'>".date('F j,Y',$inbox[$i]['created'])." at ".date('g:i a',$inbox[$i]['created'])."</font></td>
                            <td><a style='color:#6D84B4' href='action=message&message=read&msg_id=&redirect=inbox'>".$inbox[$i]['subject']."</a><br><a href='action=message&message=read&msg_id='>".substr($inbox[$i]['body'],0,50)."</a></td>
                        </tr>
                        </table>
                    </td>
                </tr>";
                $str.="<input type='hidden' id='loop' name='loop' value='".count($inbox)."'>";
        }
    $str.="
    </table>
    ";
    return $str;
    }

function move_trash_outbox($outbox_id)
    {
        for($i=0;$i<count($outbox_id);$i++)
        {
            $data = array('sender_status'=>'Trash');
            $this->db->update('pm', $data, array('id' =>$outbox_id[$i]));
        }
        $id=$this->session->userdata('userid');
        $query=$this->db->query("select * from pm where sender=$id and sender_status='Active' order by created desc");
        $outbox=$query->result_array();
        $str='
            <table width="100%" border="0">';
        $str.="<tr><td>
            <table  cellpadding='3' cellspacing='3' border='0' align='center'>
                <tr align='center'>
                    <td class='msg'><b>
                        ".count($outbox_id)."</b> messege has been move to trash box.
                    </td>
                </tr>
            </table>
            </td></tr>";

            //echo count($inbox);
            for($i=0;$i<count($outbox);$i++)
            {
                $user=$this->common->user_data($outbox[$i]['receiver']);
            $str.= "<tr>
                    <td valign='top'>
                        <table width='100%' cellpadding='3' cellspacing='3' border='0' style='border-bottom:#E1E1E1 1px solid' class='b_11'>
                        <tr  id='row_($i+1)'>
                            <td width='20' style='padding-left:15px'><INPUT type='checkbox' value='".$outbox[$i]['id']."'id='selecteditem_($i+1)' name='outbox_id[]' onclick='change_background(".($i+1).",this.checked);'></td>
                            <td width='150'>To:<a href=''>".$user[0]['first_name']."&nbsp;".$user[0]['last_name']."</a><br><font color='#777777' size='1'>".date('F j,Y',$outbox[$i]['created'])." at ".date('g:i a',$inbox[$i]['created'])."</font></td>
                            <td><a style='color:#6D84B4' href='action=message&message=read&msg_id=&redirect=inbox'>".$outbox[$i]['subject']."</a><br><a href='action=message&message=read&msg_id='>".substr($outbox[$i]['body'],0,50)."</a></td>
                        </tr>
                        </table>
                    </td>
                </tr>";
                $str.="<input type='hidden' id='loop' name='loop' value='".count($outbox)."'>";
        }
    $str.="
    </table>
    ";
    return $str;
    }
    function delete_msg($trash_id)
    {   if(count($trash_id)>0)
    {
        $id=$this->session->userdata('userid');
        for($i=0;$i<count($trash_id);$i++)
        {
                $data = array('receiver_status'=>'Delete','sender_status'=>'Delete');
                $this->db->update('pm', $data, array('id' =>$trash_id[$i]));
        }
        $query=$this->db->query("select * from pm where (receiver='$id' and receiver_status='Trash' ) or ( sender='$id' and  sender_status='Trash')");
        $trash=$query->result_array();
        $str='
            <table width="100%" border="0">';
        $str.="<tr><td>
            <table  cellpadding='3' cellspacing='3' border='0' align='center'>
                <tr align='center'>
                    <td class='msg'><b>
                        ".count($trash_id)."</b> messege has been deleted.
                    </td>
                </tr>
            </table>
            </td></tr>";

            //echo count($inbox);
            for($i=0;$i<count($trash);$i++)
            {
                if($this->session->userdata('userid')==$trash[$i]['sender']){
                    $user=$this->common->user_data($trash[$i]['sender']);
                    $u_identify="From";
                    }
                 else
                {
                    $user=$this->common->user_data($trash[$i]['receiver']);
                    $u_identify="To";
                }
            $str.= "<tr>
                    <td valign='top'>
                        <table width='100%' cellpadding='3' cellspacing='3' border='0' style='border-bottom:#E1E1E1 1px solid' class='b_11'>
                        <tr  id='row_($i+1)'>
                            <td width='20' style='padding-left:15px'><INPUT type='checkbox' value='".$trash[$i]['id']."'id='selecteditem_($i+1)' name='outbox_id[]' onclick='change_background(".($i+1).",this.checked);'></td>
                            <td width='150'>".$u_identify.":<a href=''>".$user[0]['first_name']."&nbsp;".$user[0]['last_name']."</a><br><font color='#777777' size='1'>".date('F j,Y',$trash[$i]['created'])." at ".date('g:i a',$trash[$i]['created'])."</font></td>
                            <td><a style='color:#6D84B4' href='action=message&message=read&msg_id=&redirect=inbox'>".$trash[$i]['subject']."</a><br><a href='action=message&message=read&msg_id='>".substr($trash[$i]['body'],0,50)."</a></td>
                        </tr>
                        </table>
                    </td>
                </tr>";
                $str.="<input type='hidden' id='loop' name='loop' value='".count($trash)."'>";
        }
    $str.="
    </table>
    ";
    return $str;
}
    }
}


?>
