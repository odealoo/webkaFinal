<?php

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn,$_POST['password']);

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";
   $conn = mysqli_connect('localhost','root','','project');

   $result = mysqli_query($conn, $select);
   
   if(mysqli_num_rows($result) > 0){  

      $row = mysqli_fetch_array($result); 
      header('location:admin_page.php');

   }else{
      $message[] = 'incorrect email or password! ';
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
         <h3>login now</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="enter your email">
         <input type="password" name="password" required placeholder="enter your password">
         <input type="submit" name="submit" value="login now" class="form-btn">
         <p>Don't have an account? <a href="register_form.php">Register now</a></p>
      </form>
   </div>
</body>
</html>