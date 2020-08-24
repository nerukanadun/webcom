<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Conference Chair Home Page</title>
<link rel="stylesheet" href="css/sty.css">
</head>
<body style="background-color:#bdc3c7">
	
	<div id="main-wrapper">
		<center>
			<h2>Conference Chair Home Page</h2>
			<h3>Welcome
				
			</h3>
			<img src="imgs/webc.png" class="avatar"/>
		</center>
	
		<form class="myform" action="conferencechairhomepage.php" method="post">
			<a href="create_conference.php"><input type="button" id="register_btn" value="Create a Conference"/></a>
			<br>
			<a href="create_conference.php"><input type="button" id="register_btn" value="Define notification templates"/></a>
			<br>
			<a href="create_conference.php"><input type="button" id="register_btn" value="Bulk Upload User Details"/></a>
			<br>
			<a href="create_conference.php"><input type="button" id="register_btn" value="Send messages"/></a>
			<br>
			<a href="create_conference.php"><input type="button" id="register_btn" value="Add Conference Guideline Details"/></a>

			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>

			
		</form>
		
		<?php
		
		if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:index.php');
			}
			
		?>
	</div>
</body>
</html>