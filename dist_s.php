<?php

$conn=mysqli_connect("localhost","root","","studregistration");

if($_SERVER['REQUEST_METHOD']=="POST"){

$state=$_REQUEST['state'];
$dist=$_REQUEST['dname'];
$sql="insert into dist (state_id,dist_name)values('$state','$dist')";



mysqli_query($conn,$sql);

header("location:dist.php");
}


?>
<div class="main">
<form method="post" >
	<table border="1" cellspacing="0">
	<tr>
		<td>State Name:</td><td>
			
			<select name="state" class="form-control">
				<option value="" >Please select dist</option>
						<?php
			$sql="select * from mast_state";
			$query=mysqli_query($conn,$sql);
			while($res=mysqli_fetch_assoc($query))
			{
				?>
				<option value="<?php echo $res['state_id']; ?>"><?php echo $res['state_name']; ?></option>

			<?php } ?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td>Dist Name:</td><td> <input type="text" name="dname" class="form-control"></td>
	</tr>
<tr>
	<td colspan="2"><input type="submit" name="submit" class="btn btn-primary"></td>
</tr>

</table>
</form><br>
	<table border="1" cellspacing="0px" class="table table-hover">
		<tr>
			<td>Slno</td>
			<td>State Name</td>

			<td> Dist Name</td>
		</tr>
		<?php
			$sql="select * from dist left join mast_state ON dist.state_id=mast_state.state_id	";
			$x=1;
			$query=mysqli_query($conn,$sql);
			while($res=mysqli_fetch_assoc($query))
			{
		?>
		<tr>
			<td><?php  echo $x; ?></td>
			<td><?php echo $res['state_name'];  ?></td>
			<td><?php echo $res['dist_name'];  ?></td>
			
			
		</tr>
	<?php $x++; } ?>
	

	</table>
</div>
<?php 