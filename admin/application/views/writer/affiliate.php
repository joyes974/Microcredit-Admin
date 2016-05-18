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
				<img src="../images/users.png" width="30" align="absmiddle"> <b>All Affiliate User</b>
		</td>
		<td colspan="5" align="right">
			<!-- <img src="../images/add_user.png" width="30" align="absmiddle">
			 <a href="<?=site_url();?>user/add_affiliate">Add Affilite User</a>
		    -->
		</td>
	</tr>
	<tr>
		<td colspan="8">
				<b>Total Found : <?=count($user)?></b><br><b></b>
		</td>
	</tr>
    <tr bgcolor="#bbbbbb" align="center">
        <td width="6%">
            <b>Member ID</b>
			&nbsp;
			<a href='<?=site_url();?>user/affiliate?type=memid&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user/affiliate?type=memid&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
        <td width="12%">
            <b>Email</b> 
			&nbsp;
			<a href='<?=site_url();?>user/affiliate?type=email&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user/affiliate?type=email&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="12%">
            <b>Name</b>
			&nbsp;
			<a href='<?=site_url();?>user/affiliate?type=name&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user/affiliate?type=name&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="27%">
           <b>Affiliate URL</b>		   
        </td>
		<td width="15%">
           <b>Website URL</b>		   
        </td>
		<td width="7%">
           <b>Total Member</b>
			<a href='<?=site_url();?>user/affiliate?type=total&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user/affiliate?type=total&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
		<td width="7%">
           <b>Register Date</b>
			<a href='<?=site_url();?>user/affiliate?type=register_date&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>user/affiliate?type=register_date&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>		
		<td width="6%">
            <b>Status</b> 
        </td>
    </tr>
    <?php foreach($user as $item){?>
	<tr bgcolor="efefef" align="center" id="rows<?=$item['id'];?>" >
		<td >
			<a href="<?=site_url();?>user/affiliate_details/<?=$item['id']?> "><?=$item['id']?></a> 	   	   	   	   	 
		</td>
		<td >
		   <?=$item['email']?>
		</td>
		<td align='left'>
		   <?=$item['first_name'];?> <?=$item['last_name'];?> 	
		</td>
		<td align='left'>
		   <a href="http://<?=$_SERVER["HTTP_HOST"]?>/index.html?ref=<?=$item["code"]?>" target="_blank">http://<?=$_SERVER["HTTP_HOST"]?>/index.html?ref=<?=$item["code"]?></a>
		</td>
		<td align='left'>
		  <?=$item['website_url']?>
		</td>
		<td>
		   <?=$item['total']?>
		</td>
		<td>
		   <?=show_date($item['register_date']);?>
		</td>
		<td width="2%">
			<?if($item['status']=='Active'):?>
				<a href="<?=site_url();?>user/affiliate_status/<?=$item['id']?>/Pending"><?=$item['status']?></a> 
			<?elseif($item['status']=='Pending'):?>
				<a href="<?=site_url();?>user/affiliate_status/<?=$item['id']?>/Active"><?=$item['status']?></a>
			<?else:?>
				<?=$item['status']?>
			<?endif?>
		</td>
	</tr>
    <?php }?>
</table>
<?php $this->load->view('footer') ?>

