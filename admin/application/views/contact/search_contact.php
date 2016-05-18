<?php $this->load->view('header') ?>
<link   type="text/css" href="../../css/jquery.ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../../js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../../js/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../../js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript">
$(function() {
	$("#date_from").datepicker({
		showOn: 'button',
		buttonImage: '../../images/calendar.gif',
		buttonImageOnly: true
	});
	$("#date_to").datepicker({
		showOn: 'button',
		buttonImage: '../../images/calendar.gif',
		buttonImageOnly: true
	});
});

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
<form name='f1' id='f1' method='POST'>
<table cellspacing="1" cellpadding="2" border="0" width="100%">
	<tr>
		<td colspan="7">
			<form method='post'>
			<table>
				<tr>
					<td colspan="2">
						<b>SEARCH CONTACT</b>
					</td>
				</tr>
				<tr><td>Reason  : </td>
					<td><select  name="reason" >
							<option value="" <?=($_REQUEST['reason']==''?"selected":"")?>>All</option>
							<option value="Sales" <?=($_REQUEST['reason']=='Sales'?"selected":"")?>>Sales</option>
							<option value="Support" <?=($_REQUEST['reason']=='Support'?"selected":"")?>>Support</option>
							<option value="Partnership" <?=($_REQUEST['reason']=='Partnership'?"selected":"")?>>Partnership</option>
							<option value="Other" <?=($_REQUEST['reason']=='Other'?"selected":"")?>>Other</option>
						</select>
					</td>
				</tr>
				<tr><td>Email : </td><td><input type='text' name='email' value="<?=$_REQUEST['email']?>" size='60'></td></tr>
				<!--<tr><td>Phone :   </td><td><input type='text' name='phone' value="<?=$_REQUEST['phone']?>" size='60'></td></tr>-->
				<tr><td>Website : </td><td><input type='text' name='website' value="<?=$_REQUEST['website']?>"  size='60'></td></tr>
				<tr>
					<td>Date :    </td>
					<td>
						<input type='text' id='date_from' size='15' name='date_from' readonly="" value="<?=$_REQUEST[date_from]?>" />
						To
						<input type='text' id='date_to' size='15' name='date_to' readonly="" value="<?=$_REQUEST[date_to]?>" />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type='submit' name='submit' value="Search Contact">
					</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
	<?if($_REQUEST['submit']!=''){?>
		<tr>
			<td colspan="7">
					<b>Total Found : <?=count($user)?></b><br><b></b>
			</td>
		</tr>
		<tr bgcolor="bbbbbb" align="center">
        <td width="1%">
            <input type='checkbox' id='check_read' value='<?=$row['id']?>'  onclick="jqCheckAll('f1','contact');">
        </td>
		<td width="10%">
            <b>Reason</b>
        </td>
        <td width="15%">
            <b>Email</b> 			
        </td>
		<!--
		<td width="15%">
            <b>Phone</b>			
        </td>
		-->
		<td width="15%">
           <b>Website</b>			
        </td>
		<td width="20%">
           <b>Message</b>		   
        </td>
		<td width="10%">
           <b>Date</b>		   
        </td>	
		<td width="5%">
            <b>Status</b>		   
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
			   <?=show_date($item['send_date']);?>
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
	<?php }?>
</table>
<form>
<?php $this->load->view('footer') ?>

