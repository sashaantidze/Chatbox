<?php

$connection = mysqli_connect('localhost', 'root', '', 'shoutit');

$done = true;

if($connection != $done){
	die("Connection not found!");	
}

?>
