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

	$res=mysql_query("SELECT uid, uname, pass FROM profileserver WHERE email='$email'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); // if uname/pass correct it must return row
	
	if($count == 1 && $row['pass']==md5($pass)){
		$_SESSION['user'] = $row['uid'];
		header("Location: form.php");
	}
	else{
		?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
	}
	
}
?>

<!DOCTYPE html >
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>profileserver</title>
<link rel="stylesheet" href="css/temp_login.css" type="text/css" />

</head>

<body>
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
		</table>
	</form>
	</div>
	</center>
</body>
</html>
