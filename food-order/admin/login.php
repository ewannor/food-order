<?php 
  include('../config/constants.php');
  include('../config/error-report.php'); 


  // Check if user is already login
  if(isset($_SESSION['user'])){
    // Redirect to admin homepage
    header('location:'.SITEURL.'admin/');
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link CSS -->
     <link rel="stylesheet" href="css/admin.css"> 

    <!-- Link to External Bootstrap File -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login - Food Order Dashboard</title>
</head>

<body class="dark-bg">

  <section>
    <div class="login">
      <h1 class="text-center">Login</h1>
      <br>
      
      <!-- Login Alert -->
      <?php 
        if (isset($_SESSION['login-error'])){
          echo $_SESSION['login-error']."<br>";
          unset($_SESSION['login-error']);
        }

        // User not Login Msg        
        if (isset($_SESSION['not-login-check-msg'])) {
          echo $_SESSION['not-login-check-msg'];
          unset($_SESSION['not-login-check-msg']); 
        }
      ?>

      <!-- Login Form Starts Here -->
        <div class="form-container text-center">
            <form action="" method="POST">
              Username: <br>
              <input type="text" name="username" placeholder="Enter your username"><br><br>
              Password: <br>
              <input type="password" name="password" placeholder="Enter your password"><br><br>
              <input type="submit" name="submit" value="login" class="btn btn-primary">
            </form>
          </div>
          <!-- Login Form Ends Here -->
        <br>

        <hr/>
        <p class="text-center" style="color:blue;"><a href="../index.html">Go Back to Food Order</a></p>

      <p class="text-center">Created By - <a href="#">Emmanuel Annor</a></p>
    </div>
  </section>

</body>
</html>


<?php 

  // Check whether the submit button is clicked or not
  if (isset($_POST['submit'])) {
    // Process for login
    //1. Get the data from login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // echo $username. '<br>'.$password;
    //2.  SQL to check whether username and password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //3. Execute SQL Query
    $exe_query = mysqli_query($conn, $sql);

    //4. Count rows to check whether user exists or not
    $count = mysqli_num_rows($exe_query);

    if ($count==1) {
      // User exists & Login Success
      // Redirect to dashboard
      $_SESSION['login-success'] =  "<div class='success'>Login Successful</div>";
      $_SESSION['user'] = $username; // To check whether the user  is logged in or onot and logout will unset it
      //Redirect mesage to menu
      header('location:'.SITEURL."partials/menu.php");
      
      // Get user details
      $row = mysqli_fetch_assoc($exe_query);
      $full_name = $row['full_name'];

      // Pass User Details
      $_SESSION['user_details'] = "$full_name";
      //Redirect to Dashboard
      header('location:'.SITEURL."admin/");
    } else {
      // User nonexistent & Login Failed & Redirect to login page
      //echo "Login Failed";
      $_SESSION['login-error'] = "<div class='error text-center'>Username or Password did not match</div>";
      header('location:'.SITEURL.'admin/login.php');

    }

    //4. Check whether the query is executed or not
    
  }

?>