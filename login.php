<?php
session_start();
include_once 'php_includes/dbconnect.php';
include 'php_includes/logged_in_redirect.php';


if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$pass = mysql_real_escape_string($_POST['pass']);
	
	$email = trim($email);
	$pass = trim($pass);

	$q1="SELECT uid,pass FROM profileserver WHERE email = ?";
	$q1_result = $conn->prepare($q1);
	$q1_result->execute([$email]);
	$row = $q1_result->fetch(PDO::FETCH_ASSOC);

		if(count($row) > 0 && password_verify($pass,$row['pass'])){
			$_SESSION['user'] = $row['uid'];
			header("Location: form.php");
		}else{
			?>
    			<script>alert('Username / Password Seems Wrong !');</script>
    		<?php
		}
}		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>profileserver</title>

<link rel="stylesheet" href="css/temp_login.css" type="text/css" />
</head>
<body>

<nav>
    <ul class="nav">
        <li>
          
        </li></ul></nav>
<center>
<div id="login-form" class="center">
<form method="post" >
<table class="center "  border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><button type="button" name="signup" onclick ="window.location.assign('register.php')">Create a New Account</button></td>
</tr>

</tr>
</table>

</form>
	
</div>
</center>
</div>
</body>
</html>
