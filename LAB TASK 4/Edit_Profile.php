<?php include 'Header.php';?>
        <?php
// define variables and set to empty values

$flag=1;
 $message = '';  
 $error = '';  
$nameErr = $emailErr = $genderErr  = $DBerr= "";
$name = $email = $gender = $dob = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

      if(empty($_POST["name"]))  
      {  
          $nameErr = "<label>Enter Name</label>";  
          $flag=0;
      }
      else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
    {
      $nameErr = "Only letters and white space allowed";
      $flag=0;
    }
    else
    {
      if(str_word_count($_POST["name"]<2))
    {
     $nameErr = "Use atleast two words";
     $flag=0;
     }

    else{$name = $_POST["name"];} 
    
    }
   }


      if(empty($_POST["email"]))  
      {  
           $emailErr = "<label>Enter an e-mail</label>"; 
            $flag=0; 
      } 
      else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $flag=0;
    }
  }

  if(empty($_POST["gender"]))  
      {  
            $genderErr = "<label>Gender cannot be empty</label>"; 
              $flag=0; 
      } 
         else {
        $gender = $_POST["gender"];
       }
   

if($flag==1){
              $data = file_get_contents('data (1).json');  
                $data = json_decode($data, true);
                   if (isset($data)) {

                    foreach($data as $key => $value)  
                      {  
                       if ($value['username']==$_SESSION['uname']) {

                        $data[$key]['name']=$name;
                        $data[$key]['email']=$email;
                        $data[$key]['gender']=$gender;
                        $data[$key]['dob']=$dob;
                        
                         
                       }           
                    
                      } 
                          $nJsonString=json_encode($data);
                          file_put_contents('data (1).json', $nJsonString);
                          }

                          if(file_put_contents('data (1).json', $nJsonString))
                          {
                            header("location:Profile.php");
                     
                         }

}

}


 ?>



 <!DOCTYPE html>  
 <html>  
      <head>  
<style>
.error {color: #FF0000;}
</style>
      </head>  
      <body>  



           <br />  
           <div>  
                               
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

               <?php  

               $data = file_get_contents('data (1).json');  
                $data = json_decode($data, true);
                   if (isset($data)) {

                    foreach($data as $key => $value)  
                      {  
                       if ($value['username']==$_SESSION['uname']) {


                                $d1 = $value['name'];
                                $d2 = $value['e-mail'];
                                $d3 = $value['gender'];
                                $d4 = $value['dob'];
                        
                         
                       }           
                    
                    } 
                 } ?>

                     <fieldset>
                    <legend>EDIT PROFILE</legend>

                     <label>Name:</label>  
                     <input type="text" name="name" value= <?php echo $d1; ?>/>
                     <span class="error">* <?php echo $nameErr;?></span>
                        <br><br>

                     <label>E-mail:</label>
                     <input type="text" name = "email" value= <?php echo $d2; ?> />
                     <span class="error">* <?php echo $emailErr;?></span>
                     <br><br>


                     
                    <label>Gender:</label> 
                    <input type="radio" id="male" name="gender" value="male" <?php echo ($d3=='male'?' checked=checked':''); ?>
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female" <?php echo ($d3=='female'?' checked=checked':''); ?>
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other" <?php echo ($d3=='other'?' checked=checked':''); ?>>
                     <label for="other">Other</label>
                     <span class="error">* <?php echo $genderErr;?></span>
                     <br><br>
                   


                     <label>Date of Birth:</label>
                     <input type="date" name="dob" value= <?php echo $d4; ?>> 
                     <span class="error">* <?php echo $DBerr;?></span><br><br>
                     
                     
                    <input type="submit" name="submit" value="Submit"/><br />
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                       </fieldset> 
                </form>  
           </div>  
           <br />  

      </body>  
 </html>  
<?php include 'Footer.php';?>