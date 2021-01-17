<?php
session_start();
require_once 'connect.php';

if (isset($_SESSION['mysession']) == "") {
    header("Location: index.php");
    exit;
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/54fedc01a6.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once 'menu.php' ?>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col text-center">
                <img style=" width:200px; height:200px; margin-top:50px;" class="rounded-circle" src="profile/1.jpg" alt="">
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-5">
                <?php
                $id = $_SESSION['mysession'];
                $stmt = $con->query("SELECT user_name, user_email FROM users WHERE user_id='$id'");
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                // var_dump($result);
                
                
                ?>
                <h4>Name: <span><?php echo $result->user_name;?> <i class="fa fa-pencil"></i></span></h4>
                <h4>Email: <span><?php echo $result->user_email;?></span></h4>
                <?php   ?>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>