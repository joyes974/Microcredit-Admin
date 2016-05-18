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
});

var selectedArray = new Array(); 
function getMultiple(ob) 
{ 
	var selObj = document.getElementById('suggested_writer_id');
	var limit = $('#limit').val();
	var count = 0;
	var warning=false;
	for (i=0; i<selObj.options.length; i++) 
	{
		if (selObj.options[i].selected) 
		{
			if(count<limit)
			{
				if(selObj.options[i].value!="")
					count++;
			}
			else
			{
				warning=true;
				selObj.options[i].selected  = false;
			}
		}
		else
			selObj.options[i].selected  = false;
	}
	if(warning)
		alert("You can't select more than "+limit+" members");
}

</script>
<form action="" method="post" name='frm'>
  <table width="50%" border="0" cellpadding="3" cellspacing="1" align='center' style="border:#bbbbbb 1px solid">
  <tr>
		  <td colspan='2' align='center'><h2><?=($seal_id=='')?"Add":"Edit"?> Article Topic</h2></td>
   </tr>
   <tr>
		<td colspan='2' align='left' class='err'><?=$this->validation->error_string; ?></td>
	</tr>
	 <tr>
		<td colspan='2' align='right' ><span style='color:red'>*</span> Field are Required</td>
	</tr>
	<tr>
		<td width="25%" align='right'>
			<b>Topic: <span style='color:red'>*</span></b>
		</td>
		<td>
			<input type="text" name="topic" size="50" value="<?=$_REQUEST['topic']?>"> 	
		</td>
	</tr>
	<tr>
		<td align='right'>
			<b>Limit: <span style='color:red'>*</span></b>
		</td>
		<td>
			<select name="limits" id='limit'>
				<?for($i=1;$i<=10;$i++){?><option value="<?=$i?>"><?=$i?></option><?}?>
			</select>
		</td>
	</tr>
	<tr>
		<td valign='top' align='right'>
			<b>Suggested Writer : <span style='color:red'>*</span></b>
		</td>
		<td>
			<select name="suggested_writer_id[]" id="suggested_writer_id" multiple size="10" onclick='getMultiple();' onmouseover='getMultiple();'>
				<option value=""> - - - </option>
				<?foreach($all_writer as $writer):?><option value="<?=$writer['id']?>"><?=$writer['name']?> (<?=$writer['email']?>)</option><?endforeach?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td valign='top' align='right'><b>Keywords : </b></td>
		<td>
			<textarea name='keywords' rows='3' cols='40'><?=$_REQUEST['keywords'];?></textarea>
		</td>
	</tr>
	
	
	<tr>
		<td valign='top' align='right'><b>Comment : </b></td>
		<td>
			<textarea name='comment' rows='3' cols='40'><?=$_REQUEST['comment'];?></textarea>
		</td>
	</tr>
	

	<tr>
		<td colspan='2' align='center'>
			<input type='submit' name='submit' value="<?=($seal_id=='')?"Add":"Edit"?> Topic">
		</td>
	</tr>
  </table>
</form>
 <?php $this->load->view('footer');  ?>



