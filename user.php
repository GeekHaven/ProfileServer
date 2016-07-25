<?php
session_start();
include 'php_includes/dbconnect.php';

function nohtml($input , $encoding = 'UTF-8'){
	return htmlentities($input, ENT_QUOTES | ENT_HTML5 , $encoding);
}

$roll_no = $_GET['roll_no'];
$q = "SELECT * FROM user_info WHERE roll_no = :roll_no";
$q_result = $conn->prepare($q);
$q_result->bindParam(':roll_no',$roll_no);
$q_result->execute();
$user_count = $q_result->rowCount();
if($user_count == 0){
	header('Location: 404');
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
	<meta charset="utf-8"/>
	<title id="title">User Profile Server</title>
	<meta name="author" content="Geekhaven" />
	<link href="css/user.css" rel="stylesheet" type="text/css">
    	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    	<link rel="stylesheet" href="css/materialize.min.css">
</head>

<body>
  <nav>
    <div id="nav-wrapper">
      <a href="#" class="brand-logo" id="header-logo">
        <img src="images/logo.jpg">
      </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<!-- <img src="minion.jpg" id="profile-picture-small"> -->
        <li class="active"><a href="#" id="header-user">Minion</a></li>
        <li><a href="login" id="header-login">Login</a></li>
        <li><a href="register" id="header-signup">Sign Up</a></li>
        <li><a href="edit" id="header-settings"><i class="material-icons setting-button">settings</i></a></li>
      </ul>
    </div>
  </nav>

   <div class="user-profile">
     <div id="cover-profile">
       <div id="cover-photo">
         <img src=<?php echo "\"images/user_img/".nohtml($roll_no)."_cover.jpeg\"" ?>>
       </div>
       <span id="profile-picture">
        <center><img src=<?php echo "\"images/user_img/".nohtml($roll_no)."_dp.jpeg\"" ?>/></center>
       </span>
     </div>
    <!-- <div id="cover-links">
        <a  class="waves-effect waves-light btn-large cover-link" id="coverlink-1"><b>Friends - </b><h7 id="coverlink-1-value">100</h7></a>
        <a class="waves-effect waves-light btn-large cover-link" id="coverlink-2"><b>Followers - </b><h7 id="coverlink-2-value">30</h7></a>
        <a class="waves-effect waves-light btn-large cover-link" id="coverlink-3"><b>Subjects</b></a>
        <a class="waves-effect waves-light btn-large cover-link" id="coverlink-4"><b>Option</b></a>
      </div>
      <br><br>-->
		<div id="user-about-stuff">
			<div>
				<div id="about-info1">
					<table>
						<tr title="mail address">
							<td><p class="detail"><?php echo nohtml($email) ?></p></td>
							<td ><i class="material-icons">mail_outline</i> </td>
							<td class="filler"></td>
						</tr>
						<tr title="Phone number">
							<td><p class="detail"><?php echo nohtml($contact_no) ?></p></td>
							<td><i class="material-icons">contact_phone</i> </td>
							<td class="filler"></td>
						</tr>
						<tr title="Date Of birth">
							<td><p class="detail"><?php echo nohtml($date_of_birth) ?></p></td>
							<td ><i class="material-icons">today</i> </td>
							<td class="filler"></td>
						</tr>
					</table>
				</div>
				<h3 id="user-name"><?php echo nohtml($first_name)." ".nohtml($middle_name)." ".nohtml($last_name) ?></h3>
				<h5 id="user-id"><?php echo nohtml($roll_no) ?></h5>
				<center>
				 <p id="about-me"><i><?php echo nohtml($about) ?></i></p>
				 <hr width="90%">
				</center>
			</div>
			<div id="container">
				<div  id="user-info2">
					<div class="icon-container tooltipped" data-mark = '0' data-position="right" data-delay="50" data-tooltip="Education">
						<i class="material-icons icons">school</i>
					</div>
					<hr>
					<div class="icon-container tooltipped" data-mark='1' data-position="right" data-delay="50" data-tooltip="Skills">
						<i class="material-icons icons">business_center</i>
					</div>
					<hr>
					<div class="icon-container tooltipped" data-mark='2' data-position="right" data-delay="50" data-tooltip="Projects">
						<i class="material-icons icons">laptop_mac</i>
					</div>
					<hr>
					<div class="icon-container tooltipped" data-mark='3' data-position="right" data-delay="50" data-tooltip="Resume">
						<i class="material-icons icons">insert_drive_file</i>
					</div>
				</div>

				<div id="user-info3">
					<div id="education-about" class="part hid sho">
						<div class="half half-left">
							<center>
								<h3>Education</h3>
								<!-- <hr width="80%"> -->
								<table>

									<tr>
										<td>Batch</td><td><?php echo nohtml($batch) ?></td>
									</tr>
									<tr>
										<td>Course </td>
										<td>
											<ul>
												<li><?php echo nohtml($course_degree) ?></li>
												<li><?php echo nohtml($course_area) ?></li>
											</ul>
										</td>
									</tr>
									<tr>
										<td>Graduation Year</td><td><?php echo nohtml($grad_year) ?></td>
									</tr>
								</table>
							</center>
						</div>
						<div class="half half-right">
							<img src="images/iiita.jpg" />
						</div>
					</div>
					<div id="skill-about" class="part hid">
						<center>
							<h3>Skills</h3>
						</center>
						<table>
						<?php
							if($skill_q_result->execute()){
								
								if($skill_q_result->rowCount() != 0){

									while($row = $skill_q_result->fetch(PDO::FETCH_ASSOC)){
										echo '<td class="skill"><div class="chip"><img src="images/iiita.jpg">';
										echo nohtml($row['skill_title']);
										echo '</div></td>';
										$skill_points = $row['skill_points'];
										while($skill_points){
											echo '<td><span class="dot dot-select"></span></td>';
											$skill_points--;
										}
										$skill_rem = 5 - $row['skill_points'];
										while($skill_rem){
											echo '<td><span class="dot"></span></td>';
											$skill_rem--;
										}
										echo '</tr>';
							}
						}
						}
						?>
						</table>
					</div>
					<div id="project-about" class="part hid" >
						<h3>Projects</h3>
						<ul class="collapsible" data-collapsible="accordion">
						<?php 
							if($project_q_result->execute()){
								if($project_q_result->rowCount()){

									while ($row = $project_q_result->fetch(PDO::FETCH_ASSOC)){
										echo '<li><div class="collapsible-header"><i class="material-icons">filter_drama</i>';
										echo nohtml($row['project_title']);
										echo '</div><div class="collapsible-body"><p>';
										echo nohtml($row['project_about']);
										echo '</p></div></li>';
									}
							}
						}
						?>
					  </ul>
					</div>
					<div id="resume-about" class="part hid">
						<object width="100%" height="100%" data=<?php echo "\"images/user_pdf/".nohtml($roll_no)."_resume.pdf\""?>></object>
					</div>
				</div>
			</div>
		</div>
	</div>

    </div>

	</div>
    <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/user.js"></script>

</body>
</html>
