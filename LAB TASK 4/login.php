 <?php include 'Header.php';?>
<?php 
	//session_start();

	//$username = "driver";
	//$password = "driver";

	if (isset($_POST['uname'])) {
		$username=$password="";
 
                          $data = file_get_contents('data (1).json');  
                          $data = json_decode($data, true);
                          if (isset($data)) {

                              foreach($data as $value)  
                          {  
                              if ($value['username']==$_POST['uname']) {

                               	$username = $value['username'];
	                            $password = $value['password'];
                         
                              }           
                    
                          } 
                          }
                           

		if ($_POST['uname']==$username && $_POST['pass']==$password) {
			$_SESSION['uname'] = $username;
			$_SESSION['pass'] = $password;
			$_SESSION['remember'] = $_POST['remember'];

			

			header("location:welcome.php");
		}
		else{
			$msg = "username or password invalid";
		}
	}
 ?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<span><?php
		if (isset($msg)) {
			echo $msg;
		}

	 ?>	 	
	 </span>
	 <br>
	Username:
	<input type="text" name="uname" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>">
	<br>
	Password:
	<input type="password" name="pass" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
	<br>
	<input id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>> <label for="remember">Remember Me</label>
	<br>
	<input type="submit" name="Submit" value="Submit">
	<a href="Forgot_Pass.php">Forgot Password?</a>

</form>
<?php include 'Footer.php';?>