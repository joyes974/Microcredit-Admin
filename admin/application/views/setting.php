<?php $this->load->view('header'); ?>
<table cellpadding ="0" cellspacing="0" border="0" width="100%">
<tr height="280">
	<td align="center" valign="top">
		<form method="post" action="">
		<table cellpadding ="0" cellspacing="5" border="0" width="58%">
			<tr>
				<td colspan="2">
						<img src="images/settings2.png" width="30" align="absbottom"> <b>Edit Settings</b>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<b><font color="red">* Required Information</font></b>
				</td>
			</tr>							
			<tr>
				<td width="25%">
					<b>Site Email:</b>
				</td>
				<td>
					<input type="text" name="admin_email" value="<?=$admin_email?>" size="35">
				</td>
			</tr>
			<tr>
				<td>
					<b>Site Name:</b>
				</td>
				<td>
					<input type="text" name="site_name" value="<?=$site_name?>" size="35">
				</td>
			</tr>
			<tr>
				<td >
					<b>Domain Name:</b>
				</td>
				<td>
					<input type="text" name="domain_name" value="<?=$domain_name?>" size="35">
				</td>
			</tr>
			<tr>
				<td >
					<b>Support Email:</b>
				</td>
				<td>
					<input type="text" name="support_email" value="<?=$support_email?>" size="35">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Update">
				</td>
			</tr>
		</table>
		</form>
	</td>
</tr>
</table>

<?php $this->load->view('footer'); ?>

