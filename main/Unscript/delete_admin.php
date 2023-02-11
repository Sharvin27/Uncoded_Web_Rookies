<?php

    //Include config.php
    include ('Responsive-Login-Form-master\config.php');


    // 1. Get the id of the admin to be deleted.
    $id = $_GET['id'];

    // 2. Create a sql query to delete admin.
    $sql = "DELETE FROM client_form WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //Check whether query is execute successfully or not
    if($res==TRUE)
    {
        //Query Executed
        //Create Session Variable to display message

        $_SESSION['delete'] = "Admin Deleted Successfully";

        //Redirect to manage admin page
        
        header('location:'.SITEURL.'manage_admin.php');

    }
    else
    {
        //Query Failed
        $_SESSION['delete'] = "Failed to Delete Admin. Try Again Later";
        header('location:'.SITEURL.'manage_admin.php');
    }


    // 3. Redirect to manage admin page with message (success/error) 

    

?>