function delete_resume(){

	var xhttp = new XMLHttpRequest();
	
	var send_string = "action=delete_resume";
	xhttp.onreadystatechange = function(){

			if(xhttp.readyState == 4 && xhttp.status == 200){
					document.getElementById("alert").innerHTML = xhttp.responseText;
					console.log(xhttp.responseText);
			}};

			xhttp.open("POST", "php_includes/delete_resume.php", true);
  			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  			xhttp.send(send_string);	
		}



