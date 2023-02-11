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
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
                      <?php
                        if(isset($error)){
                        foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                        };
                        };
                    ?>

           		   <div class="div">
           		   		<h5>Name</h5>
           		   		<input type="text" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Email Address </h5>
           		    	<input type="email" class="input">
            	   </div>
            	</div>
               
                <div class="input-div one">
                   <div class="i">
                           <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                           <h5>Create Password</h5>
                           <input type="password" class="input">
                   </div>
                </div>
                <div class="input-div pass">
                   <div class="i"> 
                        <i class="fas fa-lock"></i>
                   </div>
                   <div class="div">
                        <h5>Confirm Password </h5>
                        <input type="password" class="input">
                </div>
                
             </div>
             <div class="input-div one">
                <div class="i">
                        <i class="fas fa-user"></i>
                </div>
                <div class="div">
                        <h5>Location</h5>
                        <input type="text" class="input">
                </div>
             </div>
             <div class="input-div pass">
                <div class="i"> 
                     <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>User Type</h5>
                    <select name="user_type">
                    <option value="worker">worker</option>
                    <option value="client">client</option>
                    </select>
             </div>
          </div>
            	
            	<input type="submit" class="btn" value="Sign UP">
      </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
