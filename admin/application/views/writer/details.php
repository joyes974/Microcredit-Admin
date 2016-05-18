<link   type="text/css" href="../../../css/jquery.ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../../../js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../../../js/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../../../js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript">
$(function() {
	$("#expire_date").datepicker({
		showOn: 'button',
		buttonImage: '../../../images/calendar.gif',
		buttonImageOnly: true
	});
});
function show_data(div)
{
	$('#'+div).show();
}
</script>
<table width="67%" border="0" cellpadding="3" cellspacing="3" align='center' style="border:#bbbbbb 1px solid">
   <tr>
		<td colspan='2' align='center'><h2>User Details</h2></td>
   </tr>
   <tr>
		<td width="14%">
			<b>Member ID :</b>
		</td>
		<td>
			<?=$user_info['memid']?> 				
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
			<?=$user_info['name']?> 
		</td>
	</tr>
	<tr>
		<td >
			<b>Site URL :</b>
		</td>
		<td>
			<?=$user_info['site_url']?> 
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
			<?=show_date($user_info['active_date']);?> 
		</td>
	</tr>
	<tr>
		<td >
			<b>Expire Date :</b>
		</td>
		<td>
			<?=show_date($user_info['expire_date']);?> &nbsp;&nbsp;<a href="javascript:show_data('id_exp')">Edit Expire Date</a> 
		</td>
	</tr>
	<tr>
		<td id='id_exp' style="display:none;" colspan='2'>
			<form method='post'>
			<table width='300'>			
				<tr>
					<td><b>New Expire Date:</b></td>
					<td><input type="text" name="expire_date" id="expire_date" size="20" value="<?=show_date($user_info['expire_date'])?>" readonly=""></td>
				</tr>
				<tr>
					<td colspan='2' align='center'>
						<input type='submit' name='submit' value='Update'>
					</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>