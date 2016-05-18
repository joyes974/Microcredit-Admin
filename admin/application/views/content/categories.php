<?php $this->load->view('header') ?>
<table cellspacing="1" cellpadding="2" border="0" width="50%">
	<tr>
		<td >
				<img src="../images/users.png" width="30" align="absmiddle"> <b>All Categories</b>
		</td>
		<td colspan="2" align="right">
			 <img src="../images/add_user.png" width="30" align="absmiddle">
			 <a href="<?=site_url();?>page_content/add_category">Add Categories</a>
		</td>
	</tr>
	<tr>
		<td colspan="4">
				<b>Total Found : <?=count($categories)?></b><br><b></b>
		</td>
	</tr>
    <tr bgcolor="bbbbbb" align="center">
        <td width="35%">
            <b>Category ID</b>
        </td>
		<td width="45%">
            <b>Category</b> 
		</td>
		<td width="20%"></td>
    </tr>
    <?php foreach($categories as $item){?>
	<tr bgcolor="efefef" align="center">
		<td>
			<?=$item['id']?>
		</td>
		<td align='left'>
			<?=$item['category']?>
		</td>
		<td >
			<a href="<?=site_url();?>page_content/add_category/<?=$item['id']?>">Edit</a> 
			|
			<a href="<?=site_url();?>page_content/delete_category/<?=$item['id']?>" onclick="return confirm('Do you want to Delete?')">Delete</a> 
		</td>
	</tr>
    <?php }?>
</table>
<?php $this->load->view('footer') ?>

