<?php
session_start();
 if(!isset($_SESSION['mysession'])){
    header("Location: index.php?error=Please Login First to Continue your process!!");

 }
require_once 'connect.php';

// $division = $con->query("SELECT * FROM division");
// $result = $division->fetch(PDO::FETCH_ASSOC);
// print_r($result);
if (isset($_GET['delete'])) {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        if ($values["item_id"] == $_GET["id"]) {
            unset($_SESSION["shopping_cart"][$keys]);
        }
    }
}
if (isset($_POST['order'])) {
    $id = $_GET['product_id'];
    $qnt = $_POST['qnt'];
    $stmt = "SELECT * FROM product WHERE product_id= '$id'";
    $result = $con->query($stmt);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($id, $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'               =>     $id,
                'item_name'               =>     $row["p_description"],
                'item_price'          =>     $row["product_price"],
                'item_image'         =>    $row["product_img"],
                'item_quantity'          =>     $qnt
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {

            header("Location: index.php?error=This product is already added!!");
            exit;
        }
        header("Location: index.php?error=New product added!!");
        exit;
    } else {
        $item_array = array(
            'item_id'               =>     $id,
            'item_name'               =>     $row["p_description"],
            'item_price'          =>     $row["product_price"],
            'item_image'         =>    $row["product_img"],

            'item_quantity'          =>     $qnt
        );
        $_SESSION["shopping_cart"][0] = $item_array;
        header("Location: index.php?error=New product added!!");
        exit;
    }
    // header("Location: index.php?error=hi!!");
    // exit;
}
if (isset($_GET["action"])) {
    // foreach ($_SESSION["shopping_cart"] as $keys => $values) {
    //     if ($values["item_id"] == $_GET["action"]) {
    unset($_SESSION["shopping_cart"]);
    header("Location: index.php?error=Your cart is empty now !!");
    exit;

    // echo '<script>window.location="index.php"</script>';
    // }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/54fedc01a6.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <?php require_once 'menu.php' ?>




    <div class="container table-responsive">
        <h1 class="text-center my-3">Order Details</h1>

        <table class="table table-striped table-bordered text-center">
            <tr>
                <th>Item Image</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            <?php
            if (!empty($_SESSION["shopping_cart"])) {
                $total = 0;
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            ?>
                    <tr class="align-middle">
                        <td><img src="images/<?php echo $values["item_image"]; ?>" alt="" width="100" height="100"></td>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?>


                        </td>
                        <td>$ <?php echo number_format($values["item_price"], 2); ?>
                        </td>
                        <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);
                                ?></td>
                        <td><a class="text-decoration-none" href="order.php?delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>
                <?php
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
                ?>
                <tr class="bg-dark text-light">
                    <td colspan="4" align="right"> Grand Total</td>
                    <td>$ <?php echo number_format($total, 2);
                            ?></td>
                    <td> <a class="text-decoration-none text-light" href="order.php?action"> Clear Cart</a></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <select name="method form-control w-100" id="method">
                            <option value=""> Pament Method</option>
                            <option value="COD">Cash On Delevary</option>
                            <option value="bkash" disabled>Bkash</option>
                            <option value="Rocket" disabled>Rocket</option>
                        </select>
                    </td>
                    <td colspan="3" class="bg-danger ">
                        <a href="#" class="text-light text-decoration-none w-100"> Confirm Order</a>
                    </td>
                </tr>
            <?php
            } else {
            ?>
                <tr>
                    <td colspan="6" class="display-4 py-3 text-info"> Your Cart is Empty !!!!</td>
                </tr>
            <?php
            }
            ?>
        </table>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>