<?php
session_start();
include 'dbconnect.php';
$uid=$_SESSION['user'];
$fieldname = mysql_real_escape_string($_POST['fieldname']);
$fieldvalue = mysql_real_escape_string($_POST['fieldvalue']);

$query = 'UPDATE profileserver SET '.$fieldname.' ="'.$fieldvalue.'" WHERE uid = '.$uid;
if(mysql_query($query))
{
	echo $fieldname." updated to ".$fieldvalue;
}
?>