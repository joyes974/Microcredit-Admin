<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    //REDIRECT PAGE USING JAVASCRIPT
    function redirect($link)
    {
        echo "<script language=Javascript>
                document.location.href='".base_url()."$link';
                </script>";
    }
    
    function not_login_page()
    {
        return 'login';
    }

    function generate_captcha()
    {        
        $value=md5(rand(2,99999999));
        $vals = array(
                    'word'         => substr(md5($value),15,8),
                    'img_path'     => './captcha/',
                    'img_url'     => site_url().'captcha/',
                    'img_width'     => '200',
                    'img_height' => 30,
                    'expiration' => 7200
                );
        $arr=create_captcha($vals);
        return $arr;
    }
    
    function chk_url($link)
    {
        if(strpos($link, 'http://')===false)
            return 'http://'.$link;
        else
            return $link;
    }
    function pr($arr)
    {
        echo"<pre>";
        print_r($arr);
        echo"</pre>";
    }
    function check_email($email)
	{
		$email_regexp = "^([-!#\$%&'*+./0-9=?A-Z^_`a-z{|}~])+@([-!#\$%&'*+/0-9=?A-Z^_`a-z{|}~]+\\.)+[a-zA-Z]{2,4}\$";
		return eregi($email_regexp, $email);
	}
	
	function get_date_time()
	{
		$date_time=date("Y-m-d h:i:s");
		return $date_time;
	}
	
	function show_date($date)
	{
		$arr = explode(" ",$date);
		if(count($arr)>1)
		{
			$str = explode("-",$arr[0]);
			return $str[1]."/".$str[2]."/".$str[0]." ".$arr[1];
		}
		else
		{
			$str = explode("-",$arr[0]);
			return $str[1]."/".$str[2]."/".$str[0];
		}
	}
	
?>
