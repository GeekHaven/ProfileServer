<?php
session_start();
include 'dbconnect.php';
$uid=$_SESSION['user'];
$fieldname = mysql_real_escape_string($_POST['fieldname']);
$fieldvalue = mysql_real_escape_string($_POST['fieldvalue']);


$update = 'UPDATE profileserver SET '.$fieldname.' = :fieldvalue WHERE uid = :uid';
$r_update = $conn->prepare($update);

$r_update->bindParam(':fieldvalue',$fieldvalue);
$r_update->bindParam(':uid',$uid);

if($r_update->execute()){
	echo $fieldname." updated to ".$fieldvalue;
}else{
	echo "failed to update the specified field";
}
?>