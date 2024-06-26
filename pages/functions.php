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


    $id = mysqli_real_escape_string($conn, $id);


    $query = "DELETE FROM cars WHERE id_cars='$id'";


    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}


function tambah($data)
{
    $conn = koneksi();
    $nama_mobil = htmlspecialchars($data['nama_mobil']);
    $generasi =  htmlspecialchars($data['generasi']);
    $deskripsi =  htmlspecialchars($data['deskripsi']);
    $foto =  htmlspecialchars($data['foto']);


    $sql = "INSERT INTO cars VALUES
            (null, '$nama_mobil', '$generasi', '$deskripsi', '$foto')";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}


function edit($data)
{
    $conn = koneksi();
    $id_cars = htmlspecialchars($data['id']);
    $nama_mobil = htmlspecialchars($data['nama_mobil']);
    $generasi = htmlspecialchars($data['generasi']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $foto = htmlspecialchars($data['foto']);

    $query = "UPDATE cars SET
            nama_mobil = '$nama_mobil',
            generasi = '$generasi',
            deskripsi = '$deskripsi',
            foto = '$foto'
        WHERE id_cars = $id_cars";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $username = htmlspecialchars(strtolower($data['username']));
    $password1 = mysqli_real_escape_string($conn, $data['password1']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    if (empty($username) || empty($password1) || empty($password2)) {
        echo "<script>
                alert('username /password tidak boleh kosong!')
                document.location.href = 'register.php'
            </script>";
        return false;
    }

    

    if (query("SELECT * FROM users WHERE username = '$username'")) {
        echo "<script>
                alert('username sudah terdaftar')
                document.location.href = 'register.php'
            </script>";
        return false;
    }

    if ($password1 !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai')
                document.location.href = 'register.php'
            </script>";
        return false;
    }

    
}

function cari($keyword)
{
    $conn = koneksi();

    $query = "SELECT * FROM cars
               WHERE 
               nama_mobil LIKE '%$keyword%' OR
               generasi LIKE '%$keyword%' OR
               deskripsi LIKE '%$keyword%' OR
               foto LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


