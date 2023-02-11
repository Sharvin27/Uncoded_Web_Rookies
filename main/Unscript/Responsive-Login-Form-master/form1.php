<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $location = mysqli_real_escape_string($conn, $_POST['location']);
//    $price = mysqli_real_escape_string($_POST['price']);
   $work_type = $_POST['work_type'];
   $description = mysqli_real_escape_string($conn, $_POST['description']);

   $insert = "INSERT INTO work_finder(location, work_type, description) VALUES('$location', '$work_type', '$description')";
   mysqli_query($conn, $insert);
   header('location:login.php');
      
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Worker</title>
    <link href="css/form_style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <header>
            <h1 id="title">Get Worker At your doorstep</h1>
            
        </header>
        
        <form id="survey-form" action="" method="post">
            <?php
            if(isset($error)){
                foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <div class="form-group">
                <!-- <label for="name" id="name-label">Location</label>
                <input type="text" name="name" id="name" placeholder="Enter Your Address" required> -->

                <div class="i">
           		    <i class="fas fa-user"></i>
           	    </div>
                <label for="name" id="name-label">Location</label>
                <input type="text" name="location" id="location" required placeholder="Enter your Address">


            </div>
            <div class="form-group">
                <label for="age" id="number-label">Price Payable in Rs.</label>
                <input type="number" name="age" id="number" min="1" max="10000" placeholder="Enter Cost">



            </div>

            <div class="form-group">
                <label for="occupation">Choose A Role</label>
                <select name="work_type" id="dropdown">
                    <option selected disabled value>Select Your Role</option>
                    <option value="electrician">Electrician</option>
                    <option value="plumber">Plumber</option>
                    <option value="freelancer">Freelancer</option>
                    <option value="carpenter">Carpenter</option>
                    <option value="other">Other</option>
                </select>
            </div>

            

            <div class="form-group">
                <!-- <label for="remark">Work Description</label>
                <textarea name="remark" id="remark" placeholder="Give Detailed Work Description"></textarea> -->

                <div class="i">
           		    <i class="fas fa-user"></i>
           	    </div>
                <label for="remark">Work Description</label>
                <textarea name="description" id="remark" placeholder="Give Detailed Work Description"></textarea>
            </div>

            
                
                <!-- <a class="submit" href="form.php">Submit </a> -->
            <input type="submit" name="submit" value="register now" class="form-btn">
</form> 


</body>
</html>