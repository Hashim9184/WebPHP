<?php

session_start();

include 'dbcon.php';

if (isset($_POST['submit'])) {
	echo "string";
	# code...
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];

	$email_search  = "select * from registration where Email = '$Email'";
	$query = mysqli_query($con,$email_search);

	$email_count = mysqli_num_rows($query);

	if ($email_count) {
		# code...
		$email_pass	 = mysqli_fetch_assoc($query);

		$db_pass = $email_pass['Password'];


		$_SESSION['Email'] = $email_pass['Email'];

		$pass_decode = password_verify($Password, $db_pass);

		if ($pass_decode) {
			# code...
			echo "login successful";

			?>

			<script>
				location.replace("http://localhost/Php%20microproject/index.html");
			</script>

			<?php
		}else{
		echo "password Incorrect";
	}
	}else{
		echo "Invalid user";
	}

}

?>