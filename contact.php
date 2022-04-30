<?php

$con=mysqli_connect('localhost','root');

if($con){
	echo "Connection successful";
}else{
	echo "No connection";
}

mysqli_select_db($con,'phpmicro');
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Message = $_POST['Message'];

$query = "insert into contact(Name, Email, Message)
values('$Name','$Email','$Message')";

echo "$query";

mysqli_query($con, $query);

header('');

?>