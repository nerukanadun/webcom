<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Home Page</title>
<link rel="stylesheet" href="css/sty.css">
</head>
<body style="background-color:#bdc3c7">
	
	<div id="main-wrapper">
		<center>
			<h2>Admin's Home Page</h2>
			<h3>Welcome
				
			</h3>
			<img src="imgs/webc.png" class="avatar"/>
		</center>
	
		<form class="myform" action="adminhomepage.php" method="post">
			
			<h3>List of conferences created by conference chairs :</h3>
			
		    <input name="conferences" type="submit" id="authordetails_btn" value="Conferences"/><br><br>
		    <input name="authordetails" type="submit" id="authordetails_btn" value="Author details"/><br><br>
			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>
			
			
		</form>
		
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:index.php');
			}
			if(isset($_POST['authordetails']))
			{
				session_destroy();
				header('location:authordetails.php');
			}
			if(isset($_POST['conferences']))
			{
				session_destroy();
				header('location:conferences_view.php');
			}
		?>
	</div>
</body>
</html>
