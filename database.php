<?php

$connection = mysqli_connect('localhost', 'root', '', 'shoutit');

$done = true;

if($connection == $done){
	//echo "Done!";
	//nothin happens
}
else{
	die();
}

?>