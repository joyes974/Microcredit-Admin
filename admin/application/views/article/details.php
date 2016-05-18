<?php $this->load->view('header') ?>
<script type="text/javascript">
function status_change()
{
	var status= $('#status').val();
	$('.comment').hide();
	if(status=='Rejected')
	{
		$('.comment').show();
	}
}

$(function(){
	$('.comment_reason').change(function() {
		$('#other_reason').hide();
		if($(this).val()=="")
		{
			$('#other_reason').show();
		}
	});
});
</script>

<table width="67%" border="0" cellpadding="3" cellspacing="3" align='center' style="border:#bbbbbb 1px solid">
<form method="post" action="">
   <tr>
		<td colspan='2' align='center'><h2>Article Details</h2></td>
   </tr>
   <tr>
		<td width="15%">
			<b>Article ID :</b>
		</td>
		<td>
			<?=$article['id']?> 				
		</td>
   </tr>
   <tr>
		<td valign='top'>
			<b>Topic:</b>
		</td>
		<td id='category'>
			<?=$article['topic']?> 
		</td>
   </tr>
   <tr>
		<td valign='top'>
			<b>Article:</b>
		</td>
		<td>
			<?=nl2br($article['article_body']);?> 
		</td>
   </tr>
   <tr>
		<td >
			<b>Name :</b>
		</td>
		<td>
			<?=$article['name']?> 
		</td>
	</tr>
	<tr>
		<td >
			<b>Email :</b>
		</td>
		<td>
			<?=$article['email']?> 
		</td>
	</tr>
	<tr>
		<td >
			<b>Document :</b>
		</td>
		<td>
			<?if($article['document']!=""):?>
				<a href="<?=site_url();?>article/download/<?=$article['id'];?>"> Download </a>
			<?endif;?>			
		</td>
	</tr>
	<tr>
		<td >
			<b>Submission date :</b>
		</td>
		<td>
			<?=date('m/d/Y H:i:s',$article['post_time']);?>
		</td>
	</tr>
	<tr>
		<td >
			<b>Status :</b>
		</td>
		<td>
			<select name='status' id='status' onchange='status_change()'>
				<option value="Pending" <?=($article['status']=="Pending")?"selected":""?> >Pending</option>
				<option value="Rejected" <?=($article['status']=="Rejected")?"selected":""?> >Rejected</option>
				<option value="Approved" <?=($article['status']=="Approved")?"selected":""?> >Approved</option>
			</select>
		</td>
	</tr>
	<tr class='comment' style='display:none;'>
		<td valign='top'>
			<b>Reason :</b> 
		</td>
		<td >			
			<select name='comment_reason' class='comment_reason' >
				<?foreach($comment_reason as $item):?>
					<option value="<?=$item['reasons']?>"><?=$item['reasons']?></option>
				<?endforeach?>
				<option value="">Other</option>
			</select>
			<input type='text' name='other_reason' style='display:none;' id='other_reason' size='80' />
		</td>
	</tr>
	<tr class='comment' style='display:none;'>
		<td valign='top'>
			<b>Comment :</b> 
		</td>
		<td >			
			<textarea name='comment' rows='7' cols='100' ></textarea>
		</td>
	</tr>
	<tr>
		<td colspan='2' align='center'>			
			<input type='hidden' name='article_id' value="<?=$article['id']?>" />
			<input type="submit" name='update' value="Update" />
		</td>
	</tr>
</form>
</table>

<?if(count($article_comment)>0):?>
<table width="67%" border="0" cellpadding="3" cellspacing="3" align='center' style="border:#bbbbbb 1px solid">
   <tr>
		<td colspan='2' align='center'><h2>Comments</h2></td>
   </tr>
   <?foreach($article_comment as $item):?>
   <tr>
		<td valign='top'>
			<b>Reason:</b>
		</td>
		<td id='category'>
			<?=$item['comment_reason']?> 
		</td>
   </tr>
   <tr>
		<td valign='top'>
			<b>Comment:</b>
		</td>
		<td id='category'>
			<?=nl2br($item['comment']);?> 
		</td>
   </tr>
   <tr>
		<td width="14%">
			<b>Comment Time:</b>
		</td>
		<td>
			<?=date('m/d/Y H:i:s',$item['comment_time']);?>		
		</td>
    </tr>
	<tr>
		<td colspan='2'>&nbsp;</td>
    </tr>
	<?endforeach?>
</table>
<?endif;?>
<script type="text/javascript">
	var status= $('#status').val();
	if(status=='Rejected')
	{
		$('.comment').show();
	}
</script>
<?php $this->load->view('footer') ?>