<?php $this->load->view('header') ?>
<script>
	function highlight(id,color)
	{
		$("#"+id).css("backgroundColor",color);
	}
</script>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
	<tr>
		<td colspan="3">
				<img src="images/users.png" width="30" align="absmiddle"> <b>All User</b>
		</td>
		<td colspan="5" align="right">
			 <img src="images/add_user.png" width="30" align="absmiddle">
			 <a href="<?=site_url();?>user/add">Add User</a>
		</td>
		
	</tr>

    <tr bgcolor="#bbbbbb" align="center">
        <td width="8%">
            <b>Loan Details</b>
			&nbsp;
			<a href='<?=site_url();?>user?type=id&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user?type=id&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="15%">
            <b>Skim 1</b>
			&nbsp;
			<a href='<?=site_url();?>user?type=id&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user?type=id&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		
		<td width="15%">
            <b>Skim 2</b>
			&nbsp;
			<a href='<?=site_url();?>user?type=id&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user?type=id&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		
        <td width="17%">
            <b>Email</b> 
			&nbsp;
			
        </td>
		
		<td width="17%">
            <b>Address</b>
			&nbsp;
        </td>
		
		<td width="17%">
            <b>Phone</b>
			&nbsp;
        </td>
		
		<td width="7%">
           <b>District</b>
		   &nbsp;
			<a href='<?=site_url();?>user?type=total_article&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user?type=total_article&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		
		
		<td width="7%">
           <b>Status</b>
			<a href='<?=site_url();?>user?type=status&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user?type=status&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="12%">
           <b>Register Date</b>
			<a href='<?=site_url();?>user?type=register_date&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user?type=register_date&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>	
		<td width="10%">
            <b>Action</b> 
        </td>
    </tr>
    <?php foreach($user as $item){?>
	<tr bgcolor="efefef" align="center" id="rows<?=$item['id'];?>" >
		<td >
			<?=$item['id']?>   	   	   	   	 
		</td>
		<td >
		   <?=$item['username']?>
		</td>
		<td align='left'>
		   <?=$item['fathername'];?>
		</td>
		<td align='left'> 	 	 	
		   <?=$item['email'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['address'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['phone'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['dist'];?><br />
		</td>
		
		<td>
		   <?=$item['status'];?>
		</td>
		<td>
		   <?=show_date($item['register_date']);?>
		</td>
		<td width="2%">
			<a href='<?=site_url();?>user/status/<?=$item['id']?>'><?=$item['status']?></a> 
			&nbsp;|&nbsp;
			<a href='<?=site_url();?>user/delete/<?=$item['id']?>' onclick="return confirm('Are you sure you want to delete the <?=$item['email']?> account')" onmouseover="highlight('rows<?=$item['id'];?>','#bbbbbb')" onmouseout="highlight('rows<?=$item['id'];?>','#efefef')" >Delete</a> 
		    <br>
			<a href="<?=site_url();?>user/edit_user/<?=$item['id']?>">Edit</a>
		</td>
	</tr>
    <?php }?>
	
	<?php echo $pagination ?>
</table>
<?php $this->load->view('footer') ?>

