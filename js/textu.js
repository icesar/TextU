
$(function() {
	$('#sms_message').keyup(function(){
		limitChars('sms_message', 150, 'char_limit');
	})
});
 
 
function limitChars(textid, limit, infodiv)
{
	var text = $('#'+textid).val(); 
	var textlength = text.length;
	
	if (textlength > limit)
	{
		$('#' + infodiv).html( limit+' characters left.');
		$('#'+textid).val(text.substr(0,limit));
		return false;
	}
	else
	{
		$('#' + infodiv).html((limit - textlength) +' characters left.');
		return true;
	}
}