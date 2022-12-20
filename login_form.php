<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn,$_POST['password']);

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' LIMIT 1 ";
   $conn = mysqli_connect('localhost','root','','project');


   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){  

      $row = mysqli_fetch_array($result); 
      $_SESSION['admin_name'] = $row['name'];
      header('location:admin_page.php');

   }else{
      $error[] = ' incorrect email or password! ';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href="css/main.css">

</head>
<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>Login Form</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="Email address" autofocus="on">
         <span></span>
         <input type="password" name="password" minlength = "6" maxlength = "32" required placeholder="Password">
         <span></span>
         <input type="submit" name="submit" value="sign in" class="form-btn">
         <p>Don't have an account? <a href="register_form.php">Sign up</a></p>

      </form>
   </div>
</body>
</html>

