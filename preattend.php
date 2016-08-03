<?php
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
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/user.css" rel="stylesheet" type="text/css">

</head>
<body>
	<div>
		<nav>
		    <div id="nav-wrapper">
		      <a href="#" class="brand-logo" id="header-logo">
		        <img src="images/iiita_logo.gif">
		      </a>
		      <ul id="nav-mobile" class="right hide-on-med-and-down">
		      	<!-- <img src="minion.jpg" id="profile-picture-small"> -->
		        <li class="active"><a href="#" id="header-user">Minion</a></li>
		        <li><a href="#" id="header-login">Login</a></li>
		        <li><a href="#" id="header-signup">Sign Up</a></li>
		        <li><a href="logout" style="float :right">logout</a></li>
		      </ul>
		    </div>
		</nav>
		<div  class="container">
			<div class="row">
				<div class="col s12 m4 l8 offset-l2">
					<div class="formcontainer">
						<h3 id="formTitle">Selection Form</h3>
						<form class="col s12" action="php_includes/preattend_include.php" method="POST">
					      <div class="row">
					        <div class="input-field col s6">
					        	<label>Batch:</label>
					            <br><br>
					          <select name = "batch" class="browser-default">
							  	<option value="b2k15">b2k15</option>
							  	<option value="b2k16">b2k16</option>
							  </select>
					        </div>
					        <div class="input-field col s6">
					        	<label>Section:</label>
					            <br><br>
					            <select name = "section" class="browser-default">
								  <option value="A">A</option>
								  <option value="B">B</option>
								</select>
					        </div> 
					        <div class="input-field col s12">
					            <label>Course:</label>
					            <br><br>
								<select name = "course" class="browser-default">
								  <option value="IDST">IDST</option>
								  <option value="IDAA">IDAA</option>
								</select>
					        </div>
					        <div class="input-field col s12">
					            <label>Date:</label>
					            <br><br>
								<input name = "class_date" type="date" class="datepicker">
					        </div>
					      </div>  
						  <button class="btn waves-effect waves-light" type="submit" name="action">Submit
						    <i class="material-icons right">send</i>
						  </button>
					    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">$( document ).ready(function(){ $(".button-collapse").sideNav();})</script>
 
</body>
</html>
