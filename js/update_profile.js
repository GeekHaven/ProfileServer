function update(fieldname){

	var xhttp = new XMLHttpRequest();
	
	var fieldvalue = $('input[name="' + fieldname + '"]:checked').val();
	if(fieldvalue === undefined ){
		fieldvalue = document.getElementById(fieldname).value;
	}
	
	var send_string = "fieldname=" + fieldname + "&fieldvalue=" + fieldvalue ;

	
	xhttp.onreadystatechange = function(){

			if(xhttp.readyState == 4 && xhttp.status == 200){
					
					document.getElementById("alert").innerHTML = xhttp.responseText;
					console.log(xhttp.responseText);
			}};

			xhttp.open("POST", "php_includes/update_profile.php", true);
  			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  			xhttp.send(send_string);
			
		}


