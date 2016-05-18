<?php $this->load->view('header'); ?>
<script>
$(function() 
{
	$('#num_topics').change(function() {
		var num = $('#num_topics').val();
		for(i=1;i<=num;i++)
		{
			$('#topic'+i).show();
		}
		var left = i;
		for(j=left;j<=10;j++)
		{
			$('#topic'+j).hide();
		}
	});
});

</script>
<?php echo $eid ;?>
<form action="" method="post">
  <table width="65%" border="0" cellpadding="3" cellspacing="1" align='center' style="border:#bbbbbb 1px solid">
    <tr>
		  <td colspan='2' align='center'><h2>Edit Content</h2></td>
    </tr>
	<tr>
		<td colspan='2' align='center' class='red'><?php echo $this->validation->error_string; ?></td>
	</tr>
	
	<tr>
		<td width="15%">
			<b>User Name:</b>
		</td>
		<td>
		    <input name="username" type="text" size="80" value="<?=$use['username'];?>">
			
		</td>
	</tr>
	
	
	<tr>
		<td width="15%">
			<b>Phone:</b>
		</td>
		<td>
			<input type="text" name="phone" size="80" value="<?=$use['phone'];?>"> 	
		</td>
	</tr>
	<tr>
		<td width="15%">
			<b>Email:</b>
		</td>
		<td>
			<input type="text" name="email" size="80" value="<?=$use['email'];?>"> 	
		</td>
	</tr>
	
	<tr>
		<td width="15%">
			<b>Address:</b>
		</td>
		<td>
			<input type="text" name="address" size="80" value="<?=$use['address'];?>"> 	
		</td>
	</tr>
	
	
	
	<tr>
		<td width="15%">
			<b>District:</b>
		</td>
		<td>
			<input type="text" name="dist" size="80" value="<?=$use['dist'];?>"> 	
		</td>
	</tr>
	
	
	
	<tr>
		<td width="15%">
			<b>Status:</b>
		</td>
		<td>
			<input type="text" name="status" size="80" value="<?=$use['status'];?>"> 	
		</td>
	</tr>
	<tr>
		<td width="15%">
			<b>Update Date:</b>
		</td>
		<td>
			<input type="text" name="register_date" size="80" value="<?=$use['register_date'];?>"> 	
		</td>
	</tr>
	
	
	
	
	<tr>
		<td colspan='2' align='center'>
		
			<input type='hidden' name='id' value="<?=$use['id']?>" />
			<input type='submit' name='Submit' value="Update" />
		</td>
	</tr>
  </table>
</form>
 <?php $this->load->view('footer');  ?>