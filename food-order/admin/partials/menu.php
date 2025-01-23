<?php 
    include("../config/error-report.php");
    include('../config/constants.php');
    include('login-check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website - Manage Admin</title>

    <!-- Link to External Bootstrap File -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Link to Admin CSS File -->
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
<!-- Menu Section Starts -->
    <section class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a> </li>
                <?php if (isset($_SESSION['user']) AND $_SESSION['user'] == 'admin'){
                    echo "<li><a href='manage-admin.php'>Admin</a> </li>";
                }
                ?>
                <li><a href="manage-category.php">Category</a> </li>
                <li><a href="manage-food.php">Food</a> </li>
                <li><a href="manage-order.php">Order</a> </li>
                <li><a href="../index.html">Food Order</a> </li>
                <li><a href="logout.php">Logout</a> </li>
            </ul>
        </div>
    </section>
    <!-- Menu Section Ends -->