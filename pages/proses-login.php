<?php
session_start();
include "config.php"; 
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $hashed_password = md5($password); // Ini sebaiknya diganti dengan password_hash()

    $query = mysqli_prepare($db, "SELECT * FROM users WHERE username=? AND password=?");
    mysqli_stmt_bind_param($query, 'ss', $username, $hashed_password); // Membandingkan dengan password yang di-hash di database
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $data['role'];
            if ($data['role'] == "admin") {
                header("location:admin.php");
            } else if ($data['role'] == "user") {
                header("location:blog.php");
            }
            exit;
        } else {
            echo "Username atau password salah";
        }
    } else {
        echo "Query error: " . mysqli_error($db);
    }
} else {
    echo "Username and Password must be provided.";
}
?>
