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
	
	function not_elogin_page()
	{
		return 'emplog';
	}
	function generate_captcha()
	{		
		$value=md5(rand(2,99999999));
		$vals = array(
					'word'		 => substr(md5($value),15,8),
					'img_path'	 => './captcha/',
					'img_url'	 => site_url().'captcha/',
					'img_width'	 => '200',
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

	
?>