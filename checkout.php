<?php
require 'includes/PHPMailer.php';
require 'includes/Exception.php';
require 'includes/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include("header.php");
include("totop.php");
include("dbcon.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/checkout.css">
    <title>Chekout | Red Store</title>
</head>

<body>
    <?php
    $id = '';
    $name = '';
    $email = '';
    $phone = '';
    $address = '';
    $city = '';
    $zip = '';
    $state = '';
    $item = '';
    if (isset($_SESSION['shopping_cart']))
    {
        if (isset($_SESSION['email'])) 
        { 
            $user_email = $_SESSION['email'];

            $check_user  = mysqli_query($con, "SELECT * FROM `user` where `user_email` = '$user_email'");

            $user_count = mysqli_num_rows($check_user);
                $row = mysqli_fetch_array($check_user);
                $id = $row['user_id'];
                $name = $row['user_name'];
                $email = $row['user_email'];
                $phone = $row['user_phone'];
                // $address = $row['user_address'];
                $address = $row['user_address'];
                $city = $row['user_city'];
                $zip = $row['user_zip'];
                $state = $row['user_state'];
                ?>
                    <form action="" method="POST">
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <div class="row-2">
                                        <div class="input-container">
                                            <h3>Billing</h3>

                                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">

                                            <!-- <label for="">User ID</label>
                                            <input type="text" name="" id="" placeholder="M Arslan" title="username" value="<?php echo $row['user_id']; ?>" > -->

                                            <label for="">User Name</label>
                                            <input type="text" name="user_name" id="" placeholder="M Arslan" title="username" value="<?php echo $row['user_name']; ?>">

                                            <label for="">Email</label>
                                            <input type="email" name="user_email" id="" placeholder="123456@gmail.com" value="<?php echo $row['user_email']; ?>">
                                            <label for="">Address</label>
                                            <input type="text" name="user_address" id="" placeholder="524 gujranwala ..." value="<?php echo $row['user_address']; ?>" required>
                                            <label for="">City</label>
                                            <input type="text" name="user_city" id="" placeholder="Gujranwala" value="<?php echo $row['user_city']; ?>" required>
                                            <div class="row-2">
                                                <div class="input-container">
                                                    <label for="">Zip</label>
                                                    <input type="text" name="user_zip" id="" placeholder="52250" value="<?php echo $row['user_zip']; ?>" required>
                                                </div>
                                                <div class="input-container">
                                                    <label for="">State</label>
                                                    <input type="text" name="user_state" id="" placeholder="gujranwala" value="<?php echo $row['user_state']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <h3>Payment</h3>
                                            <label for="">Accepted Cards</label>

                                            <div class="icon-container">
                                                <a href="visa"><i class="fab fa-cc-visa" style="color:navy; font-size: 40px;"></i></a>
                                                <a href="amex"><i class="fab fa-cc-amex" style="color:blue; font-size: 40px;"></i></a>
                                                <a href="mastercard"><i class="fab fa-cc-mastercard" style="color:red; font-size: 40px;"></i></a>
                                                <!-- <a href="discover"><i class="fab fa-cc-discover" style="color:orange; font-size: 40px;"></i></a>
                                                <a href="paypal"><i class="fab fa-cc-paypal" style="color:#3b7bbf; font-size: 40px;"></i></a>
                                                <a href="amazon-pay"><i class="fab fa-cc-amazon-pay" style="color:#FF9900; font-size: 40px;"></i></a> -->
                                            </div>


                                            <label for="">Name on Card</label>
                                            <input type="text" name="" id="" placeholder="Muhammad Arslan">

                                            <label for="">Credit Card Number</label>
                                            <input type="number" name="" id="" placeholder="1111-2222-3333-4444">

                                            <label for="">Exp Month</label>
                                            <input type="text" name="" id="" placeholder="September">


                                            <div class="row-2">
                                                <div class="input-container">
                                                    <label for="">Exp Year</label>
                                                    <input type="number" name="" id="" placeholder="2018">
                                                </div>
                                                <div class="input-container">
                                                    <label for="">CVV</label>
                                                    <input type="number" name="" id="" placeholder="344">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                </div>

                                <div class="col-3">
                                    <h3>Order Details</h3>
                                    <hr>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_price = 0;
                                            $total_tax = 0;
                                            $grand_total = 0;
                                            $unit_price = 0;
                                            $total_quantity = 0;
                                            if (isset($_SESSION['shopping_cart'])) 
                                            {
                                                foreach ($_SESSION['shopping_cart'] as $product) 
                                                {

                                                    $total_quantity += $product["product_quantity"];
                                                    $total_price += ($product["product_price"] * $product["product_quantity"]);
                                                    $total_tax += ($product["product_tax"] * $product["product_quantity"]);
                                                    $grand_total = $total_price + $total_tax;
                                                    ?>
                                                        <tr style="text-align:center ;">
                                                            <td><img src="img\product_img\<?php echo $product["product_image"]; ?>" alt="<?php echo $product["product_name"]; ?>"></td>
                                                            <td><?php echo $product["product_name"]; ?></td>
                                                            <td><?php echo $product["product_quantity"]; ?></td>
                                                            <td><?php echo $total_price; ?></td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Quantity: <i><?php echo $total_quantity; ?></i> </td>
                                                <td>Tax: <i><?php echo $total_tax; ?></i></td>
                                                <td colspan="2">Total: Rs.<b><i><?php echo $grand_total; ?></i></b></td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <!-- <h2 style="text-transform: capitalize;">Order details</h2>
                                    <hr>
                                    <br>
                                    <div class="heading" style="display: flex; justify-content: space-between; padding-left: 10px; padding-right: 10px;">
                                        <div class="cart-name">
                                            <p for="" style="flex-basis: 20%; text-transform: capitalize;">image</p>
                                        </div>
                                        <div class="heading-subheading" style="display: flex; flex-basis: 70%; justify-content: space-between;">
                                            <p style="text-transform: capitalize;">name</p>
                                            <p style="text-transform: capitalize;">Quantity</p>
                                            <p style="text-transform: capitalize;">price</p>
                                        </div>
                                    </div>
                                    <div class="right_side">

                                        <?php
                                        $total_price = 0;
                                        $total_tax = 0;
                                        $grand_total = 0;
                                        $unit_price = 0;
                                        $total_quantity = 0;

                                        if (isset($_SESSION["shopping_cart"])) {
                                            foreach ($_SESSION["shopping_cart"] as $product) {

                                                $total_quantity += $product["product_quantity"];
                                                $total_price += ($product["product_price"] * $product["product_quantity"]);
                                                $total_tax += ($product["product_tax"] * $product["product_quantity"]);
                                                $grand_total = $total_price + $total_tax;
                                        ?>
                                                <div class="products" style="background: #fff; display: flex; justify-content: space-between; border-radius: 10px; margin-top: 10px; padding: 10px; align-items: center;">
                                                    <div class="product_img">
                                                        <img src="img\product_img\<?php echo $product["product_image"]; ?>" alt="<?php echo $product["product_name"]; ?>" style="height: 60px; width: 60px; border-radius: 50%; flex-basis: 20%;">
                                                    </div>
                                                    <div class="product_name_price" style="display: flex; justify-content: space-between; flex-basis: 80%;">
                                                        <p><?php echo $product["product_name"]; ?></p>
                                                        <p><?php echo $product["product_quantity"]; ?></p>
                                                        <p><?php echo $total_price; ?></p>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                        <div class="price" style="display: flex; justify-content: space-between; margin-top: 10px; ">
                                            <p>Quantity : <?php echo $total_quantity; ?></p>

                                            <p>Tax : $<?php echo $total_tax; ?></p>

                                            <p>Grand Total : $<?php echo $grand_total; ?></p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="place_order" type="submit" name="placeorder" >Place
                                Order</button>
                        </div>
                    </form>
                <?php
        } 
        else 
        {
            include_once('loginpopup.php');
        }
    } 
    else 
    {
        header('Location: index.php');
    }
    ?>

    <?php
    if (isset($_POST['placeorder'])) {

        $total_price = 0;
        $total_tax = 0;
        $grand_total = 0;
        $unit_price = 0;
        $total_quantity = 0;
        $order = true;

        $date = date("Y/m/d H:i:s");
        $email = $_POST['user_email'];
        $username = $_POST['user_name'];
        $user_id = $_POST['user_id'];
        $address = $_POST['user_address'];
        $city = $_POST['user_city'];
        $state = $_POST['user_state'];
        $zip = $_POST['user_zip'];
        $order_id = rand();

        foreach ($_SESSION["shopping_cart"] as $product) {

            $pro_code = $product["product_code"];
            $pro_name = $product["product_name"];
            $total_quantity = $product["product_quantity"];
            $total_price = ($product["product_price"] * $product["product_quantity"]);
            $total_tax = ($product["product_tax"] * $product["product_quantity"]);
            $grand_total = $total_price + $total_tax;
            $image  = $product["product_image"];


            $orderquery = mysqli_query($con, "INSERT INTO `orders`(`date_time`,`order_id`,`product_code`, `user_id`, `product_name`, `product_img`, `product_quantity`,
             `product_price`, `product_tax`, `grand_total`, `user_address`, `user_city`, `user_zip`, `user_state`) VALUES
             ('$date','$order_id','$pro_code','$user_id','$pro_name','$image','$total_quantity','$total_price','$total_tax','$grand_total','$address'
             ,'$city','$zip','$state')");

            if (!$orderquery) {
                $order = false;
                break;
            } else {


                $order_tbl_products_quantity = mysqli_query($con, "SELECT `product_quantity` FROM `products` WHERE `product_code` = '$pro_code'");
                $pro = mysqli_fetch_assoc($order_tbl_products_quantity);
                $product_quantity = $pro['product_quantity'];
                // echo "Products Quantity = ".$product_quantity;
                // echo "<br>";
                $order_quantity = $product['product_quantity'];
                // echo "Orders Quantity = ".$order_quantity;
                // echo "<br>";

                $update_quantity = $product_quantity - $order_quantity;
                // echo "Total Quantity = ".$update_quantity;
                // echo "<br>";
                // Update Quantity
                $update = mysqli_query($con, "UPDATE `products` SET `product_quantity`='$update_quantity' WHERE `product_code` = '$pro_code'");
            }
        }

        if ($order == true) {


            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth  = "true";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->Username = "arslan031776@gmail.com";
            $mail->Password = "bcsf17r23A";
            $mail->Subject = "This is php mailer email";
            $mail->setFrom("arslan031776@gmail.com");
            $mail->addEmbeddedImage("img\product_img\/' . $image. '",'Order images');
            $mail->isHTML(true);
            $mail->addAttachment("img/gallery-1.jpg");

            $mail->Body = '<table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #ffd6d6;">
            <thead>
                <tr>
                    <th style="text-align:left;"><img style="max-width: 150px;" src="img/logos/logo.png" alt="Red Store"></th>
                    <th style="text-align:right;font-weight:400;"><?php echo date("Y/m/d H:i:s");; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="height:35px;"></td>
                </tr>
                <tr>
                    <td style="width:50%;padding:20px;vertical-align:top">
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px; text-transform: capitalize;"><span style="display:block;font-weight:bold;font-size:13px ">Name</span>' . $name . '</p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span>' . $email . '</p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span>' . $phone . '</p>
                    </td>
                    <td style="width:50%;padding:20px;vertical-align:top">
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span>' . $address . '</p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">City</span>' . $city . '</p>
                        <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Zip / Postal Code</span>' . $zip . '</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Items</td>
                </tr>';
    
    
        if (isset($_SESSION["shopping_cart"])) {
    
            foreach ($_SESSION["shopping_cart"] as $product) {
                $total_quantity += $product["product_quantity"];
                $total_price += ($product["product_price"] * $product["product_quantity"]);
                $total_tax += ($product["product_tax"] * $product["product_quantity"]);
                $grand_total = $total_price + $total_tax;
    
                $img = $product["product_image"];
    
                $item .= '<tr style="padding:15px">
                            <td>
                                <p style="font-size:14px;margin:0;padding:10px;;font-weight:bold;">
                                    <span style="display:block;font-size:13px;font-weight:normal;">' . $product["product_name"] . '<br>
                                        <i>Quantity : ' . $product["product_quantity"] . '</i></span> Rs.' . $total_price . ' <b style="font-size:12px;font-weight:300;"></b>
                                </p>
                            </td>
                            <td style="padding:15px;">
                                <div class="image" style="height: 50px; width: 50px; object-fit: contain;">
                                    <img src="img\product_img\/' . $product["product_image"] . '" alt="product image" style="width: 100%;">
                                </div>
                            </td>
                        </tr>';
            }
        }
        $item .= '
                 <tr>
                    <td colspan="2" style="padding:15px;">
                        <p style="margin:0;padding:10px;">
                            <span style="display:block;font-size:13px;font-weight:normal;">Total Quantity = ' . $total_quantity . ' </span> 
                            <span style="display:block;font-size:13px;font-weight:normal;">Total Tax = ' . $total_tax . ' </span>
                            <span style="display:block;font-size:13px;font-weight:normal;">Grand Total = ' . $grand_total . '</span>
                        </p>
                    </td>
                    </tr>
                    <tr>
                        <td style="height:35px;"></td>
                    </tr>
                <tr>
                    <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                        <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0">Success</b></p>
                        <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span>'.$order_id.'</p>
                        <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span> Rs.'.$grand_total.'.00</p>
                    </td>
                </tr>
                <tr>
                    <td style="height:35px;"></td>
                </tr>
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                        <strong style="display:block;margin:0 0 10px 0;">Regards</strong> Red Store<br> Kaccha Fattomand Road Fazal Town Gujranwala Punjab Pakistan, <br> Pin/Zip - 52250<br><br>
                        <b>Phone:</b> 0317-7638978<br>
                        <b>Email:</b> arslan031776@gmail.com
                    </td>
                </tr>
            </tfooter>
        </table>';

            $mail->addAddress($email);

            if ($mail->send()) {
                unset($_SESSION['shopping_cart']);
                    echo '<script>
                swal({
                    title: "Great News!",
                    text: "Your Order has been placed successfully",
                    icon: "success",
                }).then(function() {
                    location.reload();
                    });
                </script>';
            } else {
                echo '<script>
                swal({
                    title: "Email Error!",
                    text: "Error Sending Failed",
                    icon: "warning",
                });
                </script>';
            }
            $mail->smtpClose();
        } else {
            echo '<script>
           swal({
            title: "Error ",
            text: "Error Occured While order placement",
            icon: "warning",
           });
           </script>';
        }
    }
    ?>

</body>

</html>
<?php
include("footer.php");
?>