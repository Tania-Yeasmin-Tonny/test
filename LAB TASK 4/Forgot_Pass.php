<?php include 'Header.php'; ?>
<?php

 $message = ''; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $data = file_get_contents('data (1).json');
     $data = json_decode($data, true);
     if (isset($data)) {

          foreach ($data as $value) {
               if ($value['e-mail'] == $_POST['email']) {
                    $message = "Email matched !";
                    break;
               } else {
                     $message = "No User Found !";
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

          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

               <?php
               if (isset($error)) {
                    echo $error;
               }
               ?>


               <br />
               <br>

               <fieldset>
                    <legend>FORGOT PASSWORD</legend>

                    <label>E-mail:</label>
                    <input type="text" name="email" />
                    <br><br>


                    <input type="submit" name="submit" value="Submit">

                    <br>
                    <p style="color: red;"><?php echo  $message; ?></p>
                    <br>

                    <?php
                    if (isset($message)) {
                         //echo $message;
                    }
                    ?>


               </fieldset>
          </form>
     </div>
     <br />

</body>

</html>
<?php include 'Footer.php'; ?>