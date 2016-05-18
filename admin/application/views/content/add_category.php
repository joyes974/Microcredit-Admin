<?php $this->load->view('header');  ?>
<form action="" method="post">
  <table width="65%" border="0" cellpadding="3" cellspacing="1" align='center' style="border:#bbbbbb 1px solid">
  <tr>
		  <td colspan='2' align='center'><h2>Add/Editiiiiii Category</h2></td>
   </tr>
	<tr>
		<td colspan='2' align='center' class='red'><?php echo $this->validation->error_string; ?></td>
	</tr>
	<tr>
		<td width="17%">
			<b>Category:</b>
		</td>
		<td>
			<input type="text" name="category" size="60" value="<?=$category['category']?>"> 	
		</td>
	</tr>
	<tr>
		<td colspan='2' align='center'>
			<input type='hidden' name='id' value="<?=$category['id']?>" />
			<input type='submit' name='submit' value="Add" />
		</td>
	</tr>
  </table>
</form>
 <?php $this->load->view('footer');  ?>



