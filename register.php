<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>






<style>
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #6495ED;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
</style>







<title>Registration Page</title>
<link rel="stylesheet" href="css/sty.css">
<link rel="stylesheet" href="css/styleNavbar.css">

</head>
<body style="background-color:#ffff">


<ul>
  <li><a class="active" href="index.php">WebComs</a></li>
	<li><a href="login.php">Login</a></li>
	<li><a href="register.php">Register</a></li>
	<li><a href="help.html">Help</a></li>
	<li><a href="contactUs.html">Contact Us</a></li>
</ul>

<div>


</div>
	
	</br></br>
		<center>
			<h2>Registration Form</br></br></br></h2>
			
		</center>
	
		<form class="myform" action="register.php"method="post">
			<label><b>Full Name:</b></label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			<label><b>Gender:</b></label>
			<input type="radio" class="radiobtns" name="gender" value="male" checked required> Male
			<input type="radio" class="radiobtns" name="gender" value="male" required> Female<br>
			<label><b>User Role</b></label>
			<select class="qualification" name="qualification">
			  <option value="Admin">Admin</option>
			  <option value="Author">Author</option>
			  <option value="Reviewer">Reviewer</option>
			  <option value="Conference_chair">Conference chair</option>
			</select><br>
			<label><b>Email:</b></label><br>
			<input name="email" type="text" class="inputvalues" placeholder="Type your email" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
			<label><b>Confirm Password:</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';

				$fullname =$_POST['fullname'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
				$gender = $_POST['gender'];
				$qualification = $_POST['qualification'];

				//echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
				//echo '<script type="text/javascript"> alert("'.$fullname.' ---'.$username.' --- '.$password.' --- '.$gender.' --- '.$qualification.'"  ) </script>';

				if($password==$cpassword)
				{
					$query= "select * from userinfotable WHERE email='$email'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same email
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{
						$query= "insert into userinfotable values('','$email','$fullname','$gender','$qualification','$password')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
						}
					}
					
					
				}
				else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';	
				}
				
				
				
				
			}
		?>
	
</body>
</html>