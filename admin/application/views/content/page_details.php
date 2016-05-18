<?php $this->load->view('header') ?>
<table width="75%" border="0" cellpadding="3" cellspacing="3" align='center' style="border:#bbbbbb 1px solid">
   <tr>
		<td colspan='2' align='center'><h2>Page Details</h2></td>
   </tr>
   <tr>
		<td width="14%">
			<b>Page ID :</b>
		</td>
		<td>
			<?=$content['id']?> 				
		</td>
   </tr>
   <tr>
		<td valign='top'>
			<b>Page URL:</b>
		</td>
		<td id='category'>
			/<?=$content['category'];?>/<?=$content['page_url'];?> 
		</td>
   </tr>
   <tr>
		<td valign='top'>
			<b>Page Title:</b>
		</td>
		<td id='category'>
			<?=nl2br($content['page_title']);?> 
		</td>
   </tr>
   <tr>
		<td valign='top'>
			<b>Page Header:</b>
		</td>
		<td id='category'>
			<?=$content['page_header'];?> 
		</td>
   </tr>
   <tr>
		<td valign='top'>
			<b>Page Content:</b>
		</td>
		<td>
			<?=nl2br($content['page_content']);?> 
		</td>
   </tr>
   <?foreach($pages as $item):?>
   <tr>
		<td valign='top' colspan='2'>
			<table width='100%'>
				<tr>
					<td colspan='2'><hr /></td>
				</tr>
				<tr>
					<td width="14%">
						<b>Topic Title :</b>
					</td>
					<td>
						<?=$item['title']?> 
					</td>
				</tr>
				<tr>
					<td valign='top'>
						<b>Topic Content:</b>
					</td>
					<td>
						<?=nl2br($item['description']);?> 
					</td>
				</tr>
				<?if($item['video_code']!=""):?>
					<tr>
						<td >
							<b>Embed Video:</b>
						</td>
						<td>
							<?=$item['video_code'];?> 
						</td>
					</tr>
				<?endif?>
			</table>
		</td>
	</tr>
	<?endforeach;?>
</table>
 <?php $this->load->view('footer');  ?>