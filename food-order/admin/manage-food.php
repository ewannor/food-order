<?php include('partials/menu.php') ?>

<!-- Main Content Section Starts -->
    <section class="main-content">
    <div class="wrapper">
            <h1><strong>Manage Food</strong></h1>
            <span>&lt;<?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?>&gt;</span><br>
            
            <!-- Button to Add Admin -->
             <br><br>
                <a href="#" class="btn-primary">Add Food</a>
             <br><br><br>

            <table class="tbl-full table table-striped">
                <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
                </tr>
                <tr>
                    <td>1. </td>
                    <td>Emmanuel Annor</td>
                    <td>ewannor</td>
                    <td>
                        <a href="#" class="btn-secondary">update admin</a>
                        <a href="#" class="btn-danger">delete admin</a>
                    </td>
                </tr>

                <tr>
                    <td>2. </td>
                    <td>Emmanuel Annor</td>
                    <td>ewannor</td>
                    <td>
                        <a href="#" class="btn-secondary">update admin</a>
                        <a href="#" class="btn-danger">delete admin</a>
                    </td>
                </tr> 

                <tr>
                    <td>3. </td>
                    <td>Emmanuel Annor</td>
                    <td>ewannor</td>
                    <td>
                        <a href="#" class="btn-secondary">update admin</a>
                        <a href="#" class="btn-danger">delete admin</a>
                    </td>
                </tr> 

            </table>

        </div>
    </section>
    <!-- Main Content Section Ends --> 

<?php include('partials/footer.php') ?>