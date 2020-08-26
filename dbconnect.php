<?php
//connect mysql database
$con = mysqli_connect("localhost","root","") or die("Unable to connect");
mysqli_select_db($con,'demo');
?>