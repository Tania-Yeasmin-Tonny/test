<?php include 'Header.php';?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

//$json = file_get_contents('php://input',true);
//$post = json_decode($json,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

?>

<p><span class="error">* required field</span></p>
<form method="post" action="
<?php 
echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  


  <fieldset>
    <legend>PROFILE PICTURE</legend>
   <br><br>
  <input type="submit" name="submit" value="Submit">
</fieldset>
  <br><br>
 

  
</form>
</form>




</body>
</html>
 <?php include 'Footer.php';?>