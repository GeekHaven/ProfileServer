<?php
session_start();
include 'php_includes/dbconnect.php';
include 'php_includes/login_auth.php'; 
$roll_no = $_SESSION['user'];

function nohtml($input , $encoding = 'UTF-8'){
	return htmlentities($input, ENT_QUOTES | ENT_HTML5 , $encoding);
}

//image upload starts
require_once  "php_includes/bulletproof-2.0.1/bulletproof.php";


$image = new Bulletproof\Image($_FILES);

if($image["dp"]){

	$image->setName($roll_no."_dp");
	$image->setMime(["jpeg"]); 
    $image->setSize("128","1048576"); 
    $image->setDimension("1920","1920");
    $image->setLocation("images/user_img", "0644");  

    $upload = $image->upload(); 
     
    if($upload){
        echo "image uploaded";
    }else{
        echo $image["error"]; 
    }
}

if($image["cover"]){

	$image->setName($roll_no."_cover");
	$image->setMime(["jpeg"]); 
    $image->setSize("128","1048576"); 
    $image->setDimension("1920","1920");
    $image->setLocation("images/user_img", "0644"); 

    $upload = $image->upload(); 
     
    if($upload){
        echo "image uploaded";
    }else{
        echo $image["error"]; 
    }
}
//image upload ends

//pdf upload starts
//please check if fileinfo is enabled on your server,
//some hosting providers do not give access to fileinfo functionality by default
if(isset($_POST["submit"]))
{
	if ($_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
	    die("Upload failed with error " . $_FILES['file']['error']);
	}

	$finfo = finfo_open(FILEINFO_MIME_TYPE);
	$mime = finfo_file($finfo, $_FILES['resume']['tmp_name']);
	$ok = false;

	if($mime == "application/pdf"){
		$ok = true;
	} else{
		echo "Sorry,the file was not uploaded";
	}

	if($ok == true){
		if(move_uploaded_file($_FILES['resume']['tmp_name'],dirname(__FILE__)."/images/user_pdf/".$roll_no."_resume.pdf")){
			chmod(dirname(__FILE__)."/images/user_pdf/".$roll_no."_resume.pdf",0666);
		}
		echo "The file was successfully uploaded";
	}
}
//pdf upload ends

$q = "SELECT * FROM user_info WHERE roll_no = :roll_no";
$q_result = $conn->prepare($q);
$q_result->bindParam(':roll_no',$roll_no);
$q_result->execute();
$user_count = $q_result->rowCount();
if($user_count == 0){
	$create_user = "INSERT INTO user_info(roll_no) VALUES(:roll_no)";
	$create_user_result = $conn->prepare($create_user);
	$create_user_result->bindParam(':roll_no',$roll_no);
	$create_user_result->execute();

	$q = "SELECT * FROM user_info WHERE roll_no = :roll_no";
	$q_result = $conn->prepare($q);
	$q_result->bindParam(':roll_no',$roll_no);
	$q_result->execute();
}

	$field_array = $q_result->fetch(PDO::FETCH_ASSOC);
	$first_name = $field_array['first_name'];
	$middle_name = $field_array['middle_name'];
	$last_name = $field_array['last_name'];
	$email = $field_array['email'];
	$date_of_birth = $field_array['date_of_birth'];
	$grad_year = $field_array['grad_year'];
	$batch = $field_array['batch'];
	$course_degree = $field_array['course_degree'];
	$course_area = $field_array['course_area'];
	$about = $field_array['about'];
	$contact_no = $field_array['contact_no'];
	$fb_link = $field_array['fb_link'];
	$gp_link = $field_array['gp_link'];
	$li_link = $field_array['li_link'];
	$gh_link = $field_array['gh_link'];
	$custom_link_1 = $field_array['custom_link_1'];
	$custom_link_2 = $field_array['custom_link_2'];

	$project_q = "SELECT * from user_projects WHERE roll_no = :roll_no";
	$project_q_result = $conn->prepare($project_q);
	$project_q_result->bindParam(":roll_no",$roll_no);

	$skill_q = "SELECT * FROM user_skills WHERE roll_no = :roll_no";
	$skill_q_result = $conn->prepare($skill_q);
	$skill_q_result->bindParam(":roll_no",$roll_no);

?>


<html>
<head>
	<title>Edit Profile Details</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/form.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="js/update_profile.js"></script>
	<script type="text/javascript" src="js/update_project.js"></script>
	<script type="text/javascript" src="js/update_skill.js"></script>
	<script type="text/javascript" src="js/delete_resume.js"></script>
	<script type="text/javascript" src="js/jquery-3.0.0.js"></script>
</head>
<body>
	<a href="logout" style="float :right">logout</a>
	<h4> NOTE : double-click to edit , press enter to update</h4>
	<div class="form-group">
	<label for="first_name">First Name</label>
	<input type = "text"  class="form-control" id ="first_name" value ="<?php echo nohtml($first_name); ?>" readonly ></input><br><br>
	Middle Name 
	<input type = "text" class="form-control" id ="middle_name" value ="<?php echo nohtml($middle_name); ?>" readonly></input><br><br>
	Last Name  
	<input type = "text" class="form-control"   id ="last_name"  value ="<?php echo nohtml($last_name); ?>" readonly></input><br><br>
	Email 
	<input type="email" class="form-control"  id="email" value="<?php echo nohtml($email); ?>" readonly></input><br><br>
	Date Of Birth  
	<input type = "date" class="form-control"  id ="date_of_birth" value ="<?php echo nohtml($date_of_birth); ?>" readonly></input><br><br>
	Year Of Graduation
	<input type = "radio" class="form-control"  name="grad_year" id="grad_year" value="2019" <?php echo ($grad_year=='2019')?'checked':'' ?> >2019</input>
	<input type = "radio" class="form-control"  name="grad_year" id="grad_year" value="2020" <?php echo ($grad_year=='2020')?'checked':'' ?> >2020</input>
	<input type = "radio" class="form-control"  name="grad_year" id="grad_year" value="2021" <?php echo ($grad_year=='2021')?'checked':'' ?> >2021</input>
	<input type = "radio" class="form-control"  name="grad_year" id="grad_year" value="2022" <?php echo ($grad_year=='2022')?'checked':'' ?> >2022</input><br><br>
	Batch 
	<input type = "number" class="form-control"   id ="batch"  value ="<?php echo nohtml($batch); ?>" size="4" readonly></input><br><br>
	Course Degree
	<input type = "radio" class="form-control"  name="course_degree" id="course_degree" value="B.tech" <?php echo ($course_degree=='B.tech')?'checked':'' ?> >B.Tech</input>
	<input type = "radio" class="form-control"  name="course_degree" id="course_degree" value="M.tech" <?php echo ($course_degree=='M.tech')?'checked':'' ?> >M.Tech</input><br><br>
	Course Specialization
	<input type = "text" class="form-control"   id ="course_area"  value ="<?php echo nohtml($course_area); ?>" readonly></input><br><br>
	About You
	<input type = "text" class="form-control"   id ="about"  value ="<?php echo nohtml($about); ?>" readonly></input><br><br>
	Contact No.
	<input type = "number" class="form-control"   id ="contact_no"  value ="<?php echo nohtml($contact_no); ?>" maxLength="10"readonly></input><br><br>
	
	<!-- project section starts -->
	<?php 
		if($project_q_result->execute()){
			if($project_q_result->rowCount()){
				while($row = $project_q_result->fetch(PDO::FETCH_ASSOC)){	
					echo '<label class="form-control" id ="p_title_label_'.nohtml($row['project_id']).'">Project Title &nbsp&nbsp</label>';
					echo '<input type = "text" class="form-control"   id ="p_title_'.nohtml($row['project_id']).'" value ="'.nohtml($row['project_title']).'" readonly></input>&nbsp&nbsp';
					echo '<label class="form-control" id ="p_about_label_'.nohtml($row['project_id']).'">About Project&nbsp&nbsp</label>';
					echo '<input type = "text" class="form-control"   id ="p_about_'.nohtml($row['project_id']).'" value ="'.nohtml($row['project_about']).'" readonly></input>&nbsp&nbsp';
					echo '<button class="btn btn-primary" id ="p_delete_'.nohtml($row['project_id']).'" onclick = "delete_project(\''.nohtml($row['project_id']).'\');">delete</button><br><br>';
				}
			}
		}
	?>
	<label id = "p_title_label_add">Project Title&nbsp&nbsp</label>
	<input type = "text" class="form-control"  id = "p_title_add" ></input>
	<label id = "p_about_label_add">About Project&nbsp&nbsp</label>
	<input type = "text" class="form-control"  id = "p_about_add" ></input>
	<button  class="btn btn-primary" id = "p_add" onclick="add_project()">add</button><br><br>
	<!-- project section ends -->

	Profile picture
	<form method="POST" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
    <input type="file" class="form-control"  name="dp"/>
    <input type="submit" class="form-control"  value="upload"/>
    </form>
	Cover Photo
	<form method="POST" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
    <input type="file" class="form-control"  name="cover"/>
    <input type="submit" class="form-control"  value="upload"/>
    </form>

    <!-- skill section starts -->
	<?php 
		if($skill_q_result->execute()){
			if($skill_q_result->rowCount()){
				while($row = $skill_q_result->fetch(PDO::FETCH_ASSOC)){	
					echo '<label class="form-control" id ="s_title_label_'.nohtml($row['skill_id']).'">Skill Title &nbsp&nbsp</label>';
					echo '<input type = "text" class="form-control" id ="s_title_'.nohtml($row['skill_id']).'" value ="'.nohtml($row['skill_title']).'" readonly></input>&nbsp&nbsp';
					echo '<label class="form-control" id ="s_points_label_'.nohtml($row['skill_id']).'">Skill Points(Out of 5)&nbsp&nbsp</label>';
					echo '<input type = "number" class="form-control" min="0" max="5" id ="s_points_'.nohtml($row['skill_id']).'" value ="'.nohtml($row['skill_points']).'" readonly></input>&nbsp&nbsp';
					echo '<button class="btn btn-primary" id ="s_delete_'.nohtml($row['skill_id']).'" onclick = "delete_skill(\''.nohtml($row['skill_id']).'\');">delete</button><br><br>';
				}
			}
		}
	?>
	<label id = "s_title_label_add">Skill Title&nbsp&nbsp</label>
	<input type = "text" class="form-control"  id = "s_title_add" ></input>
	<label id = "s_points_label_add">Skill Points(Out of 5)&nbsp&nbsp</label>
	<input type = "number" class="form-control"  min="0" max="5" id = "s_points_add" ></input>
	<button  class="btn btn-primary" id = "s_add" onclick="add_skill()">add</button><br><br>
	<!-- skill section ends -->

	Facebook profile link
	<input type = "url" class="form-control"   id ="fb_link"  value ="<?php echo nohtml($fb_link); ?>" readonly></input><br><br>
	Google Plus profile link
	<input type = "url" class="form-control"  class="form-control"   id ="gp_link"  value ="<?php echo nohtml($gp_link); ?>" readonly></input><br><br>
	LinkedIn profile link
	<input type = "url" class="form-control"   id ="li_link"  value ="<?php echo nohtml($li_link); ?>" readonly></input><br><br>
	Github profile Link
	<input type = "url" class="form-control"   id ="gh_link"  value ="<?php echo nohtml($gh_link); ?>" readonly></input><br><br>
	Website Link 1
	<input type = "url" class="form-control"   id ="custom_link_1"  value ="<?php echo nohtml($custom_link_1); ?>" readonly></input><br><br>
	Website Link 2
	<input type = "url"  id ="custom_link_2"  value ="<?php echo nohtml($custom_link_2); ?>" readonly></input><br><br>
	<form method="post" enctype="multipart/form-data">
	    Select pdf to upload:
	    <input type="file" name="resume" id="resume">
	    <input type="submit" class="form-control"  value="upload" name="submit">
	</form>
	<button class="btn btn-primary" onclick="delete_resume()">delete existing resume</button>
	</div>
	
	<h3 id="alert"></h3>

	<script type="text/javascript" src="js/form.js"></script>
	<script type="text/javascript">
		<?php 
		if($project_q_result->execute()){
			if($project_q_result->rowCount()){
				while($row = $project_q_result->fetch(PDO::FETCH_ASSOC)){	
					echo '$("#p_title_'.nohtml($row['project_id']).'").dblclick(function(){$(this).removeAttr("readonly");});';
					echo '$("#p_about_'.nohtml($row['project_id']).'").dblclick(function(){$(this).removeAttr("readonly");});';
					echo '$("#p_title_'.nohtml($row['project_id']).'").bind("keyup", function(e) {if( e.keyCode === 13 ){ $(this).attr("readonly","readonly");update_project("p_title_'.nohtml($row['project_id']).'");$(this).css({"background-color":"white" , "color" : "black"});}});';
					echo '$("#p_about_'.nohtml($row['project_id']).'").bind("keyup", function(e) {if( e.keyCode === 13 ){ $(this).attr("readonly","readonly");update_project("p_about_'.nohtml($row['project_id']).'");$(this).css({"background-color":"white" , "color" : "black"});}});';
				}
			}
		}
		?>
		<?php 
		if($skill_q_result->execute()){
			if($skill_q_result->rowCount()){
				while($row = $skill_q_result->fetch(PDO::FETCH_ASSOC)){	
					echo '$("#s_title_'.nohtml($row['skill_id']).'").dblclick(function(){$(this).removeAttr("readonly");});';
					echo '$("#s_points_'.nohtml($row['skill_id']).'").dblclick(function(){$(this).removeAttr("readonly");});';
					echo '$("#s_title_'.nohtml($row['skill_id']).'").bind("keyup", function(e) {if( e.keyCode === 13 ){ $(this).attr("readonly","readonly");update_skill("s_title_'.nohtml($row['skill_id']).'");$(this).css({"background-color":"white" , "color" : "black"});}});';
					echo '$("#s_points_'.nohtml($row['skill_id']).'").bind("keyup", function(e) {if( e.keyCode === 13 ){ if($(this).val() == ""){ alert("please enter a number");} else if( $(this).val() >=0 && $(this).val() < 6 ) {$(this).attr("readonly","readonly");update_skill("s_points_'.nohtml($row['skill_id']).'");$(this).css({"background-color":"white" , "color" : "black"});} else {alert("please enter a valid input")}}});';
				}
			}
		}
		?>
	</script>

</body>
</html>
