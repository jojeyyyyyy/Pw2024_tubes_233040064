<?php
session_start();
include "config.php"; // Ensure this file includes the database connection

// Check if the form has been submitted and the username and password fields are set
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ensure the $db variable is defined by including the connection file
    if (isset($db)) {
        $query = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        if ($query) {
            $cek = mysqli_num_rows($query);

            if ($cek > 0) {
                $data = mysqli_fetch_assoc($query);
                // Check if the user is an admin
                if ($data['role'] == "admin") {
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = "admin";
                    header("location:admin.php");
                // Check if the user is a regular user
                } else if ($data['role'] == "user") {
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = "user";
                    header("location:user.php");
                }
            } else {
                echo "Username atau password salah";
            }
        } else {
            echo "Query error: " . mysqli_error($db);
        }
    } else {
        echo "Database connection error.";
    }
} else {
    echo "Username and Password must be provided.";
}
?>
