<?php
$conn=mysqli_connect("localhost","root","","studregistration");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$dist=$_POST['dist'];
	 $sql="insert into dist (dist_name) values('$dist')";
	$result=mysqli_query($conn,$sql);
	
 echo "inserted successfully";
}

?><br>












<html>
<head>
<title>dist</title>
</head>
<body>
<form method="post">
<table>
 District:<input type="text" class="form-control" placeholder="Enter your District" name="dist" id="dist" ><br>
  <button type="Submit" class="btn btn-primary btn-block mb-4" value="Submit">Submit</button><br>
<table>
</form>
</body>
</html>