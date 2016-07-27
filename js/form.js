//make input fields writable and change colour on double click

$("#first_name").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#middle_name").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#last_name").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#email").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#date_of_birth").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#batch").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#course_area").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#about").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#contact_no").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#dp_link").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#cover_link").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#fb_link").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#gp_link").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#li_link").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#gh_link").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#custom_link_1").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#custom_link_2").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

$("#resume_link").dblclick(function(){
    $(this).removeAttr("readonly");
    $(this).css({"background-color":"red" , "color" : "white"});
});

//make writable inputs readable again on pressing enter key and also update their values
$('#first_name').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
    	$(this).attr("readonly","readonly");
    	update('first_name');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#middle_name').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
    	$(this).attr("readonly","readonly");
    	update('middle_name');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#last_name').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
    	$(this).attr("readonly","readonly");
    	update('last_name');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#email').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('email');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#date_of_birth').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('date_of_birth');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('input[name="course_degree"]').click(function(){
	update('course_degree');
});

$('input[name="grad_year"]').click(function(){
    update('grad_year');
});

$('#batch').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('batch');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#course_area').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('course_area');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#about').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('about');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#contact_no').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('contact_no');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#dp_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('dp_link');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#cover_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('cover_link');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#fb_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('fb_link');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#gp_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('gp_link');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#li_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('li_link');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#gh_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('gh_link');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#custom_link_1').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('custom_link_1');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#custom_link_2').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('custom_link_2');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

$('#resume_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('resume_link');
        $(this).css({"background-color":"white" , "color" : "black"});
    }
});

