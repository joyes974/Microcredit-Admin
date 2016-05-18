<?php $this->load->view('header');  ?>
<table width="67%" border="0" cellpadding="4" cellspacing="4" align='center' style="border:#bbbbbb 1px solid">
   <tr>
		<td colspan='2' align='center'><h2>Affiliate User Details</h2></td>
   </tr>
   <tr>
		<td width="15%">
			<b>Member ID :</b>
		</td>
		<td>
			<?=$user_info['id']?> 				
		</td>
   </tr>
   <tr>
		<td valign='top'>
			<b>Email:</b>
		</td>
		<td id='category'>
			<?=$user_info['email']?> 
		</td>
   </tr>
   <tr>
		<td valign='top'>
			<b>Password:</b>
		</td>
		<td>
			<?=$user_info['password']?> 
		</td>
   </tr>
   <tr>
		<td >
			<b>Name :</b>
		</td>
		<td>
			<?=$user_info['first_name']?> <?=$user_info['last_name']?> 
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Address :</b>
		</td>
		<td>
			<?=$user_info['address']?> <?=$user_info['address2']?>, <br />
			<?=$user_info['city']?> <?=$user_info['zip']?>, <?=$user_info['state']?> 
		</td>
	</tr>
	<tr>
		<td >
			<b>Name on check :</b>
		</td>
		<td>
			<?=$user_info['name_on_check']?> 
		</td>
	</tr>
	<tr>
		<td >
			<b>Website URL :</b>
		</td>
		<td>
			<?=$user_info['website_url']?> 
		</td>
	</tr>
	<tr>
		<td >
			<b>Status :</b>
		</td>
		<td>
			<?=$user_info['status']?> 
		</td>
	</tr>
	<tr>
		<td >
			<b>Register Date :</b>
		</td>
		<td>
			<?=show_date($user_info['register_date']);?> 
		</td>
	</tr>
</table>
<?php $this->load->view('footer');  ?>