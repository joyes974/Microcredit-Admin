<?php $this->load->view('header');  ?>
<link   type="text/css" href="../../css/jquery.ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../../js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../../js/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../../js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript">
$(function() {
	$("#expire_date").datepicker({
		showOn: 'button',
		buttonImage: '../../images/calendar.gif',
		buttonImageOnly: true
	});
	
	$('#zip_code').blur(function() {
	   var zip_code = $('#zip_code').val();
	   $.ajax({
		  url:  "<?=site_url()?>writer/city_by_state",
		  type: "POST",
		  dataType: "json",
		  data: ( { zip_code:zip_code } ),
		  success: function(data){
			$('#city').val(data.city);
			$('#state').val(data.state);
		  }
		});
	});
});
</script>
<form action="" method="post">
  <table width="50%" border="0" cellpadding="3" cellspacing="1" align='center' style="border:#bbbbbb 1px solid">
  <tr>
		  <td colspan='2' align='center'><h2><?=($seal_id=='')?"Add":"Edit"?> user</h2></td>
   </tr>
   <tr>
		<td colspan='2' align='left' class='err'><?=$this->validation->error_string; ?></td>
	</tr>
	 <tr>
		<td colspan='2' align='right' ><span style='color:red'>*</span> Field are Required</td>
	</tr>
	<tr>
		<td width="25%">
			<b>User Name: <span style='color:red'>*</span></b>
		</td>
		<td>
			<input type="text" name="username" size="50" value="<?=$_POST['username']?>"> 	
		</td>
	</tr>
	<tr>
		<td width="25%">
			<b>Father Name: <span style='color:red'>*</span></b>
		</td>
		<td>
			<input type="text" name="fathername" size="50" value="<?=$_POST['fathername']?>"> 	
		</td>
	</tr>
	<tr>
		<td >
			<b>Password: <span style='color:red'>*</span></b>
		</td>
		<td>
			<input type="password" name="password" size="40" value="<?=$_POST['password']?>">
		</td>
	</tr>
	<tr>
		<td >
			<b>Confirm Password: <span style='color:red'>*</span></b>
		</td>
		<td>
			<input type="password" name="passconf" size="40" value="<?=$_POST['passconf']?>">
		</td>
	</tr>
	
	
	<tr>
		<td width="25%">
			<b> Address: <span style='color:red'>*</span></b>
		</td>
		<td>
			<input type="text" name="address" size="50" value="<?=$_POST['address']?>"> 	
		</td>
	</tr>
	<tr>
		<td >
			<b>District:</b>
		</td>
		<td>
								<select name="dist" style="width:146px;">
								<option value="">--- Select District ---</option>
								
								<option value="Dhaka">Dhaka</option>
								<option value="Sylhet">Sylhet</option>
								<option value="Mymensingh">Mymensingh</option>
								<option value="kkk">kkk</option>
								</select>						  
		</td>
	</tr>
	<tr>
		<td width="25%">
			<b>Phone: <span style='color:red'>*</span></b>
		</td>
		<td>
			<input type="text" name="phone" size="50" value="<?=$_POST['phone']?>"> 	
		</td>
	</tr>
	<tr>
		<td>
			<b>Email: <span style='color:red'>*</span></b>
		</td>
		<td>
			<input type="text" name="email" size="50" value="<?=$_POST['email']?>">
		</td>
	</tr>
	
	
	
	
	
	<tr>
		<td width="25%">
			<b>Status: <span style='color:red'>*</span></b>
		</td>
		<td>
									  		<select name="status" style="width:146px;">
								<option value="">--- Select Status ---</option>
								<option value="Active">Active</option>
								<option value="Pending">Pending</option>
								<option value="Deleted">Deleted</option>
								</select>						  	
		</td>
	</tr>
	
	<tr>
		<td colspan='2' align='center'>
			<input type='submit' name='submit' value="<?=($seal_id=='')?"Add":"Edit"?> User">
		</td>
	</tr>
  </table>
</form>
 <?php $this->load->view('footer');  ?>



