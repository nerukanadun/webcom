<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/sty.css">
</head>
<body style="background-color:#bdc3c7">
	
	<div id="main-wrapper">
		<center>
			<h2>Reviewer Home Page</h2>
			<h3>Welcome
				
			</h3>
			<img src="imgs/webc.png" class="avatar"/>
		</center>
	
		<form class="myform" action="reviewerhomepage.php" method="post">
			<input name="paperdetails" type="submit" id="paperdetails_btn" value="Paper details"/><br>
			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>
			
		</form>
		
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:index.php');
			}
			if(isset($_POST['paperdetails']))
			{
				session_destroy();
				header('location:paperdetails.php');
			}
		?>
	</div>
</body>
</html>