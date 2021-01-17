<?php
session_start();
if (isset($_SESSION['mysession']) != "") {
  session_destroy();
  unset($_SESSION['mysession']);
  unset($_SESSION['role']);
  header("Location: index.php");
} else if (isset($_SESSION['role']) != "") {
  session_destroy();
  unset($_SESSION['role']);
  header("Location:index.php");
}
else{
  header("Location:index.php");
}
