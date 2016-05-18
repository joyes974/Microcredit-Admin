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
		  <td colspan='2' align='center'><h2>Add/Edit Content</h2></td>
    </tr>
	<tr>
		<td colspan='2' align='center' class='red'><?php echo $this->validation->error_string; ?></td>
	</tr>
	
	<tr>
		<td width="15%">
			<b>Email:</b>
		</td>
		<td>
		    <input name="email" type="text" size="80" value="<?=$emp['email'];?>">
			
		</td>
	</tr>
	<tr>
		<td width="15%">
			<b>Name:</b>
		</td>
		<td>
			<input type="text" name="fullname" size="80" value="<?=$emp['fullname'];?>"> 	
		</td>
	</tr>
	
	<tr>
		<td width="15%">
			<b>Address:</b>
		</td>
		<td>
			<input type="text" name="pres_address" size="80" value="<?=$emp['pres_address'];?>"> 	
		</td>
	</tr>
	
	<tr>
		<td width="15%">
			<b>Phone:</b>
		</td>
		<td>
			<input type="text" name="phone" size="80" value="<?=$emp['phone'];?>"> 	
		</td>
	</tr>
	
	<tr>
		<td width="15%">
			<b>District:</b>
		</td>
		<td>
			<input type="text" name="dist" size="80" value="<?=$emp['dist'];?>"> 	
		</td>
	</tr>
	<tr>
		<td width="15%">
			<b>Salary:</b>
		</td>
		<td>
			<input type="text" name="salary" size="80" value="<?=$emp['salary'];?>"> 	
		</td>
	</tr>
	
	
	<tr>
		<td width="15%">
			<b>Status:</b>
		</td>
		<td>
			<input type="text" name="status" size="80" value="<?=$emp['status'];?>"> 	
		</td>
	</tr>
	<tr>
		<td width="15%">
			<b>Update Date:</b>
		</td>
		<td>
			<input type="text" name="register_date" size="80" value="<?=$emp['register_date'];?>"> 	
		</td>
	</tr>
	
	
	
	
	<tr>
		<td colspan='2' align='center'>
		
			<input type='hidden' name='id' value="<?=$emp['id']?>" />
			<input type='submit' name='Submit' value="Update" />
		</td>
	</tr>
  </table>
</form>
 <?php $this->load->view('footer');  ?>