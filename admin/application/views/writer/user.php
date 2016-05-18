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
				<img src="images/users.png" width="30" align="absmiddle"> <b>All Employee</b>
		</td>
		<td colspan="5" align="right">
			 <img src="images/add_user.png" width="30" align="absmiddle">
			 <a href="<?=site_url();?>writer/add">Add Employee</a>
		</td>
		
	</tr>
	<tr>
		<td colspan="8">
				<b>Total Found : <?=count($user)?></b><br><b></b>
		</td>
	</tr>
	<tr>
		<td><?=$links?></td>
	</tr>
    <tr bgcolor="#bbbbbb" align="center">
        <td width="8%">
            <b>Employee ID</b>
			&nbsp;
			<a href='<?=site_url();?>writer?type=id&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>writer?type=id&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
        <td width="17%">
            <b>Email</b> 
			&nbsp;
			<a href='<?=site_url();?>writer?type=email&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>writer?type=email&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="20%">
            <b>Name</b>
			&nbsp;
			<a href='<?=site_url();?>writer?type=name&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>writer?type=name&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
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
			<a href='<?=site_url();?>writer?type=total_article&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>writer?type=total_article&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		
		<td width="17%">
            <b>Salary</b>
			&nbsp;
        </td>
		
		<td width="7%">
           <b>Status</b>
			<a href='<?=site_url();?>writer?type=status&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>writer?type=status&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="12%">
           <b>Register Date</b>
			<a href='<?=site_url();?>writer?type=register_date&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>writer?type=register_date&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
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
		   <?=$item['email']?>
		</td>
		<td align='left'>
		   <?=$item['fullname'];?>
		</td>
		<td align='left'> 	 	 	
		   <?=$item['pres_address'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['phone'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['dist'];?><br />
		</td>
		<td align='left'> 	 	 	
		   <?=$item['salary'];?><br />
		</td>
		
		<td>
		   <?=$item['status'];?>
		</td>
		<td>
		   <?=show_date($item['register_date']);?>
		</td>
		<td width="2%">
			<a href='<?=site_url();?>writer/status/<?=$item['id']?>'><?=$item['status']?></a> 
			&nbsp;|&nbsp;
			<a href='<?=site_url();?>writer/delete/<?=$item['id']?>' onclick="return confirm('Are you sure you want to delete the <?=$item['email']?> account')" onmouseover="highlight('rows<?=$item['id'];?>','#bbbbbb')" onmouseout="highlight('rows<?=$item['id'];?>','#efefef')" >Delete</a> 
		    <br>
			<a href="<?=site_url();?>profile/index/<?=$item['id']?>">Edit</a>
		</td>
	</tr>
    <?php }?>
</table>
<?php $this->load->view('footer') ?>

