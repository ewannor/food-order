<?php include('modules/menu.php')?>

<!-- Main Content Section Starts-->
<div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>
            <br>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name: </td>
                        <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                    </tr>

                    <tr>
                        <td>Username: </td>
                        <td><input type="text" name="username" placeholder="Input your username"></td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" placeholder="Your password"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>

            </form>

        </div>
</div

<?php include('modules/footer.php')?>


<?php
    include('constants/error-handling.php');

    //1. Process the value from Form and save it in Database
    // Check whether the submit button is clicked or not
    echo "Start of Script\n";
    if(isset($_POST['submit'])){
        // Button clicked
        echo "\nButton clicked\n";

        //1. Get the date from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5

        //2. SQL Query to save the data into the database
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password='$password'
        ";
        
        //3
        
    
        //$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    
        
        //Close the database connection
        mysqli_close($conn);
        echo "\ndb closed";
    }
?>