<?php

include "../function/functions.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $id = mysqli_real_escape_string(koneksi(), $id);

   
    $query = "DELETE FROM users WHERE id='$id'";
    
    
    if (mysqli_query(koneksi(), $query)) {
        echo "Data berhasil dihapus";
        header("Location: daftar_user.php");
        exit();
    } else {
        echo "Error: " . mysqli_error(koneksi());
    }
} else {
    echo "ID tidak diterima";
}
?>
