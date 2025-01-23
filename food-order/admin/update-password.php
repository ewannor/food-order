<?php include("partials/menu.php") ?>

<section class="main-content">
    <div class="wrapper">
        <h2>Change Password</h2>
        <br>
        
        
        <!-- GET USERNAME -->
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }

                $sql = "SELECT * FROM tbl_admin WHERE id=$id";

                $results = mysqli_query($conn, $sql);

                if ($results == TRUE) {
                    $count = mysqli_num_rows($results);

                    if ($count == 1) {
                        $row = mysqli_fetch_assoc($results);
                        $full_name = $row['full_name'];
                    }
                }
            ?>

            <h5>USER: <?php echo $full_name; ?></h5>

       
        <!-- Change Password Form -->
            <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password:&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="password" name="current_password" placeholder="Enter current Password"></td>
                </tr>

                <tr>
                    <td>New Password:&nbsp;</td>
                    <td>
                        <input type="password" name="new_password" placeholder="Enter new Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm new Password">
                    </td><br>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn btn-primary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</section>

<?php 
    // Check whether the submit button is clicked or not
    if(isset($_POST['submit'])) {
        // echo "clicked";

        // 1. Get the data from the form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        // 2. Check whether the user with current ID and current password exits or not
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
        
        // Execute the query
        $res = mysqli_query($conn, $sql);

        if($res==true) {
            // 3. Check whether the new password and confirm password are same or not
            $count = mysqli_num_rows($res);

            if($count==1) {
               // User Exists and password can be changed
               // echo "User found";

               // Check whether the new password and confirm password match or  not
               if ($new_password==$confirm_password) {
                    // Update the password
                    //echo "Password Changed Successfully";
                    $sql2 = "UPDATE tbl_admin SET
                            password = '$new_password'
                            WHERE id = $id
                            ";

                    $update_query = mysqli_query($conn, $sql2);

                    if ($update_query == TRUE) {
                        // echo "Query executed successfully";

                         // Create a session variable
                        $_SESSION['pwd-update-success'] = "<div class='success'>Password updated successfully</div>";
                        //Redirect Page to Manage Admin
                        header("location:" . SITEURL . 'admin/manage-admin.php');
                    }  else {
                         // Create a session variable
                         $_SESSION['pwd-update-fail'] = "<div class='error'>Password update failed</div>";
                         //Redirect Page to Manage Admin
                         header("location:" . SITEURL . 'admin/manage-admin.php');
                    }
                    
                    // Redirect 
               } else {
                    // Redirect with error message
                    $_SESSION['pwd-not-match'] = "<div class='error'> Passwords doesn't match</div>";
                    // Redirect the user
                    header('location:'.SITEURL.'admin/manage-admin.php');
               }

            } else {
                // User does not exist adn set manage and redirect
                $_SESSION['user-not-found'] = "<div class='error'> User not found</div>";
                // Redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

        // 3. Check whether the new password and confirm password match or not

        // 4. Change password if all above is true
    }
?>



<?php include("partials/footer.php"); ?>