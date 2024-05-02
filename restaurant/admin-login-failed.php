<?php include('header.php');?>
<?php include('admin-nav.php');?>

<?php
    session_start();
    $_SESSION['loginErrorMessage'] ="";
    if($_SESSION['admin_id'] > 0){
        $_SESSION['loginErrorMessage'] ="";
    }else{
        $_SESSION['loginErrorMessage'] ="<div class='alert alert-danger'>You have not logged in. Please log in to proceed...</div>";
        header('Location: admin.php');
    }
?>

<div class="content">
    <div class="content">
        <h1>Welcome to Alpha Footwear</h1>

        <h2>ADD OR DELETE FOOTWEAR ITEMS</h2>

        <script>
            function validateForm(){
                var footwear_name = document.getElementById('footwear_name').value;
                var footwear_price = document.getElementById('footwear_price').value;
                var footwear_details = document.getElementById('footwear_details').value;
                var footwear_image = document.getElementById('footwear_image').value;
                
                if(footwear_name !== null && footwear_name !== '' && footwear_price !== null && footwear_price !== '' && footwear_details !== null && footwear_details !== '' && footwear_image !== null && footwear_image !== ''){
                    alert("Footwear Added to Inventory Successfully.");
                }
            }
        </script>

        <form method="post" action="processing/admin-footwear-menu.php">
            <p>** Image should be in htdoc -> alphafootwear -> images -> footwear folder</p>
            <table>
                <tr>
                    <td>Category ID: *</td>
                    <td>
                        <select name="category_id" id="category_id">
                            <?php
                                $conn = mysqli_connect("localhost", "root", "", "alphafootwear_db");
                                $sql = mysqli_query($conn, "SELECT * FROM `footwear_category`");

                                while($data = mysqli_fetch_array($sql)){
                                    $id = $data['category_id'];
                                    echo "<option value='$id'>$id</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Footwear Name: *</td>
                    <td><input type="text" name="footwear_name" id="footwear_name" required="required"></td>
                </tr>
                <tr>
                    <td>Footwear Price: *</td>
                    <td><input type="number" step="0.01" name="footwear_price" id="footwear_price" required="required"></td>
                </tr>
                <tr>
                    <td>Footwear Details: *</td>
                    <td><input type="text" name="footwear_details" id="footwear_details" required="required"></td>
                </tr>
                <tr>
                    <td>Footwear Image Name: *</td>
                    <td><input type="file" name="footwear_image" id="footwear_image" required="required" accept="image/*"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="ADD FOOTWEAR to INVENTORY" id="submit" onclick="return validateForm()"></td>
                </tr>
            </table>
        </form>

        <h2>List of Footwear in Inventory</h2>
        <table border="1">
            <tr>
                <th>Footwear ID</th>
                <th>Category ID</th>
                <th>Footwear Name</th>
                <th>Footwear Price</th>
                <th>Footwear Details</th>
                <th>Footwear Image Name</th>
                <th>Action</th>
            </tr>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "alphafootwear_db");
                $sql = mysqli_query($conn, "SELECT * FROM `footwear_inventory`");

                while($data = mysqli_fetch_array($sql)){
                    $footwear_id = $data['footwear_id']; 
                    echo "<tr>";
                        echo "<td>".$footwear_id."</td>";
                        echo "<td>".$data['category_id']."</td>";
                        echo "<td>".$data['footwear_name']."</td>";
                        echo "<td>".$data['footwear_price']."</td>";
                        echo "<td>".$data['footwear_details']."</td>";
                        echo "<td>".$data['footwear_image']."</td>";
                        echo "<td><a href='processing/admin-delete-footwear.php?footwear_id=$footwear_id'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>

    </div>
</div>

<?php include('footer.php');?>
