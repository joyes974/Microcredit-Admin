<?php $this->load->view('header');  ?>
<script>
	
</script>
<form action="" name='dform' method="post">
  <table width="50%" border="0" cellpadding="3" cellspacing="1" align='center' style="border:#bbbbbb 1px solid">
	<tr>
		  <td colspan='2' align='center'><h2>View Contact</h2></td>
	</tr>
	<?if($message=='ok'):?>
    <tr>
		<td colspan='2' align='left' style='color:green;font-weight:bold'>Message Sent</td>
	</tr>
	<?endif?>
	<tr>
		<td width="25%"> 	 	 	 	 	 	
			<b>Reason: </b>
		</td>
		<td>
			<?=$contact['reason']?>
		</td>
	</tr>
	<tr>
		<td>
			<b>Email: </b>
		</td>
		<td>
			<?=$contact['email']?>
		</td>
	</tr>
	<!--
	<tr>
		<td >
			<b>Phone: </b>
		</td>
		<td>
			<?=$contact['phone']?>
		</td>
	</tr>
	-->
		<tr>
		<td >
			<b>Website: </b>
		</td>
		<td>
			<?=$contact['website']?>
		</td>
	</tr>

	<tr>
		<td>
			<b>Message: </b>
		</td>
		<td valign='top'>
			<?=nl2br($contact['message']);?>
		</td>
	</tr>
	<tr>
		<td>
			<b>Date: </b>
		</td>
		<td>
			<?=show_date($contact['send_date']);?>
		</td>
	</tr>
	<tr>
		<td valign='top' colspan='2'>
			<hr />
		<td>
	</tr>
	<?if(count($contact_reply)>0):?>
	
	<tr>
		<td valign='top' colspan='2'>
			<h2><b>Contact Reply</b></h2>
			<table width="100%">
				<?foreach($contact_reply as $item):?>
				
					<tr><td><b>Reply Date</b></td><td><?=$item['date_time']?></td></tr>
					<tr><td width="25%"><b>Subject</b></td><td><?=$item['subject']?></td></tr>
					<tr><td><b>Message</b></td><td><?=$item['message']?></td></tr>
					<tr><td colspan='2'><hr /><br /></td></tr>
				<?endforeach?>
			</table>
		</td>
	</tr>
	<?endif?>
	<tr>
		<td valign='top'>
			<b>Subject: </b>
		</td>
		<td>
			<select name='default_message' id='default_message' onchange="document.dform.submit();">
				<option value=""> - - - - - - - - - - </option>
				<?foreach($default_message as $item):?>
					<option value="<?=$item['id']?>" <?=($item['id']==$_REQUEST['default_message'])?"selected":""?> ><?=$item['subject']?></option>
				<?endforeach?>
			</select>
			<?if($_REQUEST['default_message']==''):?>
				<input type='text' name='subject' size="75">
			<?else:?>
				<input type='hidden' name='subject' value='<?=$df_message['subject']?>' size="75">
			<?endif?>
		</td>
	</tr>

	<tr>
		<td valign='top'>
			<b>Reply Message: </b>
		</td>
		<td>
			<textarea rows='8' cols='60' name='message'><?=$df_message['message']?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan='2' align='center'>
			<input type='hidden' name='email' value="<?=$contact['email']?>">
			<input type='submit' name='Submit' value="Reply">
		</td>
	</tr>
  </table>
</form>
 <?php $this->load->view('footer');  ?>



