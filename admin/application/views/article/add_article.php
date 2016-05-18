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
</script>
<form action="" method="post">
  <table width="50%" border="0" cellpadding="3" cellspacing="1" align='center' style="border:#bbbbbb 1px solid">
  <tr>
		  <td colspan='2' align='center'><h2><?=($seal_id=='')?"Add":"Edit"?> Article</h2></td>
   </tr>
   <tr>
		<td colspan='2' align='left' class='err'><?=$this->validation->error_string; ?></td>
	</tr>
	 <tr>
		<td colspan='2' align='right' ><span style='color:red'>*</span> Field are Required</td>
	</tr>
	<tr>
		<td width="25%">
			<b>Topic: <span style='color:red'>*</span></b>
		</td>
		<td>
			<select name="topic_id">
				<?foreach($topics as $topic):?><option value="<?=$topic['id']?>"><?=$topic['topic']?></option><?endforeach;?>
			</select>	
		</td>
	</tr>
	<tr>
		<td>
			<b>Writer: <span style='color:red'>*</span></b>
		</td>
		<td>
			<select name="writer_id">
				<?foreach($all_writer as $writer):?><option value="<?=$writer['id']?>"><?=$writer['name']?> (<?=$writer['email']?>)</option><?endforeach?>
			</select>
		</td>
	</tr>
	<tr>
		<td valign='top' >
			<b>Article: <span style='color:red'>*</span></b>
		</td>
		<td>
			<textarea name='article_body' cols='80' rows='10'><?=$_REQUEST['article_body']?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan='2' align='center'>
			<input type='submit' name='submit' value="<?=($seal_id=='')?"Add":"Edit"?> Article">
		</td>
	</tr>
  </table>
</form>
 <?php $this->load->view('footer');  ?>



