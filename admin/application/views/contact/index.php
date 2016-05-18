<?php $this->load->view('header') ?>
<script>
	function jqCheckAll( id, name)
	{
	   if ($('#check_read').attr('checked'))
	   {		  
		  $("form#" + id + " INPUT[@id=" + name + "][type='checkbox']").attr('checked', true);
	   }
	   else
	   {
		  $("form#" + id + " INPUT[@id=" + name + "][type='checkbox']").attr('checked', false);
	   }
	}
	
	function CheckAllRead(status,id)
	{
		$("form#f1 INPUT[@id=" + id + "][type='checkbox']").each(function()
		{
			if(this.checked)
			{
				if(status==1)
					read($(this).val());
				else
					unread($(this).val());
			}
		});
	}

	function read(id)
	{
		document.body.style.cursor = 'wait';
		var urllink = "<?=base_url()?>contact/read_contact/" + id;	
		$.ajax({
	         type: "POST",
	         url:urllink,
	         success: function(response) {
	         	$("#status"+id).html("<a href='javascript:unread("+id+")'>Read</a>");	
	         	document.body.style.cursor = 'default';
	        },
			error: function(){alert('Error ');}
	    }) 
	}
	
	function unread(id)
	{
		document.body.style.cursor = 'wait';
		var urllink = "<?=base_url()?>contact/unread_contact/" + id;	
		$.ajax({
	         type: "POST",
	         url:urllink,
	         success: function(response) {
	         	$("#status"+id).html("<a href='javascript:read("+id+")'>Unread</a>");	
	         	document.body.style.cursor = 'default';
	        },
			error: function(){alert('Error ');}
	    }) 
	}
</script>
<form name='f1' id='f1'>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
	<tr>
		<td colspan="3">
			<img src="images/users.png" width="30" align="absmiddle"> <b>All Contact</b>
		</td>
		<td colspan="4" align="right">
			 
		</td>
	</tr>
	<tr>
		<td colspan="7">
			<b>Total Found : <?=count($contact)?></b><br><b></b>
		</td>
	</tr>
    <tr bgcolor="bbbbbb" align="center">
        <td width="1%">
            <input type='checkbox' id='check_read' value='<?=$row['id']?>'  onclick="jqCheckAll('f1','contact');">
        </td>
		<td width="10%">
            <b>Reason</b>
			&nbsp;
			<a href='<?=site_url();?>contact?type=reason&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>contact?type=reason&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>
        </td>
        <td width="15%">
            <b>Email</b> 
			&nbsp;
			<a href='<?=site_url();?>contact?type=email&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>contact?type=email&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>			
        </td>
		<!--
		<td width="15%">
            <b>Phone</b>	
			&nbsp;
			<a href='<?=site_url();?>contact?type=phone&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>contact?type=phone&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>						
        </td>
		-->
		<td width="15%">
           <b>Website</b>	
			&nbsp;
			<a href='<?=site_url();?>contact?type=website&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
			<a href='<?=site_url();?>contact?type=website&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>								   
        </td>
		<td width="20%">
           <b>Message</b>
		   &nbsp;
		   <a href='<?=site_url();?>contact?type=message&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
		   <a href='<?=site_url();?>contact?type=message&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>								   
        </td>
		<td width="10%">
           <b>Date</b>
		   &nbsp;
		   <a href='<?=site_url();?>contact?type=send_date&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
		   <a href='<?=site_url();?>contact?type=send_date&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>								   
        </td>	
		<td width="5%">
            <b>Status</b> 
		    <a href='<?=site_url();?>contact?type=is_read&sort=asc'><img src='<?=site_url();?>images/asc.png' width='15' align='absmiddle'></a>
		    <a href='<?=site_url();?>contact?type=is_read&sort=desc'><img src='<?=site_url();?>images/desc.png' width='15' align='absmiddle'></a>								   
        </td>		
		<td width="5%">
            <b>Action</b> 
        </td>
    </tr>
    <?php foreach($contact as $item){?>
	<tr bgcolor="efefef" align="center">	
		<td>
			<input type='checkbox' name="contact[]" id="contact" value="<?=$item['id']?>">
		</td>
		<td>
			<?=$item['reason']?>  	   	   	   	   	 
		</td>
		<td>
		   <?=$item['email']?>
		</td>
		<!--
		<td align='left'>
		   <?=$item['phone'];?>
		</td>
		-->
		<td align='left'>
		   <?=$item['website'];?>
		</td>
		<td align='left'>
		   <?=word_limiter($item['message'], 15);?>
		</td>
		<td>
		   <?=show_date($item['send_date'])?>
		</td>
		<td id="status<?=$item['id']?>">
		   <?=($item['is_read']==1)?"<a href='javascript:unread(".$item['id'].")'>Read</a>":"<a href='javascript:read(".$item['id'].")'>Unread</a>"?>
		</td>
		<td width="2%">
				<a href='<?=site_url();?>contact/view/<?=$item['id']?>'>View</a> 
		</td>
	</tr>
    <?php }?>
	<tr>
		<td colspan='8'>
			<a href="javascript:CheckAllRead(1,'contact')">Read</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="javascript:CheckAllRead(0,'contact')">Unread</a>
		</td>
	</tr>
</table>
</form>
<?php $this->load->view('footer') ?>

