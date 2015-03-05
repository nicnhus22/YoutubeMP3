var timer = null;
var URL;
var ELEMENT;

// Event to add a field when the + button is pressed
$('.add-field').click(function(){
	$('#field_container').append('<div class="field"><input type="text" name="videos[]" placeholder="Enter video url" size="50"><i class="fa fa-check-circle-o correct-url"></i><div class="fa fa-times-circle-o wrong-url"></i><br/></div>');
	
	$('.field input').on('input', function(){
	   ELEMENT = $(this).parent();
	   URL = $(this).val();
       clearTimeout(timer); 
       timer = setTimeout(URL_Check, 100);
	});

});

// Launch event for the first field created
$('.remove-field').click(deleteEvent);

// Event to delete the concerned field
function deleteEvent(){
	$(this).closest('.field').remove();
}



// Submit validation form
$('#video_form').submit(function(event){
	event.preventDefault();
});



// Function to auto check if url is correct while the user is typing
// sETTING FOR THE FIRST FIELD ADDED
$('.field input').on('input', function(){
	   ELEMENT = $(this).parent();
	   URL = $(this).val();
       clearTimeout(timer); 
       timer = setTimeout(URL_Check, 100);
});


function URL_Check(){

	var re1='(www\\.youtube\\.com)';	// File Name 1
	var re2='(\\/watch)';	// Unix Path 1
	var re3='(\\?)';	// Any Single Character 1
	var re4='(v)';	// Variable Name 1
	var re5='(=)';	// Any Single Character 2
	var re6='((?:[a-z][a-z0-9_]*))';	// Variable Name 2

	var p = new RegExp(re1+re2+re3+re4+re5+re6,'i');
	var bool = p.test(URL);

    if (URL == ""){
    	ELEMENT.children('.wrong-url').css('display','none');
    	ELEMENT.children('.correct-url').css('display','none');
    }else if(bool){
    	ELEMENT.children('.wrong-url').css('display','none');
    	ELEMENT.children('.correct-url').css('display','inline');
    }else{
    	ELEMENT.children('.correct-url').css('display','none');
    	ELEMENT.children('.wrong-url').css('display','inline');
    }
    	
}


 