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
		<td colspan="2">
			<img src="../images/users.png" width="30" align="absmiddle"> <b>All Default Message</b>
		</td>
		<td colspan="2" align="right">
			 <a href='add_default_message'>Add Default Message</a>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<b>Total Found : <?=count($contact)?></b><br><b></b>
		</td>
	</tr>
    <tr bgcolor="bbbbbb" align="center">
		<td width="25%">
            <b>Subject</b>
			
        </td>
		<td width="55%">
           <b>Message</b>
		   
        </td>
		<td width="10%">
           <b>Date</b>
		  
        </td>		
		<td width="10%">
            <b>Action</b> 
        </td>
    </tr>
    <?php foreach($message as $item){?>
	<tr bgcolor="efefef" align="center">	
		<td>
			<?=$item['subject']?>  	   	   	   	   	 
		</td>
		<td align='left'>
		   <?=$item['message']?>
		</td>
		<td>
		   <?=show_date($item['update_date'])?>
		</td>
		<td width="2%">
			[ <a href='<?=site_url();?>contact/delete_default_message/<?=$item['id']?>' onclick="return confirm('Do you want to Delete')">Delete</a> ]
			[ <a href='<?=site_url();?>contact/add_default_message/<?=$item['id']?>'>Edit</a> ]
		</td>
	</tr>
    <?php }?>
</table>
</form>
<?php $this->load->view('footer') ?>

