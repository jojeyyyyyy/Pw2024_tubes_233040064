<?php
function db($conn) 
{
    $db = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040064')  or die('koneksi ke DB gagal');
    return $db;
}

function koneksi()
{
    $db = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040064')  or die('koneksi ke DB gagal');
    return $db;
}
function query($sql)
{
    // koneksi ke database
    $conn = koneksi();
    // lakukan query untuk mengambil data mobil
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function hapusData($id)
{
    $conn = koneksi();

    // Lindungi ID dari serangan SQL Injection
    $id = mysqli_real_escape_string($conn, $id);

    // Buat query untuk menghapus data dari tabel cars berdasarkan ID
    $query = "DELETE FROM cars WHERE id_cars='$id'";

    // Jalankan query
    if (mysqli_query($conn, $query)) {
        return true; // Penghapusan berhasil
    } else {
        return false; // Penghapusan gagal
    }
}


function tambah($data)
{
    $conn = koneksi();
    // cek apakah data berhasil di tambahkan atau tidak
    $nama_mobil = htmlspecialchars($data['nama_mobil']);
    $generasi =  htmlspecialchars($data['generasi']);
    $deskripsi =  htmlspecialchars($data['deskripsi']);
    $foto =  htmlspecialchars($data['foto']);


    $sql = "INSERT INTO cars VALUES
            (null, '$nama_mobil', '$generasi', '$deskripsi', '$foto')";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}


function registrasi($data)
{
    $conn = koneksi();

   $gambar = "deffault.img";
    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $idrole = 2;

    $query = "INSERT INTO users
                VALUES
                (null, '$gambar', '$username', '$email', '$password', '$idrole')
             ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
 
}