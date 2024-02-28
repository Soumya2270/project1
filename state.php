<?php
$conn=mysqli_connect("localhost","root","","studregistration");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$state=$_POST['state'];
	 $sql="insert into state (state_name) values('$state')";
	$result=mysqli_query($conn,$sql);
	
 echo "inserted successfully";
}

?><br>












<html>
<head>
<title>state</title>
</head>
<body>
<form method="post">
<table>
 State:<input type="text" class="form-control" placeholder="Enter your State" name="state" id="state" ><br>
  <button type="Submit" class="btn btn-primary btn-block mb-4" value="Submit">Submit</button><br>
<table>
</form>
</body>
</html>