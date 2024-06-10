<?php
session_start();
include "config.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = $_POST['password']; 

    
    $query = mysqli_prepare($db, "
        SELECT users.*, roles.role 
        FROM users 
        JOIN roles ON users.id_role = roles.id_role 
        WHERE username = ?
    ");
    mysqli_stmt_bind_param($query, 's', $username);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        
        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $data['role']; 

            if ($data['role'] == "admin") {
                header("Location: admin.php");
            } else if ($data['role'] == "user") {
                header("Location: blog.php");
            }
            exit;
        } else {
            echo "Username atau password salah";
        }
    } else {
        echo "Username atau password salah";
    }
} else {
    echo "Masukkan Username dan Password.";
}
?>
