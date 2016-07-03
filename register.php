<?php
session_start();
include 'php_includes/logged_in_redirect.php';
include_once 'php_includes/dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['uname']);
	$email = trim($_POST['email']);
	$pass = trim($_POST['pass']);
	$fname = trim($_POST['first_name']);
	$lname = trim($_POST['last_name']);
	$mname = trim($_POST['middle_name']);
	
	$pass = password_hash($pass, PASSWORD_DEFAULT);

	// email exists or not
	$query_email = "SELECT email FROM profileserver WHERE email= ?";
	$result_email = $conn->prepare($query_email);
	$result_email->execute([$email]);
	$count_email = $result_email->rowCount(); 

	// uname exists or not
	$query_uname = "SELECT email FROM profileserver WHERE uname= ?";
	$result_uname = $conn->prepare($query_uname);
	$result_uname->execute([$uname]);
	$count_uname = $result_uname->rowCount(); 


	if($count_email == 0 && $count_uname == 0){

		$reg = "INSERT INTO profileserver(uname,email,pass,fname,mname,lname) VALUES(:uname, :email, :pass, :fname, :mname, :lname)";
		$reg_result = $conn->prepare($reg);
		$reg_result->bindParam(':uname',$uname);
		$reg_result->bindParam(':email',$email);
		$reg_result->bindParam(':pass',$pass);
		$reg_result->bindParam(':fname',$fname);
		$reg_result->bindParam(':mname',$mname);
		$reg_result->bindParam(':lname',$lname);

		if($reg_result->execute())
		{
			?>
			<script>alert('successfully registered ');</script>
			<?php
				header("Location: login.php");
		}
		else{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}	

	}else if($count_email == 0 && $count_uname != 0){
			?>
			<script>alert('Sorry Username already taken ...');</script>
			<?php
	}else if($count_email != 0 && $count_uname == 0){
			?>
			<script>alert('Sorry Email Id already taken ...');</script>
			<?php
	}else if($count_email != 0 && $count_uname != 0){
			?>
			<script>alert('Sorry Username and Email Id both arealready taken ...');</script>
			<?php
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link rel="stylesheet" href="css/temp_login.css" type="text/css" />
</head>
<body>
<center>
<div id = "snow">
<nav>
    <ul class="nav">
        <li>
          <a href="index.php">
            <span class="icon-home"></span>
            <span class="screen-reader-text">Home</span>
          </a>
        </li></ul></nav>
<div id="login-form">
<form method="post">
<table width="60%" border="0">
<tr>
<td><input type="text" name="first_name" placeholder="First Name" required /></td>
</tr>
<tr>
<td><input type="text" name="middle_name" placeholder="Middle Name" required /></td>
</tr>
<tr>
<td><input type="text" name="last_name" placeholder="Last Name" required /></td>
</tr>
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Register</button></td>
</tr>
<tr>
<td><button type="button" name="button" onclick="window.location.assign('login.php')">Already Registered? Login here</button></td>

</tr>
</table>
</form>
</div>
</center></div>
</body>
</html>

