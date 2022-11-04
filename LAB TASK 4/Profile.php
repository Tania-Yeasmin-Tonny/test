<?php include 'Header.php'; ?>
<?php
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "GET") {

     if (file_exists('data (1).json')) {

          // this....

          $data = file_get_contents('data (1).json');
          $data = json_decode($data, true);
          if (isset($data)) {

               $name = $email = $gender = $dob = "";

               foreach ($data as $value) {
                    if ($value['username'] == $_SESSION['uname']) {

                         $name = $value['name'];
                         $email = $value['e-mail'];
                         $gender = $value['gender'];
                         $dob = $value['dob'];
                    }
               }
          }

          
     } 
}




?>

<!DOCTYPE html>
<html>

<head>
     <style>
          .error {
               color: #FF0000;
          }
     </style>
</head>

<body>



     <br />
     <div>

          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

               <?php
               if (isset($error)) {
                    echo $error;
               }
               ?>


               <br />
               <br>

               <fieldset>
                    <legend>PROFILE</legend>

                    <label>Name:</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" />
                    <br><br>

                    <label>E-mail:</label>
                    <input type="text" name="email" value="<?php echo $email; ?>" />
                    <br><br>


                    <label>Gender:</label>
                    <input type=" text" name="gender" value="<?php echo $gender; ?>" />
                    <br><br>


                    <label>Date of Birth:</label>
                    <input type=" text" name="dob" value="<?php echo $dob; ?>">

                    <br><br>
                    <a href=" Edit_Profile.php">Edit Profile</a>

                    <?php
                    if (isset($message)) {
                         echo $message;
                    }
                    ?>
               </fieldset>
          </form>
     </div>
     <br />

</body>

</html>
<?php include 'Footer.php'; ?>