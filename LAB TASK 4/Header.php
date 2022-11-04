<?php
session_start();
echo "<br>";
echo "<br>";

 echo '<span style="color: green; font-size: 20px;"> == A Toll collection Website ==</span>'; 
 echo str_repeat("&nbsp;", 40); 

if(isset($_SESSION['uname']))
	{
		echo "Logged in as " .$_SESSION['uname']." | ";
		echo "<a href='logout.php'>Logout</a>";

	}
else{


echo "<a href=  'PublicHome.php' >Home</a>";
echo ' | ';
echo "<a href='login.php'>Login</a>";
echo ' | ';
echo "<a href='registration.php'>Registration</a>";
}


?>