<?php $this->load->view('header') ?>
<table width="75%" border="0" cellpadding="3" cellspacing="3" align='center' style="border:#bbbbbb 1px solid">
   <tr>
		<td colspan='2' align='center'><h2>Page Details</h2></td>
   </tr>
   <tr>
		<td width="14%">
			<b> ID :</b>
		</td>
		<td>
			<?=$user['id']?> 				
		</td>
   </tr>
   <tr>
		<td valign='top'>
			<b>Page URL:</b>
		</td>
		<td id='username'>
			<?=$user['username'];?> 
		</td>
   </tr>
  
   <tr>
		<td valign='top'>
			<b>Page Header:</b>
		</td>
		<td id='salary'>
			<?=$user['salary'];?> 
		</td>
   </tr>
   
   
</table>
 <?php $this->load->view('footer');  ?>