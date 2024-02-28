<?php
$conn=mysqli_connect("localhost","root","","studregistration");
if(isset($_GET['deleteid']))
{
	$id=$_GET['deleteid'];
	$sql="delete from stud_info where studid=$id";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		//echo "Deleted Successfully";
		header('location:show.php');
	}
	else
	{
		die(mysqli_error($conn));
	}
	
	
	
}


?>