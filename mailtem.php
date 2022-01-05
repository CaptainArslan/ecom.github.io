<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once("header.php");
    ?>
    <style>
        ::-webkit-scrollbar {
            width: 6px;
        }

        /* ::-webkit-scrollbar-track{
    border-radius: 5px;
    box-shadow:inset 0 0 10px rgba(0,0,0,0.25)
}  */
        ::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background: rgb(189, 189, 189);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ff523b;
        }
    </style>
</head>

<body>
    <?php
    // Detail Variables
    $id = '';
    $name = '';
    $email = '';
    $phone = '';
    $address = '';
    $city = '';
    $zip = '';
    $state = '';
    $item = '';
    //Order Price Variables
    $total_price = 0;
    $total_tax = 0;
    $grand_total = 0;
    $unit_price = 0;
    $total_quantity = 0;
    $user_email = '';

    if (isset($_SESSION['shopping_cart'])) {
        if(isset($_SESSION['email']))
        {
            $user_email = $_SESSION['email'];
            $check_user  = mysqli_query($con, "SELECT * FROM `user` where `user_email` = '$user_email'");
            $row = mysqli_fetch_assoc($check_user);
            // var_dump($row);
            // exit;
            $id = $row['user_id'];
            $name = $row['user_name'];
            $email = $row['user_email'];
            $phone = $row['user_phone'];
            // $address = $row['user_address'];
            $address = $row['user_address'];
            $city = $row['user_city'];
            $zip = $row['user_zip'];
            $state = $row['user_state'];
        }
    }
    $item = '<table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #ffd6d6;">
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
                <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span> abc13234234 </p>
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
    echo $item;
    ?>
</body>

</html>