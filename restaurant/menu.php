<?php include('header.php');?>
<?php include('nav.php');?>
       
<div class="content">
    <div class="content">
        <h1>Welcome to Alpha Footwear</h1>
        <h2>PRODUCTS PAGE</h2>

        <?php
            $conn = mysqli_connect("localhost", "root", "", "alphafootwear_db");
            $sql1 = mysqli_query($conn, "SELECT * FROM `footwear_category`");

            while($data1 = mysqli_fetch_array($sql1)){
                $category_id = $data1['category_id'];
                $category_name = $data1['category_name'];
        ?>
        <div class="clr"></div>
        <div class="categoryheading"><h1><?php echo $category_name; ?></h1></div>
        <div class="footwearmenu">
            <?php
                $sql2 = mysqli_query($conn, "SELECT * FROM `footwear_inventory` WHERE category_id = ".$category_id);
                $count = 0;

                while($data2 = mysqli_fetch_array($sql2)){
                    $count = $count + 1;
                    $footwear_id = $data2['footwear_id'];
                    $footwear_name = $data2['footwear_name'];
                    $footwear_price = $data2['footwear_price'];
                    $footwear_details = $data2['footwear_details'];
                    $footwear_image = $data2['footwear_image'];
            ?>
            <div class="footwear">
                <div class="footwearimage">
                    <img src="images/footwear/<?php echo $footwear_image; ?>" />
                </div>
                <div class="footweardetails">
                    <p><b><?php echo $footwear_name ?></b></p>
                    <p>$<?php echo $footwear_price ?></p>
                    <p><?php echo $footwear_details ?> </p>
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
            <?php } ?>

            <?php
                if($count % 2 == 1){
            ?>
            <div class="footwear">
                <div class="footwearimage"></div>
                <div class="footweardetails"></div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php include('footer.php');?>
