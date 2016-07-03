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
</head>
<body>
<a href="logout.php" style="float :right">logout</a>
<h4> NOTE : double-click to edit , press enter to update</h4>
First Name <input type = "text"  id ="fname" value ="<?php echo $fname; ?>" readonly ></input><br><br>
Middle Name <input type = "text"  id ="mname" value ="<?php echo $mname; ?>" readonly></input><br><br>
Last Name  <input type = "text"  id ="lname"  value ="<?php echo $lname; ?>" readonly></input><br><br>
username  <input type = "text"  id ="uname" value ="<?php echo $uname; ?>" readonly></input><br><br>
Date Of Birth  <input type = "date" id ="dob" value ="<?php echo $dob; ?>" readonly></input><br><br>
Course
<input type = "radio" name="course" id="course" value="B.tech" <?php echo ($course=='B.tech')?'checked':'' ?> >B.Tech</input>
<input type = "radio" name="course" id="course" value="M.tech" <?php echo ($course=='M.tech')?'checked':'' ?> >M.Tech</input><br><br>
Year Of Graduation
<input type = "radio" name="grad_year" id="grad_year" value="2019" <?php echo ($grad_year=='2019')?'checked':'' ?> >2019</input>
<input type = "radio" name="grad_year" id="grad_year" value="2020" <?php echo ($grad_year=='2020')?'checked':'' ?> >2020</input>
<input type = "radio" name="grad_year" id="grad_year" value="2019" <?php echo ($grad_year=='2021')?'checked':'' ?> >2021</input>
<input type = "radio" name="grad_year" id="grad_year" value="2020" <?php echo ($grad_year=='2022')?'checked':'' ?> >2022</input><br><br><br><br><br><br><br><br>
<h3 id="alert"></h3>

<script type="text/javascript" src="js/form.js"></script>

</body>
</html>
