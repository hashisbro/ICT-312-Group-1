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

                <h2>ADD OR DELETE FOOD CATEGORY</h2>

                <script>
                    function confirm(){
                        var category_name = document.getElementById('category_name').value;
                        var category_details = document.getElementById('category_details').value;
                        
                        if(category_name !== null && category_name !== '' && category_details !== null && category_details !== ''){
                            alert("Food Category added Successfully.");
                        }
                        
                        
                    }
                </script>

                <form method="post" action="processing/admin-category.php">
                    <table>
                        <tr>
                            <td>Food Category Name: *</td>
                            <td><input type="text" name="category_name" id="category_name" required="required"></td>
                        </tr>
                        <tr>
                            <td>Food Category Details: *</td>
                            <td><input type="text" name="category_details" id="category_details" required="required"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="ADD FOOD CATEGORY" name="submit" id="submit" onclick="return confirm()"></td>
                        </tr>
                    </table>
                </form>

            <h2>List of FoodCategories</h2>
            <p>
                <table border="1">
                    <tr>
                        <th>Category ID</th>
                        <th>Food Category NAME</th>
                        <th>Food Category Details</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    
                      $conn = mysqli_connect("localhost", "root", "", "restaurant_db");
                      $sql = mysqli_query($conn, "SELECT * FROM `food_category`");

                      while($data = mysqli_fetch_array($sql)){
                        $category_id = $data['category_id'];
                        $category_name = $data['category_name'];
                        $category_details = $data['category_details'];
                    ?>
                    <tr>
                        <td><?php echo $category_id; ?></td>
                        <td><?php echo $category_name; ?></td>
                        <td><?php echo $category_details; ?></td>
                        <td><a href="processing/admin-delete-category.php?category_id= <?php echo $category_id ?>"><button type="button">Delete</button></a></td>
                    </tr>
                    <?php } ?>
                    </table>
            </p>
                
 
            </div>


        </div>

<?php include('footer.php');?>