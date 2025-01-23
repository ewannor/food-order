<?php include('partials/menu.php') ?>

<!-- Main Content Section Starts -->
    <section class="main-content">
        <div class="wrapper">
            <h1><strong>DASHBOARD</strong></h1>
            
            <!-- Login Success Alert -->
             <?php
                if(isset($_SESSION['user_details'])){
                    echo "<h4><br>Welcome ".$_SESSION['user_details']."</h4><br>";
                }
                if(isset($_SESSION['login-success'])){
                    echo $_SESSION['login-success']."<br>";
                    unset($_SESSION['login-success']);
                }
             ?>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                <p>Categories</p>
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                <p>Categories</p>
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                <p>Categories</p>
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br>
                <p>Categories</p>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Main Content Section Ends --> 

<?php include('partials/footer.php') ?>