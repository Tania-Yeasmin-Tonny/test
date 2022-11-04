<?php include 'Header.php';?>
          <?php
// define variables and set to empty values
                                                        
 $flag=1;      
 
 $message = '';  
 $error = '';  

 $nameErr = $emailErr = $genderErr  = $DBerr= $unameErr = $npassErr= $cpassErr="";


 if(isset($_POST["submit"]))  
 {  
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


     if(empty($_POST["un"]))  
      {  
           $unameErr = "<label>Enter a username</label>";
            $flag=0;  
      }  
    
      else{$un = $_POST["un"];} 
    
    



    if(empty($_POST["pass"]))  
      {  
           $npassErr = "<label >Enter a password</label>";
           $flag=0;  
      }
        
    else
    { 
          
           $newpassword=$_POST["pass"];

            //$npassErr="input taken";

    }


      if(empty($_POST["Cpass"]))  
      {  
           $cpassErr = "<label>Cannot be empty</label>";
           $flag=0;   
      } 
        else
      {
           if($_POST["Cpass"] == $newpassword)
           {
            $cpassErr = "Password matched";
           }
           else
           {
            $cpassErr = "Not matched with new password";
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
           if(file_exists('data (1).json'))  
           {  
                $current_data = file_get_contents('data (1).json');  
                //$array_data = json_decode($current_data, true);
                $array_data =json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $current_data), true );
  
                $new_data = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["un"],
                       'password'     =>     $_POST["pass"],    
                     'gender'     =>     $_POST["gender"],  
                     'dob'     =>     $_POST["dob"]  
                );  
               //return $new_data;
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data (1).json', $final_data))  
                {  
                     $message = "<label>File Appended Success fully</p>";
                     header("location:login.php");  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }
      

             }
           else
         {
            $error = 'Invalid information :( try again';


         }
   }   
   
 ?>

 <?php

$name = $un= $email =$Cpass =$pass= $gender = $dob= "";
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
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  


                     <br />  
                     <br>
                     <fieldset>
                    <legend>REGISTRATION</legend>
                     <label>Name</label>  
                     <input type="text" name="name" />
                      <span class="error">* <?php echo $nameErr;?></span><br />  <br>
                     <label>E-mail</label>
                     <input type="text" name = "email"/>
                     <span class="error">* <?php echo $emailErr;?></span><br /><br>
                      
                     <label>User Name</label>
                     <input type="text" name = "un"/>
                      <span class="error">* <?php echo $unameErr;?></span><br><br>
                     <label>Password</label>
                     <input type="password" name = "pass"/>
                     <span class="error">* <?php echo $npassErr;?></span><br><br>
                     <label>Confirm Password</label>
                     <input type="password" name = "Cpass"/>
                      <span class="error">* <?php echo $cpassErr;?></span><br><br>

                    <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                     <label for="male">Male</label>                     
                     <input type="radio" id="female" name="gender" value="female">
                     <label for="female">Female</label>
                     <input type="radio" id="other" name="gender" value="other">
                     <label for="other">Other</label>
                      <span class="error">* <?php echo $genderErr;?></span><br><br>
                      </fieldset> 

                     
                     <fieldset>
                     <legend>Date of Birth:</legend>
                     <input type="date" name="dob"> 
                     <span class="error">* <?php echo $DBerr;?></span><br><br>
                    </fieldset> 
                     
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