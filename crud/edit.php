<?php
require '../function/functions.php';

$id = $_GET['id'];
$crs = query("SELECT * FROM cars WHERE id_cars = $id")[0];




if(isset($_POST['edit'])){
    
    if(edit($_POST) > 0) {
        echo"<script>
                alert('Data berhasil diubah');
                document.location.href = '../pages/admin.php';
            </script>";
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pemrograman web | tambah data mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container col-8">
        <h1>Edit Data Cars</h1>

        <form action="" method="post">
        <input type="hidden" name="id" value="<?= $crs['id_cars']; ?>">
            <div class="mb-3">
                <label for="nama_mobil" class="form-label">nama_mobil</label>
                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" required value="<?= $crs['nama_mobil'];?>">
            </div>

            <div class="mb-3">
                <label for="generasi" class="form-label">Generasi</label>
                <input type="text" class="form-control" id="generasi" name="generasi" required value="<?= $crs['generasi'];?>">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required value="<?= $crs['deskripsi'];?>">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/* required value="<?= $crs['foto'];?>">
            </div>
            <button type="submit" name="edit" class="btn btn-primary">edit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>