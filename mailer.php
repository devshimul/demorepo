<?php
session_start();
require_once 'connect.php';

if (isset($_SESSION['mysession']) == "") {
    header("Location: index.php");
    exit;
}
function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}
if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $error = '<p><label class="text-danger">Please Enter your Name</label></p>';
    } else {
        $name = clean_text($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
        }
    }
    if (empty($_POST["email"])) {
        $error = '<p><label class="text-danger">Please Enter your Email</label></p>';
    } else {
        $email = clean_text($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }
    if (empty($_POST["message"])) {
        $error = '<p><label class="text-danger">Message is required</label></p>';
    } else {
        $message = clean_text($_POST["message"]);
    }
    if (!isset($error)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $stmt = $con->query("INSERT INTO feedback (user_name, user_email, user_msg) VALUES('$name', '$email', '$message')");
        if ($stmt) {
            $successmsg = "Thans For Contact With Us";
        } else {
            $error = "Something is Wrong with your query";
        }
    }
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/54fedc01a6.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php require_once 'menu.php' ?>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <?php
            if (isset($successmsg)) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $successmsg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }

            ?>
            <div class="col-6">
                <h1 class="text-center display-3 mb-4">Send Feedback</h1>
                <?php
                if (isset($error)) {
                    echo "<h3> $error</h3>";
                }
                ?>
                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="name" placeholder="Enter name" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="email" placeholder="Enter email" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Enter Your Message"></textarea>
                    </div>
                    <input type="submit" name="submit" class="form-control btn btn-success">
                </form>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
</body>

</html>