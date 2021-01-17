<?php
session_start();
require_once 'connect.php';

if (isset($_POST['confirm'])) {
    $id = $_POST['id'];
    $qnt = $_POST['qnt'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/54fedc01a6.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <?php require_once 'menu.php' ?>
    <div class="container">

        <div class="row">
            <div class="col-6">
                <h1 class="text-center py-3">Product Details</h1>
                <?php
                $stmt = $con->query("SELECT * FROM product WHERE product_id=$id");
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                extract($result);
                $dcharge = 100;
                $discount = 0;
                $total = $product_price * $qnt;
                $grandTotal = $total - $discount + $dcharge;
                ?>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                    <tr>
                        <td><?= $product_name ?></td>
                        <td class="text-center"><?= $qnt ?></td>
                        <td class="text-center"><?= number_format($product_price,2) ?></td>
                        <td><?= number_format($total ,2) ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Discount </th>
                        <td><?= number_format($discount, 2) ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Delivery Charge </th>
                        <td><?= number_format($dcharge,2) ?></td>
                    </tr>
                    <tr>
                        <th colspan="3">Grand Total </th>
                        <td> <?= number_format($grandTotal, 2) ?> </td>
                    </tr>

                </table>
            </div>
            <div class="col-6">
                <h1 class="text-center py-3">Contact Information</h1>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <form action="success.php"  method="POST">
                            <input type="hidden" name="pid" value="<?=$id?>">
                            <input type="hidden" name="qnt" value="<?= $qnt ?>">
                            <input type="hidden" name="total" value="<?=$grandTotal?>">
                            <input class="form-control mb-3 rounded-0" type="text" name="name" placeholder="Enter Your Name">
                            <input class="form-control mb-3 rounded-0" type="text" name="email" placeholder="Enter Your Email">
                            <input class="form-control mb-3 rounded-0" type="text" name="number" placeholder="Enter Your Contact Number">
                            <textarea class="form-control mb-3 rounded-0" name="address" placeholder="Enter Your Delivery Address "></textarea>
                            <select class="form-select mb-3 rounded-0" name="payment" required>
                                <option value="cod">
                                    Payment method
                                </option>
                                <option value="cod">
                                    COD
                                </option>
                                <option disabled value="bkash">
                                    Bkash
                                </option>
                                <option disabled value="rocket">
                                    Rocket
                                </option>
                            </select>
                            <input class="mb-3" type="checkbox" required> I agree with <a class="text-decoration-none" href="#">Terms and Condition</a>
                            <input type="submit" name="confirm" value="Confirm Order" class="btn btn-outline-success w-100 rounded-0">
                        </form>

                    </div>
                </div>

            </div>
        </div>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>