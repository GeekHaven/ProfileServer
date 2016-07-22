<?php
session_start();
include 'dbconnect.php';
$roll_no=$_SESSION['user'];
$fieldname = mysql_real_escape_string($_POST['fieldname']);
$fieldvalue = mysql_real_escape_string($_POST['fieldvalue']);


$update = 'UPDATE user_info SET '.$fieldname.' = :fieldvalue WHERE roll_no = :roll_no';
$r_update = $conn->prepare($update);

$r_update->bindParam(':fieldvalue',$fieldvalue);
$r_update->bindParam(':roll_no',$roll_no);

if($r_update->execute()){
	echo $roll_no;
	echo $fieldname." updated to ".$fieldvalue;
}else{
	echo "failed to update the specified field";
}
?>