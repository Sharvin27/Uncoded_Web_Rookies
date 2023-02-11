

<!-- To include one php file to another -->
<?php include 'admin/header.php'; ?>
<!-- To include its styling -->
<style>
<?php include 'css/admin.css'; ?>
</style>


    <!-- Main content -->
    <div class = "main-content">
        <div class = "wrapper">
            <h1>Manage Admin</h1>

            <br />

            <?php
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete']; //Displaying Session Message
                    unset($_SESSION['delete']); //Removing Session Message
                }
            ?>
            <br><br><br>
            <!-- Button to add admin -->
            <a href="register_admin.php" class="btn-primary">Add Admin</a>

            <br /><br /><br />

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- <th>Location</th> -->
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>

                <!-- Display the contents from the Database  -->
                <?php 

                    // Query to get all admin 
                    $sql = "SELECT * from client_form";

                    // Execute the Query
                    $res = mysqli_query($conn, $sql);

                    // Check whether the Query is executed or not
                    if($res==TRUE)
                    {
                        //Count the no of rows to check whether we have data in datbase or not

                        $count = mysqli_num_rows($res); //Function to get the no. of rows in database

                        $sn = 1; //Create a variable for id

                        //Check the num of rows
                        if($count>0)
                        {
                            //We have data
                            while($rows=mysqli_fetch_assoc($res)) //To fetch rows from database 
                            {
                                //Using while loop to get all in data from database.
                                //And while loop will run as long as we have data in database.

                                //Get individual data

                                $id=$rows['id'];
                                $name=$rows['name'];
                                $email=$rows['email'];
                                // $location=$rows['location'];
                                $user_type=$rows['user_type'];

                                //Display the Values in table

                                //  Break the php to write html
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?> </td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <!-- <td><?php echo $location; ?></td> -->
                                    <td><?php echo $user_type; ?></td>
                                    <td>
                                        <a href="#" class="btn-secondary">Update</a>
                                        <a href="<?php echo SITEURL; ?>delete_admin.php?id=<?php echo $id; ?> " class="btn-delete">Delete</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //We dont have data
                        }
                    }

                ?>

            </table>    



        </div>
    </div>

<?php include('admin/footer.php'); ?>