<?php
//insert.php
if(isset($_POST["send_to"]))
{
	include('conn.php');
	$send_to = mysqli_real_escape_string($conn, $_POST['send_to']);
	$message = mysqli_real_escape_string($conn, $_POST['message']);

	mysqli_query($conn,"insert into `petugas` (send_to, message) values ('$send_to', '$message')");
	mysqli_query($conn,"insert into `admin` (send_to, message) values ('$send_to', '$message')");
}
?>