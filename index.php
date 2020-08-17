<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/sty.css">
</head>
<body style="background-color:#192a56">
	
	<div id="main-wrapper">
		<center>
			<h2>Login Form</h2>
			<img src="imgs/webc.png" class="avatar"/>
		</center>
	
		<form class="myform" action="index.php" method="post">
			<label><b>Email:</b></label><br>
			<input name="email" type="text" class="inputvalues" placeholder="Type your email" required/><br>
			<label><b>Password:</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
			<input name="login" type="submit" id="login_btn" value="Login"/><br>
			<a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
		</form>
		<?php
		if(isset($_POST['login']))
		{
			$email=$_POST['email'];
			$password=$_POST['password'];
			
			
			//$query="select * from userinfotable WHERE email='$email' AND password='$password'";
			
			$select_query = mysqli_query($con, "select * from userinfotable WHERE email='$email' AND password='$password'");
            $select_row = mysqli_fetch_assoc($select_query);
            $qualification = $select_row['qualification'];
			
			//$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($select_query)>0)
			{
				// valid
				$_SESSION['email']= $email;
				if($qualification=="Admin"){
					header('location:adminhomepage.php');
				}
				else if($qualification=="Reviewer"){
					header('location:reviewerhomepage.php');
				}
				else if($qualification=="Author"){
					header('location:authorhomepage.php');
				}
				else if($qualification=="Conference_chair"){
					header('location:conferencechairhomepage.php');
				}
				
				
			}
			else
			{
				// invalid
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
			
		}
		
		
		?>
		
	</div>
</body>
</html>