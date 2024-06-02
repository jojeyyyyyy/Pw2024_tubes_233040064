// user.php
<?php
session_start();
if($_SESSION['role'] != "user"){
    header("location:login.php");
}

echo "Selamat datang User, " . $_SESSION['username'];
?>