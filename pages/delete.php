<?php
// Sertakan file koneksi.php
include "../function/functions.php";

// Periksa apakah ID yang akan dihapus telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lindungi ID dari serangan SQL Injection
    $id = mysqli_real_escape_string(koneksi(), $id);

    // Buat query untuk menghapus data dari tabel cars berdasarkan ID
    $query = "DELETE FROM cars WHERE id='$id'";
    
    // Jalankan query
    if (mysqli_query(koneksi(), $query)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . mysqli_error(koneksi());
    }
} else {
    echo "ID tidak diterima";
}
?>
