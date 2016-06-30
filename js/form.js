$("#fname").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});
$("#mname").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});
$("#lname").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});
$("#uname").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});
$("#dob").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});
$('#fname').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
    	$(this).attr("readonly","readonly");
    	update('fname');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});
$('#mname').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
    	$(this).attr("readonly","readonly");
    	update('mname');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});
$('#lname').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
    	$(this).attr("readonly","readonly");
    	update('lname');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});
$('#uname').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
    	$(this).attr("readonly","readonly");
    	update('uname');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});
$('#dob').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('dob');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});
$('input[name="course"]').click(function(){
	update('course');
});
$('input[name="grad_year"]').click(function(){
    update('grad_year');
});
