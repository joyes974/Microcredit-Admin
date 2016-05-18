<?=$this->load->view('merchants/header');?>
<?=$this->load->view('myaccount_inner_header');?>
<script language="javascript">	
function chkvaild()
{
	var d=document.settings;
	var field =d.placement;
	
	if(d.placement.value=="")
	{
		alert('Enter the Page Place Name');
		d.placement.focus();
		return false;
	}
	 
	var valid = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 "
	var ok = "yes";
	var temp;
	
	for (var i=0; i<field.value.length; i++) 
	{
		temp = "" + field.value.substring(i, i+1);
		if (valid.indexOf(temp) == "-1") ok = "no";
	}
	
	if (ok == "no") 
	{
		alert("Please submit a placement name that contains only numbers, letters and spaces.");
		field.focus();
		field.select();
		return false;
	}
			
	return true;
}
	 
function popitup(url) 
{
	newwindow=window.open(url,'name','height=500,width=640,menubar=no,toolbar=no,resizable=no');
	if (window.focus) {newwindow.focus()}
	return false;
}

function show_image(div_name,count)
{
	for(var i=1;i<=count;i++)
	{
		document.getElementById('small_size'+i).style.display="none";
		document.getElementById('medium_size'+i).style.display="none";
		document.getElementById('large_size'+i).style.display="none";
	}
	for(i=1;i<=count;i++)
	{
		document.getElementById(div_name+i).style.display="block";
	}
	
}
</script>
<!-- HEADER CONTENT -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td background="<?=site_url();?>images/bg_in.jpg" style="background-repeat:repeat-x; background-position:top;">&nbsp;</td>
        <td width="992" background="<?=site_url();?>images/bg_in.jpg">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="19"><img src="<?=site_url();?>images/in_main_box_1.jpg" width="19" height="22" /></td>
            <td background="<?=site_url();?>images/in_main_box_2.jpg">&nbsp;</td>
            <td width="21"><img src="<?=site_url();?>images/in_main_box_3.jpg" width="21" height="22" /></td>
          </tr>
         
          <tr>
            <td background="<?=site_url();?>images/in_main_box_8.jpg">&nbsp;</td>
            <td bgcolor="#E1E1E1">
<!-- HEADER CONTENT -->	
	
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<form name="settings" action="" method="post" onsubmit="return chkvaild();" >
	<?if($this->common->show_video_link('install')):?>
	<tr>
		<td width="66%" height="32" align="left" class="menu_alinks"></td>
		<td width="31%" align="right" valign="middle" >Watch Help Video </td>
		<td width="3%" align="left" valign="middle" ><div align="right">
		<a href="<?=site_url();?>video/install.html" onclick="return popitup('<?=site_url();?>video/install.html')"><img src="../images/video_icon.jpg" alt="video" width="15" height="15" border="0"/></a></div></td>
	</tr>
	<?else:?>
	<tr>
		<td colspan="3"><br /></td>
	</tr>
	<?endif?>
	<tr>
		<td colspan="3"><?=$this->common->content('installation_wizard_top');?>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="padding:10px;">
			<strong>1) Which seal(s) do you want to display?</strong>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="padding-left:35px;">
			<?$i=1;foreach($seal as $item):?>
				<input type="checkbox" name="badge[]" value="<?=$item['id']?>"  /><?=$item['type_name']?>&nbsp;&nbsp;&nbsp;&nbsp;
			<?endforeach?>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="padding:10px;">
			<strong>2) Choose a size of the seal image?</strong>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="padding-left:35px;">
			<table border='0' width="100%">
			<tr>
				<td width='230' valign='top'>
					<input type="radio" name="seal_size" onclick="show_image('small_size','<?=count($seal_type)?>')" value="small"  />Small&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="seal_size" onclick="show_image('medium_size','<?=count($seal_type)?>')" value="medium" checked  />Medium&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="seal_size" onclick="show_image('large_size','<?=count($seal_type)?>')" value="large"  />Large&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
				<td>
					<table width='100%'>
						<tr>
							<td align='center'>
								<?
								  $image_array= array();
								  $i=0; 
								  foreach($seal_type as $item): $i++; 
								?>
									<?$type = $this->common->seal_image($item["id"],$image_array)?>
									<?$image_array = array_merge($image_array, array($type['id']));?>
									<div id='small_size<?=$i?>' style='display:none; float:left; margin-left:20px'>
										<img src="../seal/<?=$type['image_url']?>" border="0" width="<?=$info['small_width']?>" />
									</div>
									<div id='medium_size<?=$i?>' style="float:left; margin-left:20px;">
										<img src="../seal/<?=$type['image_url']?>" border="0" />
									</div>
									<div id='large_size<?=$i?>' style="display:none; float:left;  margin-left:20px;">
										<img src="../seal/<?=$type['image_url']?>" border="0" width="<?=$info['large_width']?>" />								
									</div>
									<?
										if($i==3)
											break;
									?>
								<?
								  endforeach;
								?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="padding:10px;">
			<strong>3) How do you want them laid out?</strong>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="padding-left:35px;">
			<input type="radio" name="table2" value="hor"   />Horizontally &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="table2" value="ver"  />Vertically
		</td>
	</tr>
	<tr>
		<td colspan="3" style="padding:10px;">
			<strong>4) How do you want them aligned in the html table ?</strong>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="padding-left:35px;">
			<table>
			<tr>
				<td width="95" height="26" nowrap="nowrap"><input type="radio" name="align2"   value="tl"  />Top left</td>

				<td width="98" nowrap="nowrap"><input type="radio" name="align2" value="tc"   />Top center</td>
				<td width="133" ><input type="radio" name="align2" value="tr"   />Top right</td>
			</tr>
			<tr>
				<td nowrap="nowrap" ><input type="radio" name="align2" value="ml"   />Middle left</td>
				<td nowrap="nowrap"><input type="radio" name="align2" value="mc"  />Middle center</td>
				<td nowrap="nowrap"><input type="radio" name="align2" value="mr"   />Middle right</td>
			</tr>
			<tr>
				<td nowrap="nowrap"><input type="radio" name="align2" value="bl"  />Bottom left</td>
				<td nowrap="nowrap"><input type="radio" name="align2" value="bc"   />Bottom center</td>

				<td nowrap="nowrap"><input type="radio" name="align2" value="br"   />Bottom right</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="padding:10px;">
			<strong>5) Where on the page will you be displaying the seal(s)?</strong>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="padding-left:40px;">
		<input type="text" name="placement" value="Join Page"  onBlur="validate(this)"/></td>
	</tr>
	<tr>
	  <td colspan="3"  align="center" style="padding:10px;">
		<input type="submit" class="red_button" value="Generate Installation Code" name="submit" />
	  </td>
	</tr>
	</form>
<?if($show=='ok'):?>
	<tr>
	  <td colspan="3"  align="left" valign="top">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td width="50%" align="left" valign="top">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td  valign="top" style="padding:2px;padding-right:30px;">
					<?=$this->common->content('installation_wizard_left');?>
				</td>
			</tr>
			<?if($this->common->show_video_link('display')):?>
				<tr>
					<td  valign="middle" style="text-align:right;padding-right:30px;">Watch Help Video <a href="video/display.html" onclick="return popitup('<?=site_url();?>video/display.html')"><img align="absmiddle" src="../images/video_icon.jpg" alt="video" width="15" height="15" border="0"/></a></td>
				</tr>
			<?else:?>
				<tr>
					<td  valign="middle" style="text-align:right;padding-right:30px;">
						<br />
					</td>
				</tr>
			<?endif?>
			<tr>
			  <td align="left" valign="top" >
				<textarea name="sealdepcode" cols="113" rows="8" onclick="this.focus();this.select()"><?$this->load->view('merchants/display_code')?></textarea>
			  </td>
			</tr>
			<tr> 
			  <td  valign="bottom" style="padding:5px;padding-right:30px;">
				<?=$this->common->content('installation_wizard_right_note');?>
			  </td>
			</tr>
			
			<tr>
				<td  valign="top" style="padding:2px;padding-right:30px;">
					<br /><br />
				</td>
			</tr>
			
			<tr>
				<td  valign="top" style="padding:2px;padding-right:30px;">
					<?=$this->common->content('installation_wizard_right');?>
				</td>
			</tr>
			<?if($this->common->show_video_link('conversion')):?>
				<tr>
					<td  valign="middle" style="text-align:right;padding-right:30px;">Watch Help Video <a href="video/conversion.html" onclick="return popitup('<?=site_url();?>video/conversion.html')"><img align="absmiddle" src="../images/video_icon.jpg" alt="video" width="15" height="15" border="0"/></a></td>
				</tr>
			<?else:?>
				<tr>
					<td  valign="middle" style="text-align:right;padding-right:30px;">
						<br />
					</td>
				</tr>
			<?endif?>
			<tr>
			  <td align="left" valign="top">
				<textarea name="sealdepcode" cols="113" rows="8" onclick="this.focus();this.select()">

<img src="<?=site_url();?>members/conversion.html?member=<?=$user['memid']?>" border="0" height="1" width="1">
				</textarea>
			  </td>
			</tr>
			<tr>
			  <td  valign="top" style="padding:2px;padding-right:30px;">
				<?=$this->common->content('installation_wizard_left_note');?>
			  </td>			  
			</tr> 
		  </table>
		  </td>
		</tr>
	  </table>
	  </td>
	</tr>
<?endif;?>
</table> 				
		

<?$this->load->view('footer');?>		