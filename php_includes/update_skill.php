<?php
session_start();
include 'dbconnect.php';
include 'login_auth.php';
$roll_no=$_SESSION['user'];
$skill = $_POST['skill'];
$fieldvalue = $_POST['fieldvalue'];
$action = $_POST['action'];


if($action == "update"){

	$skill_array = explode("_",$skill);
	$fieldname = 'skill_'.$skill_array[1];
	$skill_id = $skill_array[2];

	$update = 'UPDATE user_skills SET '.$fieldname.' = :fieldvalue WHERE skill_id = :skill_id AND roll_no = :roll_no';
	$r_update = $conn->prepare($update);
	$r_update->bindParam(':roll_no',$roll_no);
	$r_update->bindParam(':fieldvalue',$fieldvalue);
	$r_update->bindParam(':skill_id',$skill_id);

	if($r_update->execute()){
		echo $fieldname." updated to ".$fieldvalue;
	}else{
		echo "failed to update the specified field";
	}
} else if ($action == "delete") {
	
	$skill_id = $skill;

	$delete = 'DELETE FROM user_skills  WHERE skill_id = :skill_id AND roll_no = :roll_no';
	$r_delete = $conn->prepare($delete);
	$r_delete->bindParam(':roll_no',$roll_no);
	$r_delete->bindParam(':skill_id',$skill_id);

	if($r_delete->execute()){
		echo "The skill record has been deleted";
	}else{
		echo "failed to delete the specified record";
	}
} else if ($action == "add") {
	$insert = 'INSERT INTO user_skills(roll_no,skill_title,skill_points) VALUES(:roll_no,:skill_title,:skill_points)';
	$r_insert = $conn->prepare($insert);
	$r_insert->bindParam(':roll_no',$roll_no);
	$r_insert->bindParam(':skill_title',$skill);
	$r_insert->bindParam(':skill_points',$fieldvalue);

	if($r_insert->execute()){
		echo "the given values were inserted";
	}else{
		echo "failed to insert the specified data";
	}
}
?>