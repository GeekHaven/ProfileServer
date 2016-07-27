function update_skill(skill){

	var xhttp = new XMLHttpRequest();

	fieldvalue = document.getElementById(skill).value;
	
	var send_string = "skill=" + skill + "&fieldvalue=" + fieldvalue + "&action=update";
	xhttp.onreadystatechange = function(){

			if(xhttp.readyState == 4 && xhttp.status == 200){
					document.getElementById("alert").innerHTML = xhttp.responseText;
					console.log(xhttp.responseText);

			}};

			xhttp.open("POST", "php_includes/update_skill.php", true);
  			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  			xhttp.send(send_string);	
}

function delete_skill(skill){

	var xhttp = new XMLHttpRequest();

	var send_string = "skill=" + skill + "&fieldvalue=gibberish &action=delete";
	xhttp.onreadystatechange = function(){

			if(xhttp.readyState == 4 && xhttp.status == 200){
					document.getElementById("alert").innerHTML = xhttp.responseText;
					console.log(xhttp.responseText);
					location.reload();
			}};

			xhttp.open("POST", "php_includes/update_skill.php", true);
  			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  			xhttp.send(send_string);	
}

function add_skill(){
	fieldvalue = document.getElementById("s_points_add").value;
	skill = document.getElementById("s_title_add").value;

	if(fieldvalue == "") {
		alert("please enter a number between 0 and 5");
	} else if(fieldvalue >=0 && fieldvalue < 6){
		var xhttp = new XMLHttpRequest();

		var send_string = "skill=" + skill + "&fieldvalue=" + fieldvalue + "&action=add";
		xhttp.onreadystatechange = function(){

		if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("alert").innerHTML = xhttp.responseText;
				console.log(xhttp.responseText);
				location.reload();
		}};

		xhttp.open("POST", "php_includes/update_skill.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(send_string);	
	} else {
		alert("Please Enter a valid input");
	}


	
}
