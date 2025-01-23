<?php include('partials/menu.php') ?>

<!-- Main Content Section Starts -->
    <section class="main-content">
        <div class="wrapper">
            <h1><strong>Manage Order</strong></h1>
            <span>&lt;<?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?>&gt;</span><br>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Main Content Section Ends --> 

<?php include('partials/footer.php') ?>