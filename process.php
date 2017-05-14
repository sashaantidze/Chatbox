<?php
include 'database.php';

if(isset($_POST['submit'])){
	$user = mysqli_real_escape_string($connection ,$_POST['user']);
	$messege = mysqli_real_escape_string($connection, $_POST['messege']);
	
	//Set timezone
	date_default_timezone_set('Asia/Tbilisi');
	$time = date('h:i:s a', time());
	
	if(!isset($user) || $user == '' || !isset($messege) || $messege == ''){
		$error = "Please Fill In Your Name and Messege";
		header("Location: index.php?errorNotification=".urlencode($error));
		exit();
	}
	else{
		$remote_ip = $_SERVER['REMOTE_ADDR'];
		$query = "INSERT INTO shouts (user, messege, time, remote_ip_addr) ";
		$query .= "VALUES ('$user', '$messege', '$time', '$remote_ip')";
		
		if(!mysqli_query($connection, $query)){
			die("QUERY FAILED! ".mysqli_error($connection));
		}
		else{
			//echo "Submited!";
			header("Location: index.php");
			exit();
		}
	}
}


?>