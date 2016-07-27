<?php
session_start();
include 'dbconnect.php';
include 'login_auth.php';

$roll_no=$_SESSION['user'];
$action = $_POST['action'];

if($action === "delete_resume"){
	if(!file_exists('../images/user_pdf/'.$roll_no.'_resume.pdf')){
		echo "You have not uploaded any resume , please upload your resume first.";
	} else if (unlink('../images/user_pdf/'.$roll_no.'_resume.pdf')){
		echo "Your uploaded resume was deleted";
	} else {
		echo "something went wrong";
	}
}
else {
	echo "What the hell are you even doing here . Shooo.... Shooo....";
}

?>