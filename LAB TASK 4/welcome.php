<?php include 'Header.php';?>
<?php 

	//session_start();

	if (isset($_SESSION['uname'])) {
		echo "<h2>Welcome  ". $_SESSION['uname']. "</h2>";

////////////////////////

		if (!empty($_SESSION['remember'])) {
		setcookie("username", $_SESSION['uname'], time()+10);
		setcookie("password", $_SESSION['pass'], time()+10);
		echo "Cookie set successfully";
		
	}else{
		setcookie("username", "");
		setcookie("password", "");
		echo "Cookie not set";

	}


////////////////////////////

        echo"<br>";
		echo "<a href='product.php'>Dashboard</a><br>";
		echo "<a href='Profile.php'>View Profile</a><br>";
		echo "<a href='Edit_Profile.php'>Edit Profile</a><br>";
		
		echo "<a href='Profile_picture.php'>Change Profile Picture</a><br>";
		echo "<a href='Change_pass.php'>Change Password</a><br>";
		echo "<a href='logout.php'>Logout</a><br>";
	}else{
		header("location:login.php");
	}

 ?>
<?php include 'Footer.php';?>