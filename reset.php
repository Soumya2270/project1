<?php
$conn=mysqli_connect("localhost","root","","studregistration");

$studid= $_GET['updateid'];

$query = "select * from stud_info where studid='$studid'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
    $name=$_POST['name'];
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$stateName=$_POST['stateName'];
	$distName=$_POST['distName'];
	$course=$_POST['course'];
	$cou="";
	
	$cou="";

		foreach ($course	 as $key => $value) {
			$cou .= $value.",";
		}

$sql = "update stud_info  SET studid=$id,name='$name',fname='$fname',mname='$mname',dob='$dob',address='$address',email='$email',
password='$password',gender='$gender',state='$stateName',dist='$distName',course='$cou',reateddate=CURRENT_TIMESTAMP WHERE id='$id' ";
mysqli_query($conn, $sql);

echo "Update Successfully";
}

		

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Student Registration</title>
	<style>
	.m
	{
   color: red;
    }
	</style>
  </head>
  <body>
    <h1 align="center">Registration</h1>
    <div class="cointainer my-4">

	<form method="post" class="row g-3">
    <div class="col-md-6">
	
    <label><b>Name</b><span class="m">*</span></label> 
    <input type="text" class="form-control" placeholder="Enter your Name" name="name" id="name" autocomplete="off">
	</div>
	<div class="col-md-6">
    <label><b>Father Name</b><span class="m">*</span></label>
    <input type="text" class="form-control" placeholder="Enter your Father name" name="fname" id="fname" autocomplete="off">
	</div>
	<div class="col-md-6">
    <label><b>Mother Name</b><span class="m">*</span></label>
    <input type="text" class="form-control" placeholder="Enter your Mother name" name="mname" id="mname" autocomplete="off">
	</div><br>
	<div class="col-md-6">
    <label><b>DOB</b><span class="m">*</span></label><br>
	<input type="date" name="dob">
	</div><br>
	<div class="col-md-6">
    <label><b>Email</b><span class="m">*</span></label>
    <input type="text" class="form-control" placeholder="Enter your Email" name="email" autocomplete="off">
	</div>
	
	
	<div class="col-md-6">
    <label><b>Adress</b><span class="m">*</span></label>
    <textarea name="address" placeholder="Enter your Address"> </textarea>
	</div>
	
	<div class="col-md-6">
    <label><b>Password</b><span class="m">*</span></label>
    <input type="password" class="form-control" placeholder="Enter your Password" name="password" id="password" autocomplete="off">
	</div>
	<div class="col-md-6">
    <label><b>Gender</b><span class="m">*</span></label><br>
    <input type="radio" name="gender" value="male">   Male   <input type="radio" name="gender" value="female">     Female  <br>
	</div>
	<div class="col-md-6">
    <label><b>State</b><span class="m">*</span></label><br>
    <select name="stateName">
       <option> Please select state</option> 

       <option> Odisha</option>

      <option> Bihar</option>

      <option> Jharkhand</option>
  </select>
	</div>
	
	<div class="col-md-6">
    <label><b>Course</b><span class="m">*</span></label>
			<input type="checkbox" name="course[]" value="MCA">MCA
			<input type="checkbox" name="course[]" value="MBA">MBA
			<input type="checkbox" name="course[]" value="BCA">BCA
	</div></br>
	
	<div class="col-md-6">
    <label><b>District</b><span class="m">*</span></label><br>
    <select name="distName">
       <option> Please select Dist</option> 

       <option>Keonjhar</option>

      <option> Angul</option>

      <option> Puri</option>
  </select><br>
	</div>
	
	
	
	

  <button type="submit" class="btn btn-primary" name="Reset" onclick= "myfun();" width="5px">Update</button> <br>      
  
</form>

<script>
function myfun()
{
 var name=document.getElementById("name").value;
 var fathername=document.getElementById("fname").value;
 var mothername=document.getElementById("mname").value;
 var password=document.getElementById("password").value;
 if(name=="")
 {
  alert("Please Enter your name");
  document.getElementById("name").focus();
 }
 else if(fathername=="")
 {
  alert("Please Enter your Father Name");
  document.getElementById("fnname").focus();
 }
 else if(mothername=="")
 {
    alert("Please Enter your Mother name");
  document.getElementById("mnname").focus();
  }
  else if(password=="")
 {
    alert("Please Enter your Password");
  document.getElementById("password").focus();
  }
  else
  {
   alert("success");
   }
   
}
</script>
	</div>


  </body>
</html>















