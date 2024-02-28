<?php
session_start();
$conn=mysqli_connect("localhost","root","","studregistration");
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$uname=$_REQUEST['uname'];
	$password=$_REQUEST['psw'];
	$sql="select * from stud_info where email='$uname' AND password='$password'";
	$result= mysqli_query($conn,$sql);
	$cnt=mysqli_num_rows($result);
    if($cnt>0){
			$_SESSION['lit']=1;
			header("Location: show.php");
	}else{
		echo "<script>alert('Invalid Login')</script>";
	}
}

 

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	
	
	<!----Font-Aswome--->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!----Font-Aswome--->
	
	
	

    <!--Custom CSS-->
	<Link rel="stylesheet" href="style.css">

    <title>Login page</title>
  </head>
  <body>
  
  <form method="POST">
  <div class="container">
	<div class="row mt-5">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="card-header">
				<h4 class="card-header text-center fw-bold">Login</h4>
				<div class="card-body">
		
  <!-- Email input -->
  <div class="form-outline mb-4">
	<label class="form-label" for="uname">Email address</label>
    <input type="email" id="form2Example1" class="form-control" name="uname" required />
    
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
	<label class="form-label" for="psw">Password</label>
    <input type="password" id="form2Example2" class="form-control" name="psw" required />
    
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <div class="text-center">
  <button type="Submit" class="btn btn-primary btn-block mb-4" value="Submit">Login</button>
  </div>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="index.php">Register</a></p>
    <p>or sign up with:</p>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fa fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fa fa-google"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fa fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fa fa-github"></i>
    </button>
  </div>
</form>
		</div>
		</div>
		</div>
		</div>
	</div>
  </div>
  </form>
  </body>
  <!-- Footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>