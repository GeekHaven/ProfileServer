<?php
session_start();
include 'php_includes/dbconnect.php';
include 'php_includes/login_auth.php'; 
$roll_no = $_SESSION['user'];

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
		move_uploaded_file($_FILES['resume']['tmp_name'],dirname(__FILE__)."/images/user_pdf/".$roll_no."_resume.pdf");
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



?>


<html>
<head>
	<title>Edit Profile Details</title>
	<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="js/update_profile.js"></script>
	<script type="text/javascript" src="js/jquery-3.0.0.js"></script>
</head>
<body>
	<a href="logout" style="float :right">logout</a>
	<h4> NOTE : double-click to edit , press enter to update</h4>
	First Name 
	<input type = "text"  id ="first_name" value ="<?php echo $first_name; ?>" readonly ></input><br><br>
	Middle Name 
	<input type = "text"  id ="middle_name" value ="<?php echo $middle_name; ?>" readonly></input><br><br>
	Last Name  
	<input type = "text"  id ="last_name"  value ="<?php echo $last_name; ?>" readonly></input><br><br>
	Email 
	<input type="email" id="email" value="<?php echo $email; ?>" readonly></input><br><br>
	Date Of Birth  
	<input type = "date" id ="date_of_birth" value ="<?php echo $date_of_birth; ?>" readonly></input><br><br>
	Year Of Graduation
	<input type = "radio" name="grad_year" id="grad_year" value="2019" <?php echo ($grad_year=='2019')?'checked':'' ?> >2019</input>
	<input type = "radio" name="grad_year" id="grad_year" value="2020" <?php echo ($grad_year=='2020')?'checked':'' ?> >2020</input>
	<input type = "radio" name="grad_year" id="grad_year" value="2021" <?php echo ($grad_year=='2021')?'checked':'' ?> >2021</input>
	<input type = "radio" name="grad_year" id="grad_year" value="2022" <?php echo ($grad_year=='2022')?'checked':'' ?> >2022</input><br><br>
	Batch 
	<input type = "number"  id ="batch"  value ="<?php echo $batch; ?>" size="4" readonly></input><br><br>
	Course Degree
	<input type = "radio" name="course_degree" id="course_degree" value="B.tech" <?php echo ($course_degree=='B.tech')?'checked':'' ?> >B.Tech</input>
	<input type = "radio" name="course_degree" id="course_degree" value="M.tech" <?php echo ($course_degree=='M.tech')?'checked':'' ?> >M.Tech</input><br><br>
	Course Specialization
	<input type = "text"  id ="course_area"  value ="<?php echo $course_area; ?>" readonly></input><br><br>
	About You
	<input type = "text"  id ="about"  value ="<?php echo $about; ?>" readonly></input><br><br>
	Contact No.
	<input type = "number"  id ="contact_no"  value ="<?php echo $contact_no; ?>" maxLength="10"readonly></input><br><br>
	Profile picture
	<form method="POST" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
    <input type="file" name="dp"/>
    <input type="submit" value="upload"/>
    </form>
	Cover Photo
	<form method="POST" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
    <input type="file" name="cover"/>
    <input type="submit" value="upload"/>
    </form>
	Facebook profile link
	<input type = "url"  id ="fb_link"  value ="<?php echo $fb_link; ?>" readonly></input><br><br>
	Google Plus profile link
	<input type = "url"  id ="gp_link"  value ="<?php echo $gp_link; ?>" readonly></input><br><br>
	LinkedIn profile link
	<input type = "url"  id ="li_link"  value ="<?php echo $li_link; ?>" readonly></input><br><br>
	Github profile Link
	<input type = "url"  id ="gh_link"  value ="<?php echo $gh_link; ?>" readonly></input><br><br>
	Website Link 1
	<input type = "url"  id ="custom_link_1"  value ="<?php echo $custom_link_1; ?>" readonly></input><br><br>
	Website Link 2
	<input type = "url"  id ="custom_link_2"  value ="<?php echo $custom_link_2; ?>" readonly></input><br><br>
	<form method="post" enctype="multipart/form-data">
	    Select pdf to upload:
	    <input type="file" name="resume" id="resume">
	    <input type="submit" value="upload" name="submit">
	</form>
	<h3 id="alert"></h3>

	<script type="text/javascript" src="js/form.js"></script>

</body>
</html>
