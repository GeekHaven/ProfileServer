<?php
session_start();
include 'dbconnect.php';
//include 'login_auth.php';
$roll_no=$_SESSION['user'];
$project = $_POST['project'];
$fieldvalue = $_POST['fieldvalue'];
$action = $_POST['action'];


if($action == "update"){

	$project_array = explode("_",$project);
	$fieldname = 'project_'.$project_array[1];
	$project_id = $project_array[2];

	$update = 'UPDATE user_projects SET '.$fieldname.' = :fieldvalue WHERE project_id = :project_id';
	$r_update = $conn->prepare($update);
	$r_update->bindParam(':fieldvalue',$fieldvalue);
	$r_update->bindParam(':project_id',$project_id);

	if($r_update->execute()){
		echo $fieldname." updated to ".$fieldvalue;
	}else{
		echo "failed to update the specified field";
	}
} else if ($action == "delete") {
	
	$project_id = $project;

	$delete = 'DELETE FROM user_projects  WHERE project_id = :project_id';
	$r_delete = $conn->prepare($delete);
	$r_delete->bindParam(':project_id',$project_id);

	if($r_delete->execute()){
		echo "The project record has been deleted";
	}else{
		echo "failed to delete the specified record";
	}
} else if ($action == "add") {
	$insert = 'INSERT INTO user_projects(roll_no,project_title,project_about) VALUES(:roll_no,:project_title,:project_about)';
	$r_insert = $conn->prepare($insert);
	$r_insert->bindParam(':roll_no',$roll_no);
	$r_insert->bindParam(':project_title',$project);
	$r_insert->bindParam(':project_about',$fieldvalue);

	if($r_insert->execute()){
		echo "the given values were inserted";
	}else{
		echo "failed to insert the specified data";
	}
}
?>