<?php
session_start();
include 'php_includes/dbconnect.php';
include 'php_includes/login_auth.php'; 

$uid = $_SESSION['user'];
$q = "SELECT * FROM profileserver WHERE uid = :uid";
$q_result = $conn->prepare($q);
$q_result->bindParam(':uid',$uid);
$q_result->execute();
$field_array = $q_result->fetch(PDO::FETCH_ASSOC);
$fname = $field_array['fname'];
$mname = $field_array['mname'];
$lname = $field_array['lname'];
$uname = $field_array['uname'];
$course = $field_array['course'];
$dob = $field_array['dob'];
$grad_year = $field_array['grad_year'];
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
<a href="logout.php" style="float :right">logout</a>

<div class="container">
	<a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only">
	<i class="material-icons">menu</i></a>
</div>
<ul id="nav-mobile" class="side-nav fixed #424242 grey darken-3">
      <li><a href="#!">First Sidebar Link</a></li>
      <li><a href="#!">Second Sidebar Link</a></li>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="mdi-navigation-menu"></i></a>

<div  class="container">
	<div class="row">
		<div class="col s12 m9 l10">
			
		</div>
	</div>
</div>

</header>
<main>
	<div class="container">
		<div class="row">
			<div class="col s12 m9 l10">
            <table class="highlight">
              <thead>
                <tr>
                    <th data-field="id">Roll No.</th>
                    <th data-field="name">Name</th>
                    <th data-field="present">Status</th>            
                </tr>
              </thead>

              <tbody>

                	    <?php
							$sql = "SELECT uid,fname,mname,lname FROM profileserver;";
							$sql_result = $conn->prepare($sql);
							$sql_result->execute();
							while($row = $sql_result->fetch())
							 {
							  echo "<tr>";
							  echo "<td>".$row['uid']."</td>";
							  echo "<td>".$row['fname']." ".$row['mname']." ".$row['lname']." "."</font></td>";
							  echo "<td><div class='switch'>
										    <label >
										      <span id='".$row['uid']."A'>Absent</span>
										      <input type='checkbox' id ='".$row['uid']."C' checked onclick='color(".$row['uid'].")'>
										      <span class='lever green' id ='".$row['uid']."S'></span>
										      <span id='".$row['uid']."P' style='color:green'>Present</span>
										    </label>
										</div></td>";
							  echo "</tr>";
		  
		 }
	    //select * from profileserver
	    ?>

              </tbody>
            </table>			
			</div>
		</div>
	</div>

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
 <script type="text/javascript">function color(uid)
 									{
 											x=document.getElementById(uid+"C");
 											//alert("hi"+uid);
 											if(x.checked==false)
 											{
 											document.getElementById(uid+"A").style.color="red";
 											document.getElementById(uid+"S").className="lever red";
 											document.getElementById(uid+"P").style.color="black";
 											}
 											else
 											{
 											document.getElementById(uid+"P").style.color="green";
 											document.getElementById(uid+"S").className="lever green";
 											document.getElementById(uid+"A").style.color="black";

 											}
 											
 									}
 </script>
</body>
</html>
