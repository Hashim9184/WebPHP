<?php

session_start();

include'dbcon.php';
if (isset($_POST['submit'])) {
	# code...
	$Fname = mysqli_real_escape_string($con, $_POST['Fname']) ;
	$Lname = mysqli_real_escape_string($con, $_POST['Lname']) ;
	$Phone =  mysqli_real_escape_string($con,  $_POST['Phone']);
	$Email =  mysqli_real_escape_string($con, $_POST['Email']) ;
	$Password =  mysqli_real_escape_string($con,  $_POST['Password']) ;
    $Cpassword =  mysqli_real_escape_string($con,  $_POST['Cpassword']) ;



$emailquery = "select * from registration where Email = '$Email'";
$query = mysqli_query($con, $emailquery);

$emailcount = mysqli_num_rows($query);

if ($emailcount>0) {
	# code...
	?>
	<script >
		alert("Email already exits");
	</script>



	<?php




}	 else{
	
	if ($Password === $Cpassword) {
		# code...

		$Password = password_hash($Password, PASSWORD_BCRYPT);
		$Cpassword = password_hash($Cpassword, PASSWORD_BCRYPT);

		$insertquery = "insert into registration(Fname, Lname, Phone, Email, Password, Cpassword) values('$Fname','$Lname','$Phone','$Email','$Password','$Cpassword')";

$insertquery = mysqli_query($con, $insertquery);

if ($insertquery) {
	# code...
	?>

	<script >
		alert("Inserted successful");
	</script>

	<?php
}else{

	?>

		<script>
			alert("No connection");
		</script>
		<?php
}


	}else{
		?>
		<script>
			alert("Password are not matching");
		</script>
		<?php
 
	}
}


header('http://localhost/Php%20microproject/login.html');

}

?>