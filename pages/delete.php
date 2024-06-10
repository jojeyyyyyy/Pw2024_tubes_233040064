<?php

include "functions.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $id = mysqli_real_escape_string(koneksi(), $id);

   
    $query = "DELETE FROM cars WHERE id='$id'";
    
    
    if (mysqli_query(koneksi(), $query)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . mysqli_error(koneksi());
    }
} else {
    echo "ID tidak diterima";
}
?>
