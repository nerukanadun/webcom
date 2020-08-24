<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Author Home Page</title>
<link rel="stylesheet" href="css/sty.css">

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>
</head>
<body style="background-color:#bdc3c7">
	
	<form class="myform" action="authorhomepage.php"method="post" enctype="multipart/form-data" >
		<div id="main-wrapper">
		<center>
			<h2>Author Home Page</h2>
			<img id="uploadPreview" src="imgs/avatar.png" class="avatar"/><br>
			<input type="file" id="imglink" name="imglink" accept="application/pdf" onchange="PreviewImage();"/>
		</center>
	
		
			<label><b>Full Name:</b></label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Type your Full Name" required/><br>
			
			<label><b>University:</b></label><br>
			<input name="university" type="text" class="inputvalues" placeholder="Type your university" required/><br>
			<label><b>Contact Details:</b></label><br>
			<input name="contactdetails" type="text" class="inputvalues" placeholder="Contact Details" required/><br>
			
			<input name="submit_btn" type="submit" id="signup_btn" value="Submit"/><br>
			<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
		</form>
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				
				$fullname =$_POST['fullname'];
				$university = $_POST['university'];
				$contactdetails = $_POST['contactdetails'];
				//$cpassword = $_POST['cpassword'];
				
				$img_name = $_FILES['imglink']['name'];
				$img_size =$_FILES['imglink']['size'];
			    $img_tmp =$_FILES['imglink']['tmp_name'];
				
				$directory = 'uploads/';
				$target_file = $directory.$img_name;
				
				
					
                    if(file_exists($target_file))
					{
						echo '<script type="text/javascript"> alert("file already exists.. Try another file") </script>';
					}
					
					else if($img_size>2097152)
					{
						echo '<script type="text/javascript"> alert("file size larger than 2 MB.. Try another file") </script>';
					}
					
					else
					{
						move_uploaded_file($img_tmp,$target_file); 	
						$query= "insert into fileuploadtable values('','$fullname','$university','$contactdetails','$target_file')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("File Uploaded..") </script>';
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