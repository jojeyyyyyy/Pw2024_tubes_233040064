<?php
require '../function/functions.php';
// cek apakah tombol tambah sudah di klilk atau belum
if (isset($_POST['tambah'])) {

    if (tambah($_POST) > 0) {
        echo "<script>
    alert('data berhasil ditambahkan');
    document.location.href = '../pages/car.php';
    </script>";
    } else {
        echo "data gagal ditambahkan!";
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
    <div class="container">
        <h1>Tambah Data Cars</h1>

        <form action="" method="post">
            <div class="mb-3">
                <label for="nama_mobil" class="form-label">nama_mobil</label>
                <input type="text" class="form-control" id="nama_mobil" name="nama_mobil" required>
            </div>

            <div class="mb-3">
                <label for="generasi" class="form-label">Generasi</label>
                <input type="text" class="form-control" id="generasi" name="generasi" required>>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="text" class="form-control" id="foto" name="foto" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">tambah</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>