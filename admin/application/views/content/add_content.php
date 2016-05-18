<?php $this->load->view('header');  ?>
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
			<b>Category:</b>
		</td>
		<td>
			<select name='category_link'>
				<?foreach($category as $item):?>
					<option value="<?=strtolower($item['category'])?>" <?if(strtolower($item['category'])==$content['category']):?>selected<?endif;?> ><?=$item['category']?></option>
				<?endforeach;?>
			</select>
		</td>
	</tr>
	<tr>
		<td width="15%">
			<b>URL:</b>
		</td>
		<td>
			<input type="text" name="page_url" size="80" value="<?=($content['page_url']=="")?$_REQUEST['page_url']:$content['page_url'];?>"> 	
		</td>
	</tr>
	<tr>
		<td width="15%">
			<b>Title:</b>
		</td>
		<td>
			<input type="text" name="page_title" size="80" value="<?=($content['page_title']=="")?$_REQUEST['page_title']:$content['page_title'];?>"> 	
		</td>
	</tr>
	<tr>
		<td width="15%">
			<b>Header:</b>
		</td>
		<td>
			<input type="text" name="page_header" size="80" value="<?=($content['page_header']=="")?$_REQUEST['page_header']:$content['page_header']?>"> 	
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Content:</b>
		</td>
		<td>
			<textarea name='page_content' rows='15' cols='80'><?=($content['page_content']=="")?$_REQUEST['page_content']:$content['page_content'];?></textarea>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Select Nr. Topics:</b>
		</td>
		<td>
			<select name='num_topics' id="num_topics" >
				<option value=""> - Select Number of Topics - </option>
				<?for($i=1;$i<=10;$i++){?>
					<option value="<?=$i?>" <?if(count($pages)==$i):?>selected<?endif?>><?=$i?></option>
				<?}?>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2" id='topics'>			
			<?for($i=1;$i<=10;$i++){?>
				<div id='topic<?=$i?>' <?if($pages[$i-1]['title']==""):?>style='display:none;'<?endif?> >
				<table>
					<tr>
						<td colspan="2" ><hr /></td>
					</tr>
					<tr>
						<td width="15%"><b>Topic Order:</b></td>
						<td>
							<select name='topics_order[]' id="topics_order" >
								<option value=""> - Select Order of Topics - </option>
								<?for($j=1;$j<=10;$j++){?>
									<option value="<?=$j?>" <?if($pages[$i-1]['topics_order']==$j):?>Selected<?elseif($j==$i):?>Selected<?endif?> >
										<?=$j?>
									</option>
								<?}?>
							</select>
						</td>
					</tr>
					<tr>
						<td width="15%"><b>Topic Title:</b></td>
						<td><input type="text" name="title[]" size="80" value="<?=$pages[$i-1]['title']?>"></td>
					</tr>
					<tr>
						<td valign="top"><b>Topic Content:</b></td>
						<td><textarea name="description[]" rows="10" cols="80"><?=$pages[$i-1]['description']?></textarea></td></tr>
						<tr><td valign="top"><b>Video Embed Code:</b></td>
						<td><textarea name="video_code[]" rows="5" cols="80"><?=$pages[$i-1]['video_code']?></textarea></td>
					</tr>
				</table>
				</div>
			<?}?>			
		</td>
	</tr>
	<tr>
		<td colspan='2' align='center'>
			<input type='hidden' name='id' value="<?=$content['id']?>" />
			<input type='submit' name='submit' value="Add" />
		</td>
	</tr>
  </table>
</form>
 <?php $this->load->view('footer');  ?>