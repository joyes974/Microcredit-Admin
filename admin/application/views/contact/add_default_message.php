<?php $this->load->view('header');  ?>
<form action="" method="post">
  <table width="50%" border="0" cellpadding="3" cellspacing="1" align='center' style="border:#bbbbbb 1px solid">
	<tr>
		  <td colspan='2' align='center'><h2>Add / Edit Default Message</h2></td>
	</tr>
	<?if($message=='ok'):?>
    <tr>
		<td colspan='2' align='left' style='color:green;font-weight:bold'>Detault Message Save Successfully</td>
	</tr>
	<?endif?>
	<tr>
		<td valign='top'>
			<b>Subject: </b>
		</td>
		<td>
			<input type='text' name='subject' value="<?=$default_message['subject']?>" size="75">
		</td>
	</tr>

	<tr>
		<td valign='top'>
			<b>Message: </b>
		</td>
		<td>
			<textarea rows='8' cols='60' name='message'><?=$default_message['message']?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan='2' align='center'>
			<input type='hidden' name='email' value="<?=$contact['email']?>">
			<input type='submit' name='submit' value="Submit">
		</td>
	</tr>
  </table>
</form>
 <?php $this->load->view('footer');  ?>



