<?php
class Ajax extends Controller {
    function Ajax()
    {
        parent::Controller();
        //$this->common->is_login(1);
        $this->load->model('ajax_mod');
    }
    
    function check_username()
    {
       $username=$this->ajax_mod->check_username($_REQUEST['username']);
       echo $username;
    }
    function move_trash_inbox()
    {
        $inbox_data=$this->ajax_mod->move_trash_inbox($_REQUEST['inbox_id']);
        echo $inbox_data;
    }
    function move_trash_outbox()
    {
        $outbox_data=$this->ajax_mod->move_trash_outbox($_REQUEST['outbox_id']);
        echo $outbox_data;
    }
    function delete_msg()
    {
        $trash_data=$this->ajax_mod->delete_msg($_REQUEST['trash_id']);
        echo $trash_data;
    }

    
   /* function category_product()
    {
        $data=$this->ajax_mod->category_product($_REQUEST['perpage'],$_REQUEST[type],$_REQUEST['cid'],$_REQUEST['cpage']);
        $this->load->view('ajax/all_category_product',$data);    
    }
    
    function change_product_info()
    {
        $product_info = $this->ajax_mod->change_product_info($_REQUEST['pid']);
        make_json($product_info);
    }
    
    function add_offer_product()
    {
        $this->ajax_mod->add_offer_product($_REQUEST[pid]);
        $this->all_offer_product();
    }
    
    function del_offer_product()
    {
        $this->ajax_mod->del_offer_product($_REQUEST[opid]);
        $this->all_offer_product();
    }
    
    function del_offer_file()
    {
        $this->ajax_mod->del_offer_file($_REQUEST[id]);
    }
    
    function all_offer_product()
    {
        $arr=$this->ajax_mod->offer_product();
        $data['offer_product']=$arr['data'];
        $this->load->view('ajax/all_offer_product',$data);
    }
    
    function product_by_category_order()
    {                
        $data=$this->ajax_mod->category_product($_REQUEST['perpage'],$_REQUEST[type],$_REQUEST['cid'],$_REQUEST['cpage']);
        $this->load->view('ajax/all_product_order',$data);    
    }
    
    function add_order_product()
    {
        $this->ajax_mod->add_order_product($_REQUEST[pid]);
        $this->all_order_product();
    }
    
    function del_order_product()
    {
        $this->ajax_mod->del_order_product($_REQUEST[opid]);
        $this->all_order_product();
    }    
    
    function all_order_product()
    {
        $arr=$this->ajax_mod->order_product();
        $data['offer_product']=$arr['data'];
        $this->load->view('ajax/all_order_product',$data);
    }
    
    function del_order_file()
    {
        $this->ajax_mod->del_order_file($_REQUEST[id]);
    }
    
    function delete_tmp_image()
    {
        $this->ajax_mod->delete_tmp_image($_REQUEST[id]);
    }
    function del_product_file()
    {
        $this->ajax_mod->del_product_file($_REQUEST[id]);
    }
    
    function archive_message()
    {
        $this->ajax_mod->add_archive_message($_REQUEST[id]);
    }
    
    function delete_message()
    {
        $this->ajax_mod->delete_message($_REQUEST[id]);
    }
    
    function stock_product()
    {                
        $data=$this->ajax_mod->category_product($_REQUEST['perpage'],$_REQUEST[type],$_REQUEST['cid'],$_REQUEST['cpage']);
        $this->load->view('ajax/stock_product',$data);    
    }
    
    function sales_product()
    {
        $this->load->model('warehouse_mod');    
        $data=$this->ajax_mod->category_product($_REQUEST['perpage'],$_REQUEST[type],$_REQUEST['cid'],$_REQUEST['cpage']);
        $this->load->view('ajax/sales_product',$data);    
    }
    
    function category_nav()
    {
        $nav=$this->ajax_mod->category_nav($_REQUEST['cid']);
        echo $nav;    
    }    */
    
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
