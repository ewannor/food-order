<?php include('partials/menu.php') ?>

<!-- Main Content Section Starts -->
    <section class="main-content">
        <div class="wrapper">
            <h1><strong>Manage Admin</strong></h1>
            <span>&lt;<?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?>&gt;</span><br>
            
            <!-- Confirmation Messages -->
            <?php 
                // ADD Confirmation message
                if(isset($_SESSION['add']))
                {
                    echo "<br>";
                    echo $_SESSION['add']; // Displaying session message
                    echo "<br>";
                    unset($_SESSION['add']); // Removing session message
                }

                // DELETE Confirmation message
                if(isset($_SESSION['delete'])){
                    echo "<br>";
                    echo $_SESSION['delete']; // Displaying session message
                    echo "<br>";
                    unset($_SESSION['delete']); // Removing session message
                }
                
                // Admin-access Confirmation message
                if(isset($_SESSION['admin-access-error'])){
                    echo "<br>";
                    echo $_SESSION['admin-access-error']; // Displaying session message
                    echo "<br>";
                    unset($_SESSION['admin-access-error']); // Removing session message
                }

                // UPDATE Confirmation message
                if(isset($_SESSION['update'])){
                    echo "<br>";
                    echo $_SESSION['update']; // Displaying session message
                    echo "<br>";
                    unset($_SESSION['update']); // Removing session message
                }

                //USER Confirmation message
                if(isset($_SESSION['user-not-found'])) {
                    echo "<br>";
                    echo $_SESSION['user-not-found']; // Displaying session message
                    echo "<br>";
                    unset($_SESSION['user-not-found']); // Removing session message
                }

                //PWD Check Confirmation message
                if(isset($_SESSION['pwd-not-match'])) {
                    echo "<br>";
                    echo $_SESSION['pwd-not-match']; // Displaying session message
                    echo "<br>";
                    unset($_SESSION['pwd-not-match']); // Removing session message
                }

                //PWD Update Success Confirmation message
                if(isset($_SESSION['pwd-update-success'])) {
                    echo "<br>";
                    echo $_SESSION['pwd-update-success']; // Displaying session message
                    echo "<br>";
                    unset($_SESSION['pwd-update-success']); // Removing session message
                }

                //PWD Update Fail Confirmation message
                if(isset($_SESSION['pwd-update-fail'])) {
                    echo "<br>";
                    echo $_SESSION['pwd-update-fail']; // Displaying session message
                    echo "<br>";
                    unset($_SESSION['pwd-update-fail']); // Removing session message
                }
            ?>

            <!-- Button to Add Admin -->
             <br><br>
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
             <br><br><br>

            <table class="tbl-full table table-striped">
                <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
                </tr>

                <?php
                    // Query to get all Admin
                    $sql = "SELECT * FROM tbl_admin";
                    //Execute the query
                    $res = mysqli_query($conn, $sql);

                    // Check whether the query is executed or not
                    if($res == TRUE) {
                        // Count the number of rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res); // Function ot get all the rows in database

                        // Check the  number of rows
                        if($count > 0) {
                            // We have data in database
                            $sn=1; // Create a variable and assign the value 

                            while($rows=mysqli_fetch_assoc($res)){
                                // Using while loop to get all the data from the database
                                // And while loop will run as long as we have data in database

                                // Get individual data
                                $id = $rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                // Display values in our table
                ?>

                <tr>
                    <td><?php echo $sn++?>.  </td>
                    <td><?php echo $full_name; ?></td>
                    <td><?php echo $username; ?></td>
                    <td>
                        <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update admin</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete admin</a>
                    </td>
                </tr>

                <?php
                            }
                        } else {
                            // No data in database
                        }
                    }
                ?>
            </table>

        </div>
    </section>
    <!-- Main Content Section Ends --> 

<?php include('partials/footer.php') ?>