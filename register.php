<?php
session_start();
include 'php_includes/logged_in_redirect.php';
include_once 'php_includes/dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$roll_no = trim($_POST['roll_no']);
	$pass = trim($_POST['pass']);
	$pass = password_hash($pass, PASSWORD_DEFAULT);

	// email exists or not
	$query_roll_no = "SELECT roll_no FROM ldap WHERE roll_no= ?";
	$result_roll_no = $conn->prepare($query_roll_no);
	$result_roll_no->execute([$roll_no]);
	$count_roll_no = $result_roll_no->rowCount(); 


	if($count_roll_no == 0){

		$reg = "INSERT INTO ldap(roll_no,pass) VALUES(:roll_no, :pass)";
		$reg_result = $conn->prepare($reg);
		$reg_result->bindParam(':roll_no',$roll_no);
		$reg_result->bindParam(':pass',$pass);

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

	}else if($count_roll_no != 0){
			?>
			<script>alert('Sorry Roll No. already taken ...');</script>
			<?php
	}
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register</title>
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
      <div class="nav-wrapper  cyan darken-4"  id="nav-wrapper">
        <a href="#" class="brand-log o" id="header-logo">
          <img src="images/logo.jpg">
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down black-text">
          <li><a href="login.php" id="header-login" style="color:white; font-size:20px; font-family:Robota;"><b>Login</b></a></li>
        </ul>
      </div>
    </nav>
    <center>
        <h1> Login here </h1>
        <div class="container" id="login-form">
          <form method="post">
            <table width="100%" border="0">
              <div class="row">
              <tr>
                <td>
  
                    <div class="input-field col s12">
                       <i class="material-icons prefix">account_circle</i>
                        <input class="validate" id="icon_prefix"  type="text" name="roll_no" " required ">
                        <label for="icon_prefix">Roll Number</label>
                     </div>
                </td>
                <td>
                    <div class="input-field col s12">
                      <i class="material-icons prefix">mode_edit</i>
                      <input class="validate id="icon_prefix"   type="password" name="pass" required ">
                      <label for="icon_prefix">Your Password</label>
                    </div>
                </td>
              </tr>
              <tr>
                <td colspan='2'><center> <button style="width:40%;" type="submit" name="btn-signup">Register</button></center></td>
              </tr>
              <tr>
                <td bgcolor="#006064" colspan='2'><a href="login.php"><center>Already Registered? Login here</center></a></td>
              </tr>
            </div>
            </table>
          </form>
        </div>
      </center>
      <div class="parallax"><img src="images/bg5.jpg" alt="Unsplashed background img 1" height=200%; width=100%;></div>
    </div>
  <br><br>
</body>
</html>



