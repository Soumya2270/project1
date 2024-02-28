<?php
session_start();
$conn=mysqli_connect("localhost","root","","studregistration");


if($_SESSION['lit']==1){
?>












<html lang="en">
<head>
     <meta charset="UTF-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width,intial-scale=1.0">
	 <title>Student Registration</title>
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="text-center">
	<button class="btn btn-primary my-5"><a href="logout.php" class="text-light" >Logout</a></button>
	</div>
	<div class="text-center">
	<button class="btn btn-primary my-5"><a href="index.php" class="text-light" >Add User</a></button>
	</div>
	<div class="container">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Stud Id</th>
      <th scope="col">Name</th>
      <th scope="col">Father Name</th>
      <th scope="col">Mother Name</th>
	  <th scope="col">DOB</th>
      <th scope="col">Address</th>
	  <th scope="col">Email</th>
	  <th scope="col">Gender</th>
	  <th scope="col">State</th>
	  <th scope="col">Dist</th>
	  <th scope="col">Course</th>
	  <th scope="col">Created Date</th>
	  <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
  
  <?php
  $sql="Select * from stud_info";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
	  while($row=mysqli_fetch_assoc($result))
	  {
		  $id=$row['studid'];
		  $name=$row['name'];
		  $fname=$row['fname'];
		  $mname=$row['mname'];
		  $dob=$row['dob'];
		  $address=$row['address'];
		  $email=$row['email'];
		  $gender=$row['gender'];
		  $stateName=$row['state'];
		  $distName=$row['dist'];
		  $cou=$row['course'];
		  $createddate=$row['createddate'];
		  
		  echo '
		  <tr>
			<th scope="row">'.$id.'</th>
			<td>'.$name.'</td>
			<td>'.$fname.'</td>
			<td>'.$mname.'</td>
			<td>'.$dob.'</td>
			<td>'.$address.'</td>
			<td>'.$email.'</td>
			<td>'.$gender.'</td>
			<td>'.$stateName.'</td>
			<td>'.$distName.'</td>
			<td>'.$cou.'</td>
			<td>'.$createddate.'</td>
			<td>
			<button class="btn btn-primary"><a href="reset.php?updateid='.$id.'" class="text-light">Update</a></button>
			<button class="btn btn-danger" ><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
			</td>
		</tr>';
	  }
	  
		  
	  
  }
  
  
  
  
  
  
  
  
  
  ?>
  
  
  
  
    
  </tbody>
</table>
	</div>

</body>
<?php
	}else{
		header("location: login.php");
	}
?>












</html>