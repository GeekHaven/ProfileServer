//make input fields writable and change colour on double click

$("#first_name, #middle_name, #last_name, #email, #date_of_birth, #batch, #course_area, #about, #contact_no, #dp_link, #cover_link, #fb_link, #gp_link, #li_link, #gh_link, #custom_link_1, #custom_link_2, #resume_link").dblclick(function(){
    $(this).removeAttr("readonly");
    //$(this).css({"background-color":"red" , "color" : "white"});
});

//make writable inputs readable again on pressing enter key and also update their values
$('#first_name').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
    	$(this).attr("readonly","");
    	update('first_name');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#middle_name').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
    	$(this).attr("readonly","readonly");
    	update('middle_name');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#last_name').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
    	$(this).attr("readonly","readonly");
    	update('last_name');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#email').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('email');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#date_of_birth').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('date_of_birth');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
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
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#course_area').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('course_area');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#about').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('about');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#contact_no').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('contact_no');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#dp_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('dp_link');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#cover_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('cover_link');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#fb_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('fb_link');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#gp_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('gp_link');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#li_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('li_link');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#gh_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('gh_link');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#custom_link_1').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('custom_link_1');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#custom_link_2').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('custom_link_2');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

$('#resume_link').bind('keyup', function(e) {
    if ( e.keyCode === 13 ) { 
        $(this).attr("readonly","readonly");
        update('resume_link');
        $(this).css({"background-color":"#eee" , "opacity" : "1"});
    }
});

