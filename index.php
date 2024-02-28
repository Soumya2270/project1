<?php
$conn=mysqli_connect("localhost","root","","studregistration");
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
	

		foreach ($course	 as $key => $value) {
			$cou .= $value.",";
		}
		
$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

 


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

$sql="insert into img_upload(image)values
  ('$target_file')";
  $result=mysqli_query($conn,$sql);

    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
	
	
	
	$sql="insert into stud_info (name,fname,mname,dob,address,email,password,gender,state,dist,course,createddate) values('$name','$fname','$mname','$dob',
	'$address','$email','$password','$gender','$stateName','$distName','$cou',CURRENT_TIMESTAMP)";
	$result=mysqli_query($conn,$sql);
	
	

    echo "data inserted successfully";
	
	header("Refresh:0");
	
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

	<form method="post" class="row g-3" enctype="multipart/form-data">
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

       <?php
			$sel="select * from state";
				$qury=mysqli_query($conn,$sel);
				while($res=mysqli_fetch_assoc($qury)){
			?>
				<option value="<?php echo $res['state_id']; ?>"><?php echo $res['state_name']; ?></option>
			<?php } ?>
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
<?php
			$seld="select * from dist";
				$quryd=mysqli_query($conn,$seld);
				while($resd=mysqli_fetch_assoc($quryd)){
			?>
				<option value="<?php echo $resd['dist_id']; ?>"><?php echo $resd['dist_name']; ?></option>
			<?php } ?>
  </select><br>
	</div>
	<div class="container col-md-6">
            <div class="mb-5">
                <label for="Image" class="form-label">Upload your File</label>
                <input class="form-control" type="file" name="fileToUpload"  id="formFile" onchange="preview()">
                <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button>
            </div>
            
        </div>
	
	
<div class="col-md-12 text-center">	
<button type="submit" class="btn btn-primary" name="Submit" onclick= "myfun();" height="0px">Submit</button> <br>   
 </div> 
 
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

 function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
            }
			


















</script>
	</div>


  </body>
</html>