<?php
require '../function/functions.php';
session_start();

$db = koneksi();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $hashed_password = md5($password); 

    $select = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $select);
 
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if(md5($password) == $row['password'] && $row['role'] == 'user'){ 
            $_SESSION['username'] = $row['username'];
            header('location: user.php');
            exit;
        } else {
            echo "Username atau password salah";
        }
    } else {
        echo "User tidak ditemukan";
    }
}
?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../pages/login.css">


    <style>
        body {
            background-image: url('../assets/latar2.jpg');
            background-size: cover;
            /* background-position: center; */
            background-repeat: no-repeat;
        }
    </style>

    <title></title>
</head>

<body>
    <div class="container" method="post">
        <form class="login-container" action="proses-login.php" method="POST">
            <h3 class="textJudul mb-5">Masuk</h3>

            <div class="mb-3">
                <label for="username" class="form-label textForm">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label textForm">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <div class="d-grid textForm mt-5">
                <button type="submit" class="btn btn-primary">Masuk</button>
            </div>

            <div class="mt-3">
                <span class="textForm">Belum Punya Akun? <a href="#" class="text-hover"><a href="register.php" class="text-daftar">Daftar disini</a></span>
            </div>

        </form>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>