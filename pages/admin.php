<?php
session_start();
if ($_SESSION['role'] != "admin") {
    header("location:login.php");
}

include('../function/functions.php');
$cars = query("SELECT * FROM cars");


if (isset($_GET['hapus_id'])) {
    $hapus_id = $_GET['hapus_id'];
    if (hapusData($hapus_id)) {
        echo "<script>alert('Data berhasil dihapus');</script>";

        echo "<script>window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Halaman Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../crud/tambah.php">Tambah Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- single product -->
    <div class="container">
        <div class="row row-product">
            <?php foreach ($cars as $c) : ?>
                <div class="card m-2">
                    <div class="col-lg-5">
                        <figure class="figure">
                            <img src="../assets/<?= $c['foto']; ?>" class="figure-img img-fluid" width="300px" height="500px">
                        </figure>
                    </div>
                    <div class="col-lg-7">
                        <h4><?= $c['nama_mobil']; ?> (<?= $c['generasi']; ?>)</h4>
                        <div class="garis-product"></div>
                        <h7><?= $c['deskripsi']; ?></h7>
                        <br>

                        <a class="btn btn-primary mt-5" href='?hapus_id=<?= $c['id_cars']; ?>' role="button" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</a>
                        <a class="btn btn-primary mt-5" href="../crud/edit.php?id=<?= $c['id_cars'];?>" role="button" onclick="return confirm('Apakah Anda yakin ingin mengubah data ini?')">edit</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- single product -->



</body>

</html>