<?php
    // Include config files
    include('../config/constants.php');
    include('../config/error-report.php');

    //1. Destroy the session and Redirect to login  
    session_destroy(); // Unsets $_SESSION['user]

    //2. Redirect to Login Page
    header('location:'.SITEURL.'admin/login.php');
?>