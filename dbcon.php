<?php

$server = "localhost";
$user = "root";
$password = "";
$db = 'regisform';


$con = mysqli_connect($server,$user,$password,$db);

if ($con) {
	# code...
	?>

	<script>
		alert("connection successful")
	</script>

	<?php
}else{

	?>

		<script>
			alert("No connection");
		</script>
		<?php
}


?>