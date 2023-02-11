<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   // $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   // $cpass = md5($_POST['cpassword']);
   // $user_type = $_POST['user_type'];

   $select = " SELECT * FROM client_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:../admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:profile.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
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
      		<h3>login now</h3>
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
			<input type="submit" name="submit" value="login now" class="form-btn">
			<p>don't have an account? <a href="register1.php">register now</a></p>
   		</form>
		
		<!-- <div class="login-content">
			
        </div> -->
	</div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>


