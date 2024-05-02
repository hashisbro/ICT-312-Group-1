<?php include('header.php');?>
<?php include('admin-nav.php');?>
    <?php
        session_start();
        $_SESSION['loginErrorMessage'] ="";
        if($_SESSION['admin_id'] > 0){
            $_SESSION['loginErrorMessage'] ="";
        }else{
            $_SESSION['loginErrorMessage'] ="<div class='alert alert-danger'>You have not login, Please login to proceed...</div>";
            header('Location: admin.php');
        }
    ?>
       
        <div class="content">
            <div class="content">
                <h1>Welcome to Local Restaurant</h1>

                <h2>ADMIN HOME PAGE</h2>

                <h3>Select a Menu Option to Perform ADMIN Operation...</h3>

                <p><a href="admin-food-category.php">Add or Delete Food Category</a></p>
                <p><a href="admin-food-menu.php">Add or Delete Food Menu</a></p>

                <p><a href="admin-all-reservation.php">All Reservation Details</a></p>  
                <p><a href="admin-today-reservation.php">Today Reservation Details</a></p>                

                <p><a href="logout.php">Logout</a></p>
 
            </div>


        </div>

<?php include('footer.php');?>