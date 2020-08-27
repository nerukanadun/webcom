
<!DOCTYPE html>
<html>
<head>

<!-- Get fontawesome icons
 -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Created conferences by conference chairs</title>
<style type "text/css">

   table {
	   border-collapse: collapse;
	   width: 100%;
	   color: #d96459;
	   font-family: sans-serif;
	   font-size: 18px;
	   text-align: left;
   }
   
   th {
	   background-color: #87CEFA;
	   color: white;
	   padding: 25px;
	   border-bottom: 1px solid #ddd;

   }
   tr {
	   border-bottom: 5px solid #ddd;
       height:50px;
   }
   tr:hover {background-color: #f5f5f5;}

   
   tr:nth-child(even) {background-color: #f2f2f2}
</style>
<link rel="stylesheet" href="css/sty.css">
</head>
<body style="background-color:#ffffff">

  <div style="overflow-x:auto;">
  

	<table>
	<tr>
	   <th>Name</th>
	   <th>Venue</th>
	   <th>Start Date</th>
	   <th>End Date</th>
	   <th>Deadline</th>
	   <th>Sposer Details</th>
	   <th>Action</th>


	</tr>
	<br>
	
	
	<?php
	
	 if(isset($_POST['back']))
			{
				session_destroy();
				header('location:adminhomepage.php');
	}
	
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Conference deleted!!"; 
	header('location: conference_view.php');
}


	
	$conn = mysqli_connect("localhost","root","","samplelogindb");
	if ($conn-> connect_error) {
		die("Connection failed:". $conn-> connect_error);
	}
	
	$sql = "SELECT name, venue,start_date,end_date,deadline_date,sponsor_details from conferences ";
	$result = $conn-> query($sql);


	
	if ($result-> num_rows> 0){
		while ($row = $result-> fetch_assoc()){
			echo "<tr><td>". $row["name"] ."</td><td>". $row["venue"] ."</td><td>". $row["start_date"] ."</td><td>". $row["end_date"] ."</td><td>" . $row["deadline_date"] ."</td><td>" . $row["sponsor_details"] ."</td><td>";
		}
		echo "</table>";
	}
	else {
		echo "0 result";
	}
	$conn-> close();
	?>


	
	</table>
</div>
</td>
	<br><br>
	<form class="myform" action="adminhomepage.php" method="post">
		
		<p style="text-align:left;color:#20B2AA;font-size: 20px;"><i class="fa fa-arrow-circle-o-left" aria-hidden="true" style='font-size:36px;color:#20B2AA;' ></i> To Admin's home page..</p>

		<input name="back" type="submit" id="back_btn" value="Back"/><br>	
	
	</form>
	
	
</body>
</html>
