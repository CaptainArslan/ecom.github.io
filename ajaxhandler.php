<?php
include_once("dbcon.php");

// Product Modal Opening Ajax Call
if (isset($_POST['code']) && $_POST['code'] != '') 
{
    $pro_code = $_POST['code'];
    $get_product_data = "SELECT * FROM `products` WHERE `product_code` = '$pro_code' ";
    $result = mysqli_query($con, $get_product_data);
    $row = mysqli_fetch_array($result);
    if (count($row) > 0) {
    ?>
        <div class="container" style="background: #fff;">
            <input type='hidden' id="Product_modal_hidden" name='code' value="<?php echo  $row['product_code']; ?>" />
            <span class="close" onclick="document.getElementById('product_modal').style.display='none'">&times;</span>
            <div class="row">
                <div class="col-2">
                    <img src="img/product_img/<?php echo  $row['product_image']; ?>" alt="" style="max-width: 50%;" id="product_modal_img">
                </div>
                <div class="col-2">
                    <h2 id="Product_modal_title"><?php echo  $row['product_name']; ?></h2>
                    <p id="Product_modal_description">
                        <?php if($row['product_description'] == ''){
                             echo   'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, omnis illo iste ratione. Numquam eveniet quo, ullam itaque expedita impedit. Eveniet, asperiores amet iste repellendus similique reiciendis, maxime laborum praesentium.';
                        }
                        else{
                            echo $row['product_description'];
                        }
                        ?>
                        
                    </p>
                    <ul class="cd-item-action" style="list-style: none;">
                        <div class="rating">
                        <?php
                                    for($i = 0; $i<round($row['product_rating']); $i++){
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    }
                                ?>
                            <!-- <i class="fa fa-star" id="product_modal_rating"><?php echo  $row['product_rating']; ?></i> -->
                        </div>
                        <li class="rating">Rs.<?php echo  $row['product_price']; ?></li>
                        <li><button class="add-to-cart btn" type="submit">Add to cart</button></li>
                        <!-- <li><a href="#0">Learn more</a></li> -->
                    </ul> <!-- cd-item-action -->
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "notfound";
    }
}

// Ajax Filters
if (isset($_POST['sort']) && $_POST['sort'] != '') {
    $sort = $_POST['sort'];
    // echo $sort;
    if ($sort == 'MR') {
        $sort_query = mysqli_query($con, "SELECT * FROM `products` where `product_quantity` >= 1 ORDER by `product_rating` DESC");
        $num = mysqli_num_rows($sort_query);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($sort_query)) 
            {
                ?>
                    <form action="" method="POST" class="col-4">
                        <div class="col-4">
                            <input type='hidden' name='code' value="<?php echo  $row['product_code']; ?>" />
                            <img src="img\product_img\<?php echo  $row['product_image']; ?>" alt="Product Image" class="product_image" id="<?php echo  $row['product_code']; ?>">
                            <h4><?php echo $row['product_name']; ?></h4>
                            <div class="rating">
                            <?php
                                    for($i = 0; $i<round($row['product_rating']); $i++){
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    }
                                ?>
                                <!-- <i class="fa fa-star"></i><?php echo $row['product_rating']; ?> -->
                            </div>
                            <p> $<?php echo number_format($row['product_price'], 2); ?></p>
                            <button type="submit" class="btn">Add To Cart</button>
                        </div>
                    </form>
                <?php
            }
        } 
        else 
        {
            echo "No Record found";
        }
    }
    else if($sort == 'LR')
    {
        $sort_query = mysqli_query($con, "SELECT * FROM `products` where `product_quantity` >= 1 ORDER by `product_rating` ASC");
        $num = mysqli_num_rows($sort_query);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($sort_query)) 
            {
                ?>
                    <form action="" method="POST" class="col-4">
                        <div class="col-4">
                            <input type='hidden' name='code' value="<?php echo  $row['product_code']; ?>" />
                            <img src="img\product_img\<?php echo  $row['product_image']; ?>" alt="Product Image" class="product_image" id="<?php echo  $row['product_code']; ?>">
                            <h4><?php echo $row['product_name']; ?></h4>
                            <div class="rating">
                            <?php
                                    for($i = 0; $i<round($row['product_rating']); $i++){
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    }
                                ?>
                                <!-- <i class="fa fa-star"></i><?php echo $row['product_rating']; ?> -->
                            </div>
                            <p>Rs.<?php echo number_format($row['product_price'], 2); ?></p>
                            <button type="submit" class="btn">Add To Cart</button>
                        </div>
                    </form>
                <?php
            }
        } 
        else 
        {
            echo "No Record found";
        }
    }
    else if($sort == 'MP')
    {
        $sort_query = mysqli_query($con, "SELECT * FROM `products` where `product_quantity` >= 1 ORDER by `product_price` DESC");
        $num = mysqli_num_rows($sort_query);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($sort_query)) 
            {
                ?>
                    <form action="" method="POST" class="col-4">
                        <div class="col-4">
                            <input type='hidden' name='code' value="<?php echo  $row['product_code']; ?>" />
                            <img src="img\product_img\<?php echo  $row['product_image']; ?>" alt="Product Image" class="product_image" id="<?php echo  $row['product_code']; ?>">
                            <h4><?php echo $row['product_name']; ?></h4>
                            <div class="rating">
                            <?php
                                    for($i = 0; $i<round($row['product_rating']); $i++){
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    }
                                ?>
                                <!-- <i class="fa fa-star"></i><?php echo $row['product_rating']; ?> -->
                            </div>
                            <p>Rs.<?php echo number_format($row['product_price'], 2); ?></p>
                            <button type="submit" class="btn">Add To Cart</button>
                        </div>
                    </form>
                <?php
            }
        } 
        else 
        {
            echo "No Record found";
        }
    }
    else if($sort == 'LP')
    {
        $sort_query = mysqli_query($con, "SELECT * FROM `products` where `product_quantity` >= 1 ORDER by `product_price` ASC");
        $num = mysqli_num_rows($sort_query);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($sort_query)) 
            {
                ?>
                    <form action="" method="POST" class="col-4">
                        <div class="col-4">
                            <input type='hidden' name='code' value="<?php echo  $row['product_code']; ?>" />
                            <img src="img\product_img\<?php echo  $row['product_image']; ?>" alt="Product Image" class="product_image" id="<?php echo  $row['product_code']; ?>">
                            <h4><?php echo $row['product_name']; ?></h4>
                            <div class="rating">
                            <?php
                                    for($i = 0; $i<round($row['product_rating']); $i++){
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    }
                                ?>
                                <!-- <i class="fa fa-star"></i><?php echo $row['product_rating']; ?> -->
                            </div>
                            <p>Rs.<?php echo number_format($row['product_price'], 2); ?></p>
                            <button type="submit" class="btn">Add To Cart</button>
                        </div>
                    </form>
                <?php
            }
        } 
        else 
        {
            echo "No Record found";
        }
    }
}
?>