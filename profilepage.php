<?php
// include("dbcon.php");
include("header.php");
include("dbcon.php");
// include("totop.php");
if (!isset($_SESSION['user'])) {
    echo '<script>
        swal({
            title: "Login Error",
            text: "Please Login First to see your profile",
            icon: "warning",
        }).then(function() {
            window.location.href = "index.php";
        });
        </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile page | Red Store</title>
    <link rel="stylesheet" href="css/profilepage.css">
</head>

<body>

    <!-- Order of every Customer -->
    <div class="order-table">
        <div class="container">
            <div class="row">
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Trans Id</th>
                                <th>Code</th>
                                <th>Img</th>
                                <th>Name</th>
                                <th>Quan</th>
                                <th>Price</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>Address</th>
                                <th>city</th>
                                <th>zip</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_email = $_SESSION['email'];
                            $user_id_list = mysqli_query($con, "SELECT `user_id` FROM `user` WHERE `user_email` = '$user_email'");
                            $user_id  = mysqli_fetch_assoc($user_id_list);
                            $id = $user_id['user_id'];
                            $order_list = mysqli_query($con, "SELECT * FROM `orders` WHERE `user_id` = '$id'");
                            $order_count = mysqli_num_rows($order_list);
                            $sr = 1;
                            if ($order_count > 0) {
                                while ($row = mysqli_fetch_array($order_list)) 
                                {
                                    // echo  $row['product_img'];
                                    // echo "<br>";
                            ?>
                                    <tr>
                                        <td><?php echo $sr; ?></td>
                                        <td><?php echo $row['order_id'];  ?></td>
                                        <td><?php echo $row['product_code'];  ?></td>
                                        <td><img src="img/product_img/<?php echo $row['product_img'] ?>" alt="<?php echo $row['product_name'];  ?>"></td>
                                        <td><?php echo $row['product_name'];  ?></td>
                                        <td><?php echo $row['product_quantity'];  ?></td>
                                        <td><?php echo $row['product_price'];  ?></td>
                                        <td><?php echo $row['product_tax'];  ?></td>
                                        <td><?php echo $row['grand_total'];  ?></td>
                                        <td><?php echo $row['user_address'];  ?></td>
                                        <td><?php echo $row['user_city'];  ?></td>
                                        <td><?php echo $row['user_zip'];  ?></td>
                                        <td><button class="btn">view</button></td>
                                    </tr>
                                
                            <?php
                                    $sr ++;
                                }
                            } else 
                            {
                                ?>
                                    <tr>
                                        <td colspan="13">You Didn't Place any till now</td>
                                    </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <!-- Nothing here till yet -->
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.btn').click(function() {
                alert('You Click Button');
            });
        });
    </script>
</body>

</html>