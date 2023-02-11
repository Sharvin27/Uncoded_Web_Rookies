<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $location = mysqli_real_escape_string($conn, $_POST['location']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM client_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO client_form(name, email, password, location, user_type) VALUES('$name','$email','$pass', '$location', '$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
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

   <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>

</head>
<body>
<img class="wave" src="img/3.png">   
<div class="container">

      <div class="img">
			<img src="img/bg.svg">
		</div>
   <div class="login-content">
      <form action="" method="post">
         <img src="img/avatar.svg">
         <h3>register now</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>

         <div class="input-div one">
           	<div class="i">
           		<i class="fas fa-user"></i>
           	</div>
           	<div class="div">
              <input type="text" name="name" required placeholder="enter your name">
           	</div>
         </div>

         <div class="input-div one">
            <div class="i"> 
               <i class="fas fa-user"></i>
            </div>
            <div class="div">
               <input type="email" name="email" required placeholder="enter your email">
            </div>
         </div>
               
         <div class="input-div pass">
            <div class="i">
                  <i class="fas fa-lock"></i>
            </div>
            <div class="div">
               <input type="password" name="password" required placeholder="enter your password">
            </div>
         </div>

         <div class="input-div pass">
            <div class="i"> 
               <i class="fas fa-lock"></i>
            </div>
            <div class="div">
               <input type="password" name="cpassword" required placeholder="confirm your password">
            </div>
         </div>

         <div class="input-div one">
            <div class="i">
                  <i class="fas fa-user"></i>
            </div>
            <div class="div">
               <input type="text" name="location" required placeholder="enter your location">
            </div>
         </div>
         <div class="input-div one">
            <div class="i"> 
               <i class="fas fa-user"></i>
            </div>
            <div class="div">
               <!-- <h5>User Type</h5> -->
               <select name="user_type">
               <option value="worker">worker</option>
               <option value="client">client</option>
               </select>
            </div>
         </div>
         <input type="submit" name="submit" value="register now" class="form-btn">
         <p>already have an account? <a href="login.php">login now</a></p>
      </form>
   </div>
</div>

</body>
</html>