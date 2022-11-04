<?php include 'Header.php';?>
<?php 

	//session_start();

	if (isset($_SESSION['uname'])) {
		echo "<h2>Welcome to product page Mr. ". $_SESSION['uname']. "</h2>";
		echo "<a href='welcome.php'>Back to welcome</a><br>";
		echo "<a href='logout.php'>Logout</a>";
	}else{
		header("location:login.php");
	}

 ?>
 <?php include 'Footer.php';?>
