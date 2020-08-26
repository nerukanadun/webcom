
<!DOCTYPE html>
<html>
<head>
<title>Paper details</title>
<style type "text/css">
   table {
	   border-collapse: collapse;
	   width: 100%;
	   color: #d96459;
	   font-family: monospace;
	   font-size: 25px;
	   text-align: left;
   }
   
   th {
	   background-color: #d96459;
	   color: white;
   }
   
   tr:nth-child(even) {background-color: #f2f2f2}
</style>
<link rel="stylesheet" href="css/sty.css">
</head>
<body style="background-color:#bdc3c7">
    

	<table>
	<tr>
	   <th>Full name</th>
	   <th>University</th>
	   <th>Contact Details</th>
	   <th>Paper</th>
	</tr>
	<br>
	
	
	<?php
	
	 if(isset($_POST['back']))
			{
				session_destroy();
				header('location:reviewerhomepage.php');
			}
	
	$conn = mysqli_connect("localhost","root","","samplelogindb");
	if ($conn-> connect_error) {
		die("Connection failed:". $conn-> connect_error);
	}
	
	$sql = "SELECT fullname, university, contactdetails, target_file from fileuploadtable";   
	$result = $conn-> query($sql);
	
	if ($result-> num_rows> 0){
		while ($row = $result-> fetch_assoc()){
			echo "<tr><td>". $row["fullname"] ."</td><td>". $row["university"] ."</td><td>". $row["contactdetails"] ."</td><td>";
			
		}
		echo "</table>";
	}
	else {
		echo "0 result";
	}
	$conn-> close();
	?>
	
	</table>
	
	<form class="myform" action="reviewerhomepage.php" method="post">
		<input name="back" type="submit" id="back_btn" value="Back"/><br>		
	</form>
	
	
</body>
</html>