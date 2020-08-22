<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Author Home Page</title>
<link rel="stylesheet" href="css/sty.css">

<script type="text/javascript">

    function Previewfile() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("filelink").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>
</head>
<body style="background-color:#192a56">
	
	<form class="myform" action="register.php"method="post" enctype="multipart/form-data" >
		<div id="main-wrapper">
		<center>
			<h2>Author Home Page</h2>
			<img id="uploadPreview" src="imgs/webc.png" class="avatar"/><br>
			<input type="file" id="filelink" name="filelink" accept="application/pdf" onchange="Previewfile();"/>
		</center>
	
		 
			<label><b>Full Name:</b></label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
			<label><b>University:</b></label><br>
			<input name="university" type="text" class="inputvalues" placeholder="Type your university" required/><br>
			<label><b>Contact 	Details:</b></label><br>
			<input name="contactdetails" type="text" class="inputvalues" placeholder="Your Contact Details" required/><br>
			<label><b>Other links:</b></label><br>
			<input name="otherlinks" type="text" class="inputvalues" placeholder="Other links"><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Submit"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				
				$fullname =$_POST['fullname'];
				$university = $_POST['university'];
				$contactdetails = $_POST['contactdetails'];
				$otherlinks = $_POST['otherlinks'];
				
				$file_name = $_FILES['filelink']['name'];
				$file_size =$_FILES['filelink']['size'];
			    $file_tmp =$_FILES['filelink']['tmp_name'];
				
				$directory = 'uploads/';
				$target_file = $directory.$file_name;
				
				
					$query= "select * from fileuploadtable WHERE id='$id'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else if(file_exists($target_file))
					{
						echo '<script type="text/javascript"> alert("file already exists.. Try another file") </script>';
					}
					
					else if($file_size>2097152)
					{
						echo '<script type="text/javascript"> alert("file size larger than 2 MB.. Try another file") </script>';
					}
					
					else
					{
						move_uploaded_file($file_tmp,$target_file); 	
						$query= "insert into fileuploadtable values('','$fullname','$university','$contactdetails','$otherlinks','$target_file')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}	
					
					
				}
				
		?>
	</div>
</body>
</html>