<?php include("partials/menu.php") ?>

<section class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>

        <form action="" method="POST">
            <table class="table">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name">
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Your Username">
                    </td>
                </tr>
                <tr>
                <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your Password">
                    </td>
                </tr>
            </table>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </form>
    </div>

</section>

<?php include("partials/footer.php") ?>


<?php
    // Process the value from Form and save it in database
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit'])) {
        //Button clicked
        echo "Button clicked<br>";

        // Get Data From Form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // Password Encryption with md5

        //2. SQL Query to save the data into the database

        $sql = "INSERT INTO tbl_admin SET 
            full_name = '$full_name',
            username='$username',
            password='$password'
        ";

        // 3. Execute query and saving data in to database
        $res = mysqli_query($conn, $sql);
        
        // Check whether Query is executed (data is inserted) or not
        if($res == TRUE) {
            echo "Query executed successfully<br>"; 
            
            // Create a session variable
            $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
            //Redirect Page to Manage Admin
            header("location:" . SITEURL .'admin/manage-admin.php');
        } else {
            // Failed to insert data
            // Create a session variable
            $_SESSION['add'] = "<div class='error'>Failed to Add admin</div>";
            //Redirect Page to Manage Admin
            header("location:" . SITEURL .'admin/manage-admin.php');
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
        echo "Button not clicked";
        }
?>

