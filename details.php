<?php
session_start();
require_once 'connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/54fedc01a6.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <?php require_once 'menu.php' ?>

    <div class="container">

        <!-- <tr>
                <th>Item Image</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr> -->


        <?php
        // $stm = $con->query("SELECT * FROM product_details");
        // $oun = $stm->fetchAll(PDO::FETCH_OBJ);
        // $count = $stm->rowCount();
        // echo "<pre>";
        // print_r($oun);
        // echo "</pre>";
        $stmt = $con->query("SELECT * FROM product WHERE product_id=$id");
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        foreach ($result as $val) {
        ?>
            <h1 class="text-center pt-3"><?= $val->product_name; ?></h1>
            <hr style="width: 350px; margin:0 auto">
            <h3 class="text-center py-3"> Price: &#x09F3;<?= number_format($val->product_price); ?> (Official)</h3>
            <img class="img-thumbnail rounded mx-auto my-3 d-block" src="images/<?= $val->product_img; ?>" width="40%" height="40%">
            <div class="row justify-content-center">
                <div class="col">
                    <form class="text-center" action="confirm.php" method="POST" class="form-inline">
                        <input type="hidden" name="id" value="<?= $val->product_id; ?>">
                        <!-- <div class="input-group my-3 mx-auto"> -->
                            <span>Quantity:</span>
                            <input class="btn border" type="number" name="qnt" value="1">
                            <input class="btn btn-outline-info" type="submit" name="confirm" value="Order Now">

                        <!-- </div> -->
                        <!-- <input class="btn border" type="number" name="qnt" value="1"> -->
                        <!-- <input class="btn btn-outline-info" type="submit" name="confirm" value="Order Now"> -->
                    </form>
                </div>
            </div>
            <table class="table table-striped caption-top">
                <caption class="text-center display-5 py-3"><?= $val->product_name; ?> Full Specifications</caption>
                <tr>
                    <th>Name </th>
                    <td> <?= $val->product_name; ?></td>
                </tr>
                <tr>
                    <th> Battery</th>
                    <td> <?= $val->battery; ?></td>
                </tr>
                <tr>
                    <th>Font Camera </th>
                    <td> <?= $val->font_camera; ?></td>
                </tr>
                <tr>
                    <th>Back Camera </th>
                    <td> <?= $val->back_camera; ?></td>
                </tr>
                <tr>
                    <th>RAM </th>
                    <td> <?= $val->ram; ?></td>
                </tr>
                <tr>
                    <th>ROM </th>
                    <td> <?= $val->rom; ?></td>
                </tr>
                <tr>
                    <th>OS </th>
                    <td> <?= $val->operating_system; ?></td>
                </tr>
                <tr>
                    <th>Processor </th>
                    <td> <?= $val->processor; ?></td>
                </tr>
            </table>
            <h1 class="display-4 text-center py-3"> Highlights</h1>
            <hr>
            <p style="text-align: justify;" ><?= $val->description; ?> </p>


        <?php
        }

        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>