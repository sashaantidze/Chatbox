<?php include "database.php"; ?>
<?php

$query = "SELECT * FROM shouts ORDER BY id DESC";
$shouts = mysqli_query($connection, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shout Chatbox</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<style>
		body{
			background-image: url(css/bg.jpg);
		}
		
	.error{
		background: red;
		color: #fff;
		padding: 5px;
		margin-bottom: 20px;
	}
		
		#input{
			margin-bottom: 25px;
		}	
	</style>
</head>
<body>
	<div id="container">
		<header>
			<h1>Shout it!</h1>
		</header>
		<div id="shouts">
			<ul>
				<?php while($row = mysqli_fetch_assoc($shouts)) :?>
					<li class="shout">
						<span><?php echo $row['time']; ?> - </span> <?php echo '<b>'.$row['user'].'</b>: '.$row['messege']; ?>
					</li>
				<?php endwhile; ?>
				
				
			</ul>
		</div>
		<div id="input">
			<?php if(isset($_GET['errorNotification'])) :?>
				<div class="error">
					<?php echo $_GET['errorNotification']; ?>
				</div>
			<?php endif; ?>
			<form action="process.php" method="post">
				<input type="text" name="user" placeholder="Enter Your Name">
				<input type="text" name="messege" placeholder="Enter a Shout">
				<br>
				<input type="submit" class="shout-btn" name="submit" value="Shout it Out">
			</form>
		</div>
	</div>
</body>
</html>