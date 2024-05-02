<?php include('header.php');?>
<?php include('nav.php');?>
       
       	<div class="content">
            <div class="content">
            	<h1>Welcome to Local Restaurant</h1>

                <h2>MENU PAGE</h2>
                
                

                	<?php
                    
                      $conn = mysqli_connect("localhost", "root", "", "restaurant_db");
                      $sql1 = mysqli_query($conn, "SELECT * FROM `food_category`");

                      while($data1 = mysqli_fetch_array($sql1)){
                      	$category_id = $data1['category_id'];
                      	$category_name = $data1['category_name'];
                	?>
                	<div class="clr"></div>
                	<div class="categoryheading"><h1><?php echo $category_name; ?></h1></div>
                	<div class="foodmenu">
                	<?php
                    
                      
                      $sql2 = mysqli_query($conn, "SELECT * FROM `food_menu` WHERE category_id = ".$category_id);
                      $count = 0;

                      while($data2 = mysqli_fetch_array($sql2)){
                      	$count = $count + 1;
                      	$food_menu_id = $data2['food_menu_id'];
                        $food_name = $data2['food_name'];
                        $food_price = $data2['food_price'];
                        $food_details = $data2['food_details'];
                        $food_image = $data2['food_image'];
                	?>
                	
                	<div class="food">
                		<div class="foodimage">
                			<img src="images/food/<?php echo $food_image; ?>" />
                		</div>
                		<div class="fooddetails">
                		<p><b><?php echo $food_name ?></b></p>
                		<p>$<?php echo $food_price ?></p>
                		<p><?php echo $food_details ?> </p>
                		</div>
                		<div class="clr"></div>
                	</div>
                	<div class="clr"></div>
                	<?php } ?>

                	<?php
                		if($count % 2 == 1){


                	?>
                	<div class="food">
                		<div class="foodimage"></div>
                		<div class="fooddetails"></div>
                	</div>
                	<?php
                		} 
                	?>
                	</div>
                	<?php } ?>
                	
                
                
            
        		
        	</div>


        </div>

<?php include('footer.php');?>
       
        