<?php $this->load->view('header') ?>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
	<tr>
		<td colspan="4">
				<img src="<?=site_url();?>images/users.png" width="30" align="absmiddle"> <b>All Page Topics</b>
		</td>
		<td colspan="2" align="right">
			 <img src="<?=site_url();?>images/add_user.png" width="30" align="absmiddle">
			 <a href="<?=site_url();?>page_content/add_topics/<?=$page_id;?>">Add Topics</a>
		</td>
	</tr>
	<tr>
		<td colspan="6">
				<b>Total Found : <?=count($pages)?></b><br><b></b>
		</td>
	</tr>
    <tr bgcolor="bbbbbb" align="center">
        <td width="5%">
            <b>Topic ID</b>
        </td>
		<td width="5%">
            <b>Page ID</b>
        </td>
		<td width="25%">
            <b>Title</b> 
		</td>
        <td width="52%">
            <b>Content</b> 
		</td>
		<td width="6%">
            <b>Last Update</b>
        </td>	
		<td width="7%">
            <b>Action</b> 
        </td>
    </tr>
    <?php foreach($pages as $item){?>
	<tr bgcolor="efefef" align="center">
		<td>
			<a href="<?=site_url();?>page_content/page_topics/<?=$item['id']?>"><?=$item['id']?></a>
		</td>
		<td>
			<?=$item['page_id']?>
		</td>
		<td>
			<?=$item['title']?>
		</td>
		<td align='left'>
		   <?=nl2br($item['description']);?>
		</td>
		<td align='left'>
		   <?=date("m/d/Y",$item['update_time']);?>
		</td>
		<td>
			<a onclick="return confirm('Do you want to Delete!')" href="<?=site_url();?>page_content/delete_topics/<?=$item['page_id']?>/<?=$item['id']?>">Delete</a> 
			|
			<a href="<?=site_url();?>page_content/add_topics/<?=$item['page_id']?>/<?=$item['id']?>">Edit</a> 
		</td>
	</tr>
    <?php }?>
</table>
<?php $this->load->view('footer') ?>

