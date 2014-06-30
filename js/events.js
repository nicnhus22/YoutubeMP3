
// Event to add a field when the + button is pressed
$('.add-field').click(function(){
	$('#field_container').append('<div class="field"><input type="text" name="videos[]" placeholder="Enter video url" size="50"><i class="fa fa-times-circle-o remove-field"></i><br/></div>');
	$('.remove-field').click(deleteEvent);
});

// Launch event for the first field created
$('.remove-field').click(deleteEvent);

// Event to delete the concerned field
function deleteEvent(){
	$(this).closest('.field').remove();
}






$('#video_form').submit(function(event){
	alert();
	event.preventDefault();
});



// Function to auto check if url is correct while the user is typing
var timer = null;
var URL;
$('.field input').keydown(function(){
	   URL = $(this).val();
       clearTimeout(timer); 
       timer = setTimeout(URL_Check, 300);
});


function URL_Check(){

	var re1='(www\\.youtube\\.com)';	// File Name 1
	var re2='(\\/watch)';	// Unix Path 1
	var re3='(\\?)';	// Any Single Character 1
	var re4='(v)';	// Variable Name 1
	var re5='(=)';	// Any Single Character 2
	var re6='((?:[a-z][a-z0-9_]*))';	// Variable Name 2

	var p = new RegExp(re1+re2+re3+re4+re5+re6);
	
	alert(p.match(URL));
}


 