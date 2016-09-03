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

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#" id="header-logo">
	        <img alt="Brand" src="images/iiita_logo.gif" style="height: 1.7em !important; width: 2em; margin-top: -0.1em; ">
	      </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Home</a></li> 
	        <li><a href="#">Minion</a></li> 
	        <li><a href="logout">Logout</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3>Edit User Details</h3>
				<div class="form-group">
	
					<label for="first_name">First Name</label>
					<input type = "text"  class="form-control" id ="first_name" value ="< echo nohtml($first_name); ?>" readonly ></input><br><br>
					
					<label for="middle_name">Middle Name</label> 
					<input type = "text" class="form-control" id ="middle_name" value ="< echo nohtml($middle_name); ?>" readonly></input><br><br>
					
					<label for="last_name"> Last Name </label>  
					<input type = "text" class="form-control"   id ="last_name"  value ="< echo nohtml($last_name); ?>" readonly></input><br><br>
					
					<label for="email">Email </label>
					<input type="email" class="form-control"  id="email" value="< echo nohtml($email); ?>" readonly></input><br><br>
					
					<label for="date_of_birth">Date Of Birth</label>  
					<input type = "date" class="form-control"  id ="date_of_birth" value ="< echo nohtml($date_of_birth); ?>" readonly></input><br><br>
					
					<label for="grad_year">Year Of Graduation</label>
					
					<label class="radio-inline">
					<input type = "radio"  name="grad_year" id="grad_year" value="2019" < echo ($grad_year=='2019')?'checked':'' ?> >2019
					</label>
					
					<label class="radio-inline">
					<input type = "radio"  name="grad_year" id="grad_year" value="2020" < echo ($grad_year=='2020')?'checked':'' ?> >2020
					</label>
					
					<label class="radio-inline">
					<input type = "radio"  name="grad_year" id="grad_year" value="2021" < echo ($grad_year=='2021')?'checked':'' ?> >2021
					</label>
					
					<label class="radio-inline">
					<input type = "radio"   name="grad_year" id="grad_year" value="2022" < echo ($grad_year=='2022')?'checked':'' ?> >2022
					</label><br><br>
					
					<label for="batch">Batch </label>
					<input type = "number" class="form-control"   id ="batch"  value ="< echo nohtml($batch); ?>" size="4" readonly></input><br><br>
					
					<label for="course_degree">Course Degree</label>
					
					<label class="radio-inline">
					<input type = "radio" name="course_degree" id="course_degree" value="B.tech" < echo ($course_degree=='B.tech')?'checked':'' ?> >B.Tech
					</label>

					<label class="radio-inline">
					<input type = "radio" name="course_degree" id="course_degree" value="M.tech" < echo ($course_degree=='M.tech')?'checked':'' ?> >M.Tech
					</label>
					<br><br>
					
					<label for="course_area">Course Specialization</label>
					<input type = "text" class="form-control"   id ="course_area"  value ="< echo nohtml($course_area); ?>" readonly></input><br><br>
					
					<label for="about">About You</label>
					<textarea type = "text" class="form-control"  rows="6"  id ="about" readonly>< echo nohtml($about); ?></textarea><br><br>
					
					<label for="contact_no">Contact No.</label>
					<input type = "number" class="form-control"   id ="contact_no"  value ="< echo nohtml($contact_no); ?>" maxLength="10"readonly></input><br><br>
					
					<!-- project section starts -->
					< 
						if($project_q_result->execute()){
							if($project_q_result->rowCount()){
								while($row = $project_q_result->fetch(PDO::FETCH_ASSOC)){	
									echo '<label for="p_title_'.nohtml($row['project_id']).'" id ="p_title_label_'.nohtml($row['project_id']).'">Project Title &nbsp&nbsp</label>';
									echo '<input type = "text" class="form-control"   id ="p_title_'.nohtml($row['project_id']).'" value ="'.nohtml($row['project_title']).'" readonly></input>&nbsp&nbsp';
									echo '<label for="p_about_'.nohtml($row['project_id']).'" id ="p_about_label_'.nohtml($row['project_id']).'">About Project&nbsp&nbsp</label>';
									echo '<textarea type = "text" rows = "6" class="form-control"   id ="p_about_'.nohtml($row['project_id']).'" readonly>'.nohtml($row['project_about']).'</textarea>&nbsp&nbsp';
									echo '<button class="btn btn-primary" id ="p_delete_'.nohtml($row['project_id']).'" onclick = "delete_project(\''.nohtml($row['project_id']).'\');">delete</button><br><br>';
								}
							}
						}
					?>
					<label id = "p_title_label_add">Project Title&nbsp&nbsp</label>
					<input type = "text" class="form-control"  id = "p_title_add" ></input>
					<label id = "p_about_label_add">About Project&nbsp&nbsp</label>
					<textarea type = "text" rows="6" class="form-control"  id = "p_about_add" ></textarea>
					<button  class="btn btn-primary" id = "p_add" onclick="add_project()">add</button><br><br>
					<!-- project section ends -->

					Profile picture
					<form method="POST" enctype="multipart/form-data">
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
					<label class="btn btn-primary btn-file">
				    Browse<input type="file" style="display: none"   name="dp"/>
				    </label>
				    <input type="submit" class = "btn btn-info"  value="upload"/>
				    </form>
					
					Cover Photo
					<form method="POST" enctype="multipart/form-data">
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
					<label class="btn btn-primary btn-file">
				    Browse<input type="file" style="display: none"  name="cover"/>
					</label>
				    <input type="submit" class = "btn btn-info" value="upload"/>
				    </form>

				    <!-- skill section starts -->
					< 
						if($skill_q_result->execute()){
							if($skill_q_result->rowCount()){
								while($row = $skill_q_result->fetch(PDO::FETCH_ASSOC)){	
									echo '<label for=s_title_'.nohtml($row['skill_id']).'" value ="'.nohtml($row['skill_title']).'" id ="s_title_label_'.nohtml($row['skill_id']).'">Skill Title &nbsp&nbsp</label>';
									echo '<input type = "text" class="form-control" id ="s_title_'.nohtml($row['skill_id']).'" value ="'.nohtml($row['skill_title']).'" readonly></input>&nbsp&nbsp';
									echo '<label for="s_points_'.nohtml($row['skill_id']).'" id ="s_points_label_'.nohtml($row['skill_id']).'">Skill Points(Out of 5)&nbsp&nbsp</label>';
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

					<label for="fb_link">Facebook profile link</label>
					<input type = "url" class="form-control"   id ="fb_link"  value ="< echo nohtml($fb_link); ?>" readonly></input><br><br>
					
					<label for="gp_link">Google Plus profile link</label>
					<input type = "url" class="form-control"  class="form-control"   id ="gp_link"  value ="< echo nohtml($gp_link); ?>" readonly></input><br><br>
					
					<label for="li_link">LinkedIn profile link</label>
					<input type = "url" class="form-control"   id ="li_link"  value ="< echo nohtml($li_link); ?>" readonly></input><br><br>
					
					<label for="gh_link">Github profile Link</label>
					<input type = "url" class="form-control"   id ="gh_link"  value ="< echo nohtml($gh_link); ?>" readonly></input><br><br>
					
					<label for="custom_link_1">Website Link 1</label>
					<input type = "url" class="form-control"   id ="custom_link_1"  value ="< echo nohtml($custom_link_1); ?>" readonly></input><br><br>
					
					<label for="custom_link_2">Website Link 2</label>
					<input class="form-control" type = "url"  id ="custom_link_2"  value ="< echo nohtml($custom_link_2); ?>" readonly></input><br><br>
					
					<form method="post" enctype="multipart/form-data">
					    <label for="resume">Select pdf to upload:</label>
					    <label class="btn btn-primary btn-file">
				    	Browse<input type="file" style="display: none" name="resume" id="resume">
					    </label>
					    <input type="submit" class="btn btn-info" value="upload" name="submit">
					</form>
					<button class="btn btn-danger" onclick="delete_resume()">delete existing resume</button>
				</div>
				
				<h3 id="alert"></h3>
			</div>
		</div>
	</div>
	

	<script type="text/javascript" src="js/form.js"></script>
	<script type="text/javascript">
		< 
		if($project_q_result->execute()){
			if($project_q_result->rowCount()){
				while($row = $project_q_result->fetch(PDO::FETCH_ASSOC)){	
					echo '$("#p_title_'.nohtml($row['project_id']).'").dblclick(function(){$(this).removeAttr("readonly");});';
					echo '$("#p_about_'.nohtml($row['project_id']).'").dblclick(function(){$(this).removeAttr("readonly");});';
					echo '$("#p_title_'.nohtml($row['project_id']).'").bind("keyup", function(e) {if( e.keyCode === 13 ){ $(this).attr("readonly","readonly");update_project("p_title_'.nohtml($row['project_id']).'");$(this).css({"background-color":"#eee" , "color" : "black"});}});';
					echo '$("#p_about_'.nohtml($row['project_id']).'").bind("keyup", function(e) {if( e.keyCode === 13 ){ $(this).attr("readonly","readonly");update_project("p_about_'.nohtml($row['project_id']).'");$(this).css({"background-color":"#eee" , "color" : "black"});}});';
				}
			}
		}
		?>
		< 
		if($skill_q_result->execute()){
			if($skill_q_result->rowCount()){
				while($row = $skill_q_result->fetch(PDO::FETCH_ASSOC)){	
					echo '$("#s_title_'.nohtml($row['skill_id']).'").dblclick(function(){$(this).removeAttr("readonly");});';
					echo '$("#s_points_'.nohtml($row['skill_id']).'").dblclick(function(){$(this).removeAttr("readonly");});';
					echo '$("#s_title_'.nohtml($row['skill_id']).'").bind("keyup", function(e) {if( e.keyCode === 13 ){ $(this).attr("readonly","readonly");update_skill("s_title_'.nohtml($row['skill_id']).'");$(this).css({"background-color":"#eee" , "color" : "black"});}});';
					echo '$("#s_points_'.nohtml($row['skill_id']).'").bind("keyup", function(e) {if( e.keyCode === 13 ){ if($(this).val() == ""){ alert("please enter a number");} else if( $(this).val() >=0 && $(this).val() < 6 ) {$(this).attr("readonly","readonly");update_skill("s_points_'.nohtml($row['skill_id']).'");$(this).css({"background-color":"#eee" , "color" : "black"});} else {alert("please enter a valid input")}}});';
				}
			}
		}
		?>
	</script>

</body>
</html>
