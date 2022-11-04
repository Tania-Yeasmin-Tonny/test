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
// define variables and set to empty values
$CpassErr = $NpassErr = $RNpassErr = "";
$Cpass = $Npass = $RNpass = "";
$currentPass="";
$flag=1;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $data = file_get_contents('data (1).json');  
                $data = json_decode($data, true);
                   if (isset($data)) {

                    foreach($data as $key => $value)  
                      {  
                       if ($value['username']==$_SESSION['uname']) {

                        $currentPass = $value['password'];
                        
                         
                       }           
                    
                          } 
                          }
              

  if (empty($_POST["Cpass"])) {
    $CpassErr = "Password is required";
    $flag=0;
  } 
  else {
    if($_POST["Cpass"]==$currentPass)
    {
      $Cpass= ($_POST["Cpass"]);
    }
    else
    {
      $CpassErr = "Password not matched";
      $flag=0;
    }
    
}

  


 
  if (empty($_POST["Npass"])) {
    $NpassErr = "New Password is required";
    $flag=0;
  } 
  else {
    if($_POST["Npass"]==$currentPass)
    {
      $NpassErr = "New Password cannot be same as current password";
      $flag=0;
    }
    else{
    $Npass = ($_POST["Npass"]);
       }
    
}


  
  

  
  if (empty($_POST["RNpass"])) {
    $RNpassErr = "Password is required";
    $flag=0;
  } 
  else {
    if($_POST["RNpass"]==$Npass)
    {
      $RNpassErr = "Successfully Changed";
    
    }
    else
    {
      $RNpassErr = "Password not matched";
     $flag=0;
    }

}

  

if($flag==1)
{
              $data = file_get_contents('data (1).json');  
                $data = json_decode($data, true);
                   if (isset($data)) {

                    foreach($data as $key => $value)  
                      {  
                       if ($value['username']==$_SESSION['uname']) {

                        $data[$key]['password']=$Npass;
                        
                         
                       }           
                    
                      } 
                          $nJsonString=json_encode($data);
                          file_put_contents('data (1).json', $nJsonString);
                          }

                          if(file_put_contents('data (1).json', $nJsonString))
                          {
                            header("location:login.php");
                          }

}
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="
<?php 
echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  


  <fieldset>
    <legend>CHANGE PASSWORD</legend>
  
   Current Password:<input type="text" name="Cpass">
  <span class="error">* <?php echo $CpassErr;?></span><br>
  
  


  
  New Password:<input type="text" name="Npass">
  <span class="error">* <?php echo $NpassErr;?></span><br>


  Retype New Password:<input type="text" name="RNpass">
  <span class="error">* <?php echo $RNpassErr;?></span>
   <br><br>
  <input type="submit" name="submit" value="Submit">
</fieldset>
  <br><br>
 

  
</form>
</form>




</body>
</html>
 <?php include 'Footer.php';?>