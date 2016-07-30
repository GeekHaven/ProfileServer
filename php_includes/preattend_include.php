<?php
session_start();
include 'dbconnect.php';
include 'login_auth.php';

$batch = $_POST['batch'];
$section = strtolower($_POST['section']);
$course = $_POST['course'];
$class_date = $_POST['class_date'];
$class_date = str_replace("-", "", $class_date);
$lecture_id = $batch.$section.$course.$class_date;
$tname  = $batch."_".$section;
$query = "alter table ".$tname." add ".$lecture_id." int(2);";
echo $query;
$query_result = $conn->prepare($query);
$query_result->execute();
?>