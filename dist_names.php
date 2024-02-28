<?php
$conn=mysqli_connect("localhost","root","","studregistration");

$dist=$_POST['state_id'];
?>
<select name="distName">
					<?php
			$seld="select * from dist where state_id='$dist'";
				$quryd=mysqli_query($conn,$seld);
				while($resd=mysqli_fetch_assoc($quryd)){
			?>
				<option value="<?php echo $resd['id']; ?>"><?php echo $resd['dist_name']; ?></option>
			<?php } ?>
				</select>