<!--  -->

<?php
    //Authorization - Access control
    // Check whether the user is logged in or not
    if(!isset($_SESSION['user'])){
        // If User session is not set ~ User is not logged in
        // Set error message
        $_SESSION['not-login-check-msg'] = "<div class='error text-center'>Please login to access Admin Panel</div>";
        // Redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }
?>
