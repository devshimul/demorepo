<?php

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "easyshop");

try {
    $con = new PDO("mysql:host=" .HOST. ";dbname=".DATABASE, USER, PASSWORD);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
