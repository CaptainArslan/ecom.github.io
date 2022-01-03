<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/allproduct.css">
</head>

<body>
    <?php
    // include("dbcon.php");
    include("totop.php");
    ?>

    <div class="small_container">
        <div class="row row-2">
            <h2>All Products</h2>
            <form action="" method="POST">
                <select name="sorting" id="sorting" value="<?php echo "selected" ?>" onchange="this.form.submit();">
                    <option value="0">Default sorting</option>
                    <option value="1">Sort by Rating</option>
                    <!-- <option value="product_rating">Sort by popularity</option> -->
                    <option value="2">Sort by price </option>
                    <!-- <option value="">sort by sale</option> -->
                </select>
            </form>
        </div>
        <!-- Latest Products -->

        <div class="row ">
            <?php
            //Paggination Code Start
            $limit = 12;

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1) * $limit;
            //Paggination Code End
            if (isset($_POST['sorting'])) {
                $filter = $_POST['sorting'];

                // echo $filter;

                if ($filter == 1) {
                    $queryrating = "SELECT * FROM `products` where `product_quantity` >= 1 order by product_rating DESC LIMIT {$offset}, {$limit}";
                    $result = mysqli_query($con, $queryrating);
                } else if ($filter == 2) {

                    $queryprice = "SELECT * FROM `products` where `product_quantity` >= 1 order by product_price ASC LIMIT {$offset}, {$limit}";
                    $result = mysqli_query($con, $queryprice);
                }
            } else {
                $filter = 0;
                $query = "SELECT * FROM `products` where `product_quantity` >= 0 order by product_id ASC LIMIT {$offset}, {$limit} ";
                $result = mysqli_query($con, $query);
            }

            $num  = mysqli_num_rows($result);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <form action="" method="POST" class="col-4">
                        <div class="col-4">
                            <input type='hidden' name='code' value="<?php echo  $row['product_code']; ?>" />
                            <img src="img\product_img\<?php echo  $row['product_image']; ?>" alt="Product Image" class="product_image" id="<?php echo  $row['product_code']; ?>">
                            <h4><?php echo $row['product_name']; ?></h4>
                            <div class="rating">
                            <?php 
                                $rating = round($row['product_rating'] , 5);
                                // echo $rating;
                                for($i = 0; $i<=$rating; $i++){
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                }
                                ?>
                            </div>
                            <p> $<?php echo number_format($row['product_price'], 2); ?></p>
                            <button type="submit" class="btn">Add To Cart</button>
                        </div>
                    </form>
            <?php
                }
            } else {
            }
            ?>
        </div>
        <!-- Modal -->
        <form action="" method="post">
            <div class="product_modal" id="product_modal">

            </div>
        </form>
        <!-- Page Number -->

        <?php
        //Paggination Code Start
        $record = mysqli_query($con, "SELECT * FROM `products`") or die("Query Failed");
        if (mysqli_num_rows($record) > 0) {
            $total_record = mysqli_num_rows($record);

            $total_page = ceil($total_record / $limit);
        ?>
            <div class="page-btn">
                <!-- Previous Page button Code Start-->
                <?php
                if ($page > 1) {
                ?>
                    <a href="allproducts.php?page=<?php echo $page - 1; ?>"><span>&#8592 </span></a>
                <?php
                }
                ?>
                <!-- Previous Page button Code End -->
                <?php
                for ($i = 1; $i <= $total_page; $i++) {

                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                ?>
                    <a href="allproducts.php?page=<?php echo $i; ?>"><span class="<?php echo $active; ?>"><?php echo $i; ?></span></a>
                <?php
                }
                ?>
                <!-- Next Page button Code Start-->
                <?php

                if ($total_page > $page) {
                ?>
                    <a href="allproducts.php?page=<?php echo $page + 1; ?>"><span>&#8594</span></a>
                <?php
                }
                ?>
            </div>
        <?php
        }
        //Paggination Code End
        ?>
    </div>
    <script>
            $(document).ready(function() {
        $('#product_modal').hide();
        $('.product_image').click(function() {
            var image = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "ajaxhandler.php",
                data: {
                    image: image
                },
                success: function(response) {
                    if (response == "false") {
                        swal({
                            title: "Error Occured!",
                            text: "Error Occured while Opening Modal",
                            icon: "warning",
                        });
                        $('#product_modal').hide();
                    } else {
                        // alert(response);
                        // db_response = JSON.parse(response);
                        $('#product_modal').show();
                        $('#product_modal').html(response);
                        // alert(response);
                    }
                }
            });
        });
    });
    </script>
</body>
<?php
include("footer.php");
?>

</html>