<?php include("partials/menu.php") ?>

<?php 
    // 1. Get the ID of Admin to be deleted
    $id = $_GET['id'];
    // 2. Create the SQL Query to Delete Admin
    $sql = "SELECT * FROM tbl_admin WHERE id=$id";

    //Execute the query
    $results = mysqli_query($conn, $sql);

    if ($results==TRUE) {
        // Check whether the data is available or not
        $count = mysqli_num_rows($results);
        // Check whether we have admin data or not
        if ($count == 1) {
            // echo "Admin Available";
            // Get the details
            $row = mysqli_fetch_assoc($results);
            $full_name = $row['full_name'];
            $username = $row['username'];
        } else {
            //Redirect to Manage Admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
            $_SESSION['admin-access-error'] = "<div class='error'>Failed to access admin</div>";
        }

    }

?>

<section class="main-content">
    <div class="wrapper">
        <h1> Update Admin</h1>

        <br><?php echo "<h5 styl><strong>USER:</strong> $full_name</h5>" ?><br>
        <form action="" method="POST">
            <table class="table">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name ?>">
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username ?>">
                    </td>
                </tr>
                <tr colspan="2">
                    <td>
                        Hard Reset Password
                    </td>
                </tr>
                <tr>
                <td>New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="Enter new Password">
                    </td>
                </tr>
                <tr>
                <td>Retype-Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Retype Password">
                    </td>
                </tr>
            </table>
            
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                </td>
            </tr>
        </form>
    </div>

</section>

<?php include("partials/footer.php") ?>


<?php

    //Check whether the submit button is clicked or not
    if(isset($_POST['submit'])) {
        //Button clicked
        // echo "Button clicked<br>";

        // Get Data From Form
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $new_password = md5($_POST['new_password']); // Password Encryption with md5
        $confirm_password = md5($_POST['confirm_password']); // Password Encryption with md5

        echo "password check";
        //2. SQL Query to update the data into the database
        if ($new_password == $confirm_password) {
            $sql = "UPDATE tbl_admin SET 
            full_name = '$full_name',
            username='$username',
            password='$new_password'
            WHERE id = $id
        ";

        // 3. Execute query and saving data in to database
        $res = mysqli_query($conn, $sql);

        // Check whether Query is executed (data is inserted) or not
        if($res == TRUE) {
            // echo "Query executed successfully<br>"; 
            
            // Create a session variable
            $_SESSION['update'] = "<div class='success'>Admin updated successfully</div>";
            //Redirect Page to Manage Admin
            header("location:" . SITEURL . 'admin/manage-admin.php');
        } else {
            // Failed to update data
            // Create a session variable
            $_SESSION['update'] = "<div class='error'>Failed to update admin</div>";
            //Redirect Page to Manage Admin
            header("location:" . SITEURL .'admin/manage-admin.php');
        }


        } else {
            // echo "Password and Confirm Password does not match";
            // Redirect with error message
            $_SESSION['pwd-not-match'] = "<div class='error'> Passwords doesn't match</div>";
            // Redirect the user
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        

        
        
        
        // Check if data is inserted
        $select_sql = "SELECT * FROM tbl_admin WHERE full_name='$full_name'";

        $new_res = mysqli_query($conn, $select_sql);

        if ($new_res) {
            while ($row = mysqli_fetch_assoc($new_res)) {
                echo $row['full_name'] . " details inserted.". "<br>";
            }
        } else {
            echo "Query failed <br>: " . mysqli_error($conn);
        }        

    } else {
        //Button not clicked
        //echo "Button not clicked";
        }
?>

