<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"  />
<meta http-equiv="Content-Language" content="en-us" />
 <?=$this->common->setting()?>
<TITLE><?=SITE_NAME?> :: Administration</TITLE>

<meta name="KeyWords" content="">
<meta name="Description" content="">
<meta http-equiv="Content-Language" content="en-us" />
<meta name="language" content="en">
<meta http-equiv="content-language" content="en">

<link href="<?=site_url()?>../css/admin.css" rel="stylesheet" type="text/css">
<link href="<?=site_url()?>../css/header.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="<?=site_url()?>css/superfish.css" media="screen">
<script language="javascript" src="<?=site_url()?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?=site_url()?>js/hoverIntent.js"></script>
<script type="text/javascript" src="<?=site_url()?>js/superfish.js"></script>
<script type="text/javascript">
	// initialise plugins
	jQuery(function(){
		jQuery('ul.sf-menu').superfish();
	});
</script>

</head>
<BODY>
    <div id="border-top">
        <div>
            <div>
                <span class="title" ><font color="#ffffff" face="Arial Narrow"><?=SITE_NAME?></font> Administration</span>
                <span class="admin"><?php if($this->session->userdata('admin_id')){?>Current User: <?=$this->session->userdata('admin_username')?><?php }?></span>
                <span class="date"></span>
            </div>
        </div>
    </div>
    <div>
        <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#416E1F" border="0">
        <tr>
            <td height="20" align="center" colspan="3" style="text-align:center;">
				<?if($this->common->check_admin_login()):?>
				<ul class="sf-menu">
					<li class="current">
						<a href='<?=site_url()?>setting'>Setting</a>
						<ul>
							<li >
								<a href='<?=site_url()?>setting'>Setting</a>
							</li>
							<li>
								<a href='<?=site_url()?>setting/admin_setting'>Admin Setting</a>
							</li>						
						</ul>
					</li>
					<li>
						<a href='<?=site_url()?>writer' >Employee</a>
						<ul>
							<li>
								<a href='<?=site_url()?>writer' >Employee</a>
							</li>
							<li>
								<a href='<?=site_url()?>writer/add'>Add Employee</a>
							</li>	
							<li>
								<a href='<?=site_url()?>writer/search'>Search Employee</a>
							</li>									
						</ul>
					</li>
					<li>
						<a href='<?=site_url()?>user' >User</a>
						<ul>
							<li>
								<a href='<?=site_url()?>user' >User</a>
							</li>
							<li>
								<a href='<?=site_url()?>user/add'>Add User</a>
							</li>	
							<li>
								<a href='<?=site_url()?>user/search'>Search User</a>
							</li>									
						</ul>
					</li>
					<li>
						<a href='<?=site_url()?>' >Loan Application </a>
						
					</li>
					<li>
						<a href='<?=site_url()?>' >Loan Details </a>
						<ul>
							<li>
								<a href='<?=site_url()?>' >Skim 1</a>
							</li>
							<li>
								<a href='<?=site_url()?>' >Skim 2</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?=site_url()?>" >Monthly User Collection</a>
						<ul>
							<li>
								<a href='<?=site_url()?>' >Total Deposite</a>
							</li>
							<li>
								<a href='<?=site_url()?>' >Total Payment</a>
							</li>
						</ul>
					</li>
					<li>
						<a href='<?=site_url()?>/logout'>Logout</a>
					</li>	
				</ul>
				<?endif;?>
            </td>
		</tr>
        </table>
    </div>
    <div id="content-box">
		<TABLE WIDTH="100%" height="400" BORDER=0 CELLPADDING=1 CELLSPACING=0 ALIGN="center" bgcolor="#FFFFFF">
		<tr>
			<td valign="top">
				<table cellpadding="5" cellspacing="5" width="100%" bgcolor="#FFFFFF" border = '0'>
				<tr height="370">

						</table>
					</td>
					<td align="center" valign="top">