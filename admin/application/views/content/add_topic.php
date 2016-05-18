<?php $this->load->view('header');  ?>
<form action="" method="post">
  <table width="65%" border="0" cellpadding="3" cellspacing="1" align='center' style="border:#bbbbbb 1px solid">
  <tr>
		  <td colspan='2' align='center'><h2>Add/Edit Topic</h2></td>
   </tr>
	<tr>
		<td colspan='2' align='center' class='red'><?php echo $this->validation->error_string; ?></td>
	</tr>
	<tr>
		<td width="17%">
			<b>Title:</b>
		</td>
		<td>
			<input type="text" name="title" size="60" value="<?=$topics['title']?>"> 	
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Content:</b>
		</td>
		<td>
			<textarea name='description' rows='15' cols='80'><?=$topics['description']?></textarea>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Video Embed Code:</b>
		</td>
		<td>
			<textarea name='video_code' rows='5' cols='80'><?=$topics['video_code']?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan='2' align='center'>
			<input type='hidden' name='id' value="<?=$topics['id']?>" />
			<input type='submit' name='submit' value="Add" />
		</td>
	</tr>
  </table>
</form>
 <?php $this->load->view('footer');  ?>



