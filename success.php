<?php
session_start();
require_once 'connect.php';

if (isset($_POST['confirm'])) {
    $product_id = $_POST['pid'];
    $product_qnt = $_POST['qnt'];
    $total = $_POST['total'];
    $customerName = $_POST['name'];
    $customerEmail = $_POST['email'];
    $customerNumber = $_POST['number'];
    $customerAddress = $_POST['address'];
    $paymentMethod = $_POST['payment'];
    if (isset($_SESSION['mysession'])) {
        $customerId = $_SESSION['mysession'];
    } else {
        $customerId = 0;
    }
    $stmt = $con->query("INSERT INTO order_table(product_id, product_qnt, total_amount, customer_id, customer_name, customer_email, contact_number, delivery_address, payment_method) VALUES ('$product_id','$product_qnt','$total','$customerId','$customerName','$customerEmail','$customerNumber','$customerAddress','$paymentMethod')");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/54fedc01a6.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
      <?php
      if($stmt){
          ?>
        <h1 class="text-center display-2 my-3 py-3">
        Order Successful
    </h1>
    <p class="display-5 my-3 px-5">Thanks For Ordering Please Wait For This Product We Will Delivered Your Product Within 24 Hours</p>
    <div class="text-center mt-3">
        <a class="btn btn-success mt-3" href="index.php"><i class="fa fa-home"></i> Continue Shopping</a>

    </div>
    <?php
      } else {
          echo "something is wrong";
      }
      ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>