function update_project(project){

	var xhttp = new XMLHttpRequest();

	fieldvalue = document.getElementById(project).value;
	
	var send_string = "project=" + project + "&fieldvalue=" + fieldvalue + "&action=update";
	xhttp.onreadystatechange = function(){

			if(xhttp.readyState == 4 && xhttp.status == 200){
					document.getElementById("alert").innerHTML = xhttp.responseText;
					console.log(xhttp.responseText);

			}};

			xhttp.open("POST", "php_includes/update_project.php", true);
  			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  			xhttp.send(send_string);	
}

function delete_project(project){

	var xhttp = new XMLHttpRequest();

	var send_string = "project=" + project + "&fieldvalue=gibberish &action=delete";
	xhttp.onreadystatechange = function(){

			if(xhttp.readyState == 4 && xhttp.status == 200){
					document.getElementById("alert").innerHTML = xhttp.responseText;
					console.log(xhttp.responseText);
					location.reload();
			}};

			xhttp.open("POST", "php_includes/update_project.php", true);
  			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  			xhttp.send(send_string);	
}

function add_project(){

	var xhttp = new XMLHttpRequest();

	project = document.getElementById("p_title_add").value;
	fieldvalue = document.getElementById("p_about_add").value;
	
	var send_string = "project=" + project + "&fieldvalue=" + fieldvalue + "&action=add";
	xhttp.onreadystatechange = function(){

			if(xhttp.readyState == 4 && xhttp.status == 200){
					document.getElementById("alert").innerHTML = xhttp.responseText;
					console.log(xhttp.responseText);
					location.reload();
			}};

			xhttp.open("POST", "php_includes/update_project.php", true);
  			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  			xhttp.send(send_string);	
}
