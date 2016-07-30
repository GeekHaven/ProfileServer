<?php
session_start();
include 'php_includes/dbconnect.php';
include 'php_includes/login_auth.php'; 
?>


<html>
<head>
	<title>Edit Profile Details</title>
	<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="js/update_profile.js"></script>
	<script type="text/javascript" src="js/jquery-3.0.0.js"></script>
	
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/temp_login.css">

</head>
<body>
<header>
<nav class="top-nav #e0e0e0 grey lighten-2">
        <div class="container">
          <div class="nav-wrapper"><a class="page-title">Temporary navbar</a></div>
        </div>
      </nav>
<a href="logout" style="float :right">logout</a>

<div class="container">
	<a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only">
	<i class="material-icons">menu</i></a>
</div>
<div class="container">
<ul id="nav-mobile" class="side-nav fixed #424242 grey darken-3">
      <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="mdi-navigation-menu"></i></a>
	</div>
</header>	
<main>
<div  class="container">
<div class="row">
	<form class="col s9">
      <label>Batch</label>
      
		<select class="browser-default">
		  <option value="b2k15">b2k15</option>
		  <option value="b2k16">b2k16</option>
		</select>
		<label>Section:</label>
		<select class="browser-default">
		  <option value="A">A</option>
		  <option value="B">B</option>
		</select>
		<label>Course:</label>
		<select class="browser-default">
		  <option value="IDST">IDST</option>
		  <option value="IDAA">IDAA</option>
		</select>    
		<input type="date" class="datepicker">
		<input type = submit>
            
    </form>
	
</div>
</div>
</header>

	

		<script >
	    
	    	function loadDoc(batchid) 
	    	{
  				var xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange=function() 
  				{
    			if (xhttp.readyState == 4 && xhttp.status == 200) {
      			document.getElementById("demo").innerHTML = xhttp.responseText;
    			}
  			};
  			xhttp.open("GET", "demo_get.asp?t=" + Math.random(), true);
  			xhttp.send();
	    </script>

</main>
 <script type="text/javascript">$( document ).ready(function(){ $(".button-collapse").sideNav();})</script>
 
</body>
</html>
