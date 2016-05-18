<script>
	function verify(key,val,id,span_id)
	{
		document.body.style.cursor = 'wait';
		var urllink = "<?=base_url()?>user/verify/"+key+"/" + val+"/" + id;	
		$.ajax({
	         type: "POST",
	         url:urllink,
	         success: function(response) {
				if(val==1)
					$("#"+span_id).html("<a href=\"javascript:verify('"+key+"',0,"+id+",'"+span_id+"')\" class='green' >Verified</a>");	
				else
					$("#"+span_id).html("<a href=\"javascript:verify('"+key+"',1,"+id+",'"+span_id+"')\" class='red' >Not Verified</a>");	
	         	//$("#status"+id).html("<a href='javascript:unread("+id+")'>Read</a>");	
	         	document.body.style.cursor = 'default';
	        },
			error: function(){alert('Error ');}
	    }) 
	}
</script>
  <table width="67%" border="0" cellpadding="6" cellspacing="3" align='center' style="border:#bbbbbb 1px solid">
	   <tr>
			<td colspan='2' align='center'><h2>User Verification</h2></td>
	   </tr>
	   <tr>
			<td colspan='2' align='center' class='err'><?=$error?></td>
	   </tr>
	   <tr>
			<td width="14%">
				<b>Verify Email :</b>
			</td>
			<td>
				<?=$user_verify['verify_email']?> 
				[<span <?=($user_verify['is_verify_email']==1)?"class='green' >Verified":"class='red' >Not Verified"?></span>]
			</td>
	   </tr>
	   <tr>
			<td valign='top'>
				<b>Verify Phone:</b>
			</td>
			<td id='category'>
				<?=$user_verify['verify_phone_sitename']?> <br />
				<?=$user_verify['verify_phone']?> 
				[<span <?=($user_verify['is_verify_phone']==1)?"class='green' >Verified":"class='red' >Not Verified"?></span>]
			</td>
	   </tr>
	   <tr>
			<td valign='top'>
				<b>Verify Address:</b>
			</td>
			<td>
				<?=$user_verify['business_name']?> <br />	
				<?=$user_verify['business_website_address']?> <br />
				<?=$user_verify['address']?> <?=($user_verify['address2']=='')?"":"<br />".$user_verify['address2']?> <br />
				<?=$user_verify['city']?>, <?=$user_verify['state']?>, <?=$user_verify['zip_code']?><br />		
				<?=$user_verify['country']?> 
				<?=($user_verify['address_url']!="")?"<br /><a href='".chk_url($user_verify['address_url'])."' target='_blank' >".$user_verify['address_url']."</a>":""?> 
				<?=($user_verify['address_file']!="")?"<br /><a href='".site_url()."verification/download/".$user_verify['id']."' target='_blank' >".$user_verify['address_file']."</a>":""?> 
				[<span id='address_verify' ><?=($user_verify['is_verify_address']==1)?"<a href=\"javascript:verify('is_verify_address',0,".$user_verify['id'].",'address_verify')\" class='green' >Verified":"<a href=\"javascript:verify('is_verify_address',1,".$user_verify['id'].",'address_verify')\" class='red'>Not Verified"?></a></span>]
			</td>
	   </tr>
	   <tr>
			<td >
				<b>Verify URL :</b>
			</td>
			<td>
				<?=$user_verify['verify_url']?> 
				[<span id='url_verify'><?=($user_verify['is_verify_url']==1)?"<a href=\"javascript:verify('is_verify_url',0,".$user_verify['id'].",'url_verify')\" class='green' >Verified":"<a href=\"javascript:verify('is_verify_url',1,".$user_verify['id'].",'url_verify')\" class='red' >Not Verified"?></a></span>]
			</td>
		</tr>
		<tr>
			<td valign='top'>
				<b>Verify Privacy:</b>
			</td>
			<td >
				Compliant with the CAN-SPAM Act    [<span <?=($user_verify['spam_act']==1)?"class='green' >Yes":"class='red' >No"?></span>]
				<br />
				Won't Spam visitor Email address   [<span <?=($user_verify['spam_email']==1)?"class='green' >Yes":"class='red' >No"?></span>]
				<br />
				Won't Share/Rent/Sell visitor's email to spammers without their consent [<span <?=($user_verify['spam_share']==1)?"class='green' >Yes":"class='red' >No"?></span>]
				<br />
				Visitor's information secure [<span <?=($user_verify['spam_information']==1)?"class='green' >Yes":"class='red' >No"?></span>]					 	 	 
				<br />
				[<span <?=($user_verify['is_verify_privacy']==1)?"class='green' >Verified":"class='red' >Not Verified"?></span>]
			</td>
		</tr>
		
		<tr>
			<td valign='top'>
				<b>Verify Non Deceptive:</b>
			</td>
			<td >
				I agree and swear that our company, employees, and/or agents will not use unfair or deceptive acts and/or practices when dealing with visitors and/or customers. [<span <?=($user_verify['is_non_deceptive']==1)?"class='green' >Yes":"class='red' >No"?></span>]
				<br />
				[<span <?=($user_verify['is_non_deceptive']==1)?"class='green' >Verified":"class='red' >Not Verified"?></span>]
			</td>
		</tr>
  </table>