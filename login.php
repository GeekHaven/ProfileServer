<?php
session_start();
include_once 'php_includes/dbconnect.php';
include 'php_includes/logged_in_redirect.php';


if(isset($_POST['btn-login']))
{
	$roll_no = trim($_POST['roll_no']);
	$pass = trim($_POST['pass']);

	$q1="SELECT roll_no,pass FROM ldap WHERE roll_no = ?";
	$q1_result = $conn->prepare($q1);
	$q1_result->execute([$roll_no]);
	$row = $q1_result->fetch(PDO::FETCH_ASSOC);

		if(count($row) > 0 && password_verify($pass,$row['pass'])){
			$_SESSION['user'] = $row['roll_no'];
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
  <!-- Stylesheets -->
  <!--Import materialize.css-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/temp_login.css">

  <!-- JavaScripts -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/ldap_login.js"></script>

  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

  <nav>
      <div class="nav-wrapper   teal lighten-1"  id="na lighten-1v-wrapper">
        <a href="#" class="brand-logo" id="header-logo">
          <img src="images/logo.jpg">
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down black-text">
          <li><a href="#" id="header-user" style="color:white; font-size:20px; font-family:Robota;"><b>Minion</a></li>
          <li><a href="#" id="header-login" style="color:white; font-size:20px; font-family:Robota;"><b>Login</b></a></li>
          <li><a href="#" id="header-signup" style="color:white; font-size:20px; font-family:Robota;"><b>Sign Up</a></li>
          <li><a href="#" id="header-settings" style="color:white; font-size:20px; font-family:Robota;"><b>Something</a></li>
        </ul>
      </div>
  </nav>
<div id="head" >
    <div class="section no-pad-bot">
      <h1><center> Sign In </center> </h1>
      <div class="container" style="width:500px;">
        <div id="login-form" class="center">
          <form method="post" >
            <center>
            <table class="center" style="  width:80%; height=30%; backgroung:white; border-collapse:separate; border-spacing: 5px;  border-radius:6px;">
              <tr bgcolor="#e0e0e0">
                <td>
                <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input class="validate id="icon_prefix"  type="text" name="roll_no" required ">
          <label for="icon_prefix">Your email</label>
        </div>
      </td>
              </tr>
              <tr bgcolor="#e0e0e0">
                <td>
               <div class="row">
        <div class="input-field col s12 " >
          <i class="material-icons prefix">mode_edit</i>
          <input class="validate id="icon_prefix"  type="password" name="pass" required ">
          <label for="icon_prefix">Your Password</label>
        </div>
      </td>
              </tr>

              <div class="container" style="backgroung:#006064">
              <tr>
                <td><button type="submit" name="btn-login">Sign In</button></td>
              </tr>
              <tr>
                <td><button type="button" name="signup" onclick ="window.location.assign('register.php')">Create a New Account</button></td>
              </tr>
              </div>
            </table>
          </center>                                                                                                                
          </form>
        </div>
      </div>
      <br><br>
    </div>
  </div>
</body>
</html>


