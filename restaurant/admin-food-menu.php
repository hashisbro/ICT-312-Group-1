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

                <h2>ADD OR DELETE FOOD / MENU</h2>

                <script>
                    function confirm(){
                        var food_name = document.getElementById('food_name').value;
                        var food_price = document.getElementById('food_price').value;
                        var food_details = document.getElementById('food_details').value;
                        var food_image = document.getElementById('food_image').value;
                        
                        if(food_name !== null && food_name !== '' && food_price !== null && food_price !== '' && food_details !== null && food_details !== '' && food_image !== null && food_image !== ''){
                            alert("Food Added to Menu Successfully.");
                        }
                        
                        
                    }
                </script>

                <form method="post" action="processing/admin-food-menu.php">
                    <p>** Image should be in htdoc -> restaurant -> images -> food folder</p>
                    <table>
                        <tr>
                            <td>Category ID: *</td>
                            <td><select name="category_id" id="category_id">
                                
                                    <?php
                                        $conn = mysqli_connect("localhost", "root", "", "restaurant_db");
                                        $sql = mysqli_query($conn, "SELECT * FROM `food_category`");

                                        while($data = mysqli_fetch_array($sql)){
                                            $id = $data['category_id'];
                                        ?>
                                        <option value="<?php echo $id; ?>"><?php echo $id; ?></option>
                                        <?php
                                        }
                                              
                                      ?>
                                </option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Food Name: *</td>
                            <td><input type="text" name="food_name" id="food_name" required="required"></td>
                        </tr>
                        <tr>
                            <td>Food Price: *</td>
                            <td><input type="number" step="0.01" name="food_price" id="food_price" required="required"></td>
                        </tr>
                        <tr>
                            <td>Food Details: *</td>
                            <td><input type="text" name="food_details" id="food_details" required="required"></td>
                        </tr>
                        <tr>
                            <td>Food Image Name: *</td>
                            <td><input type="file" name="food_image" id="food_image" required="required" accept="image/*"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="ADD FOOD to MENU" id="submit" onclick="return confirm()"></td>
                        </tr>
                    </table>
                </form>

                <h2>List of Food on Menu</h2>
                <table border="1">
                <tr>
                  <th>Food Menu ID</th>
                  <th>Category ID</th>
                  <th>Food Name</th>
                  <th>Food Price</th>
                  <th>Food Details</th>
                  <th>Food Image Name</th>
                  <th>Action</th>
                </tr>

              <?php
                $conn = mysqli_connect("localhost", "root", "", "restaurant_db");
                $sql = mysqli_query($conn, "SELECT * FROM `food_menu`");

                while($data = mysqli_fetch_array($sql)){
                    $food_menu_id = $data['food_menu_id']; 
                  echo "<tr>";
                    echo "<td>".$food_menu_id."</td>";
                    echo "<td>".$data['category_id']."</td>";
                    echo "<td>".$data['food_name']."</td>";
                    echo "<td>".$data['food_price']."</td>";
                    echo "<td>".$data['food_details']."</td>";
                    echo "<td>".$data['food_image']."</td>";
                    echo "<td><a href='processing/admin-delete-food-menu.php?food_menu_id=$food_menu_id'>Delete</a></td>";
                  echo "</tr>";
                }
                      
              ?>
            </table>
 
            </div>


        </div>

<?php include('footer.php');?>