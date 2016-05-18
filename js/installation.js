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

function show_image()
{
	$('.seal_size').hide();
	$('.name_seal_size').each(function(){
		if($(this).is(':checked'))
			id = $(this).attr('id');
	});	
	$('.seal_size').each(function(){
        var size_id    = $(this).attr('id');
		if(size_id==id)
		{
			var b = $(this).attr('rel');
			if($('#badge'+b).is(':checked'))
				$(this).show();
		}
    });	
}

function date_url_div()
{
	if($('#date_url1').attr('checked')===true) 
	{ 
		$('#seal_text_div').show();	
	}
	else
	{
		$('#seal_text_div').hide();	
	}
}

function laid_out(margin_left)
{
	$('.seal_size').css({'margin-left': margin_left+'px'});
	show_image();
}

function $get(element)
{
	return document.getElementById(element);
}

function UpdateSeal(image)
{
	box = $get('php:txtHeader');
	header = box.value;
	var retVal = true;
	if (header.length > 15)
	{
		alert('You may only include 15 characters in your custom header.');
		header = header.substring(0,15);
		//alert(header);
		box.value = header;
		retVal = false;
	}
	var today = new Date();
	if ($get('php:rblDateFormat_1').checked == true)
		date = '1';
	else
	{
		$get('php:rblDateFormat_0').checked = true;
		date = '0';
	}

	image.src = 'badgeheaderimage.html?name=' 
	+ header + '&image=testimage.jpg&size=small&version=2'
	+ '&datefor=' + date;
	return retVal;
}

function CheckSeal()
{
	return UpdateSeal($get('vs:imgSeal'));        
}

function Type()
{
	image = $get('vs:imgSeal');
	box = $get('php:txtHeader');
	header = box.value;
	var retVal = true;
	if (header.length > 15)
	{
		header = header.substring(0,15);
		box.value = header;
		retVal = false;
	}  
	
	header = MyEscape(header);     
			
	image.src = 'badgeheaderimage.html?name=' 
	+ header + '&image=#type#&size=small&version=2';
	return retVal;
}

function CheckValidUrl(strUrl)
{
        var RegexUrl = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
        return RegexUrl.test(strUrl);
}