var url = window.location.href; 
var trustUrl = url.split('//')[1];
function showverify_seal(verify_url)
{
	window.open(verify_url+trustUrl,'Seal','scrollbars=yes,width=640,height=660,menubar=no,toolbar=no');
} 
 
 
