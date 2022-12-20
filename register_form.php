<?php 


 
if(isset($_POST['submit'])){
   $conn = mysqli_connect('localhost','root','','project');
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn,$_POST['password']);

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' LIMIT 1";
  

   $result = mysqli_query($conn, $select);
   // $name != mysqli_real_escape_string($conn, $_POST['name']);
   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist!';
   }else{
         $insert = "INSERT INTO user(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
   }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link rel="stylesheet" href="css/main.css">
</head>
<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>Register now</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }; 
         };
         ?>
         <input type="text" name="name" required placeholder="Name or username" autofocus="on">
         <input type="email" name="email" required placeholder="Email address">
         <input type="password" name="password" minlength = "6" maxlength = "32" required placeholder="Password">
         <input type="submit" name="submit" value="register now" class="form-btn">
         <p>Already have an account? <a href="login_form.php">Login</a></p>

      </form>
   </div>
</body>
</html>