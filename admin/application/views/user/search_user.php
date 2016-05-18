<?php $this->load->view('header') ?>
<link   type="text/css" href="../../css/jquery.ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../../js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../../js/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../../js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript">
$(function() {
	$("#date_from").datepicker({
		showOn: 'button',
		buttonImage: '../../images/calendar.gif',
		buttonImageOnly: true
	});
	$("#date_to").datepicker({
		showOn: 'button',
		buttonImage: '../../images/calendar.gif',
		buttonImageOnly: true
	});
});
</script>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
	<tr>
		<td colspan="7">
			<form method='post'>
			<table>
				<tr>
					<td colspan="2">
						<b>SEARCH User</b>
					</td>
				</tr>
				<tr><td>User ID  : </td><td><input type='text' name='id' value="<?=$_REQUEST['id']?>" size='60'></td></tr>
				<tr><td>Name  : </td><td><input type='text' name='name'  value="<?=$_REQUEST['username']?>" size='60'></td></tr>
				<tr><td>Email : </td><td><input type='text' name='email' value="<?=$_REQUEST['email']?>" size='60'></td></tr>
				<tr>
					<td>Register Date   : </td>
					<td>
						<input type='text' id='date_from' size='15' name='date_from' readonly="" value="<?=$_REQUEST[date_from]?>" />
						To
						<input type='text' id='date_to' size='15' name='date_to' readonly="" value="<?=$_REQUEST[date_to]?>" />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type='submit' name='submit' value="Search User">
					</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
	<?if($_REQUEST['submit']!=''){?>
		<tr>
			<td colspan="7">
					<b>Total Found : <?=count($user)?></b><br><b></b>
			</td>
		</tr>
		<tr bgcolor="bbbbbb" align="center">
<td width="8%">
            <b>User ID</b>
			&nbsp;
			
        </td>
        <td width="17%">
            <b>Email</b> 
			&nbsp;
			
        </td>
		<td width="20%">
            <b>Name</b>
			&nbsp;
			
        </td>
		<td width="17%">
            <b>Address</b>
			&nbsp;
        </td>
		
		<td width="17%">
            <b>Phone</b>
			&nbsp;
        </td>
		
		<td width="7%">
           <b>District</b>
		   &nbsp;
			
        </td>
		
		
		<td width="7%">
           <b>Status</b>
			
        </td>
		<td width="12%">
           <b>Register Date</b>
			
        </td>			
			<td width="5%">
				Action 
			</td>
		</tr>
		<?php foreach($user as $item){?>
		<tr bgcolor="efefef" align="center">
        <td >
			<?=$item['id']?>   	   	   	   	 
		</td>
		<td >
		   <?=$item['email']?>
		</td>
		<td align='left'>
		   <?=$item['username'];?>
		</td>
		<td align='left'> 	 	 	
		   <?=$item['address'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['phone'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['dist'];?><br />
		</td>
		
		<td>
		   <?=$item['status'];?>
		</td>
		<td>
		   <?=show_date($item['register_date']);?>
		</td>
			<td width="2%">
				<?if($item['is_delete']==1):?>
					<a href='<?=site_url();?>user/status/<?=$item['id']?>'>Deleted</a> 
				<?else:?>
					<a href='<?=site_url();?>user/status/<?=$item['id']?>'>Active</a> 
				<?endif?>
			</td>
		</tr>
		<?php }
	}?>
</table>
<?php $this->load->view('footer') ?>

