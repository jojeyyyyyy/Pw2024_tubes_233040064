<?php

include 'functions.php';
$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT * FROM cars";
if (!empty($search)) {
    $sql .= " WHERE nama_mobil LIKE '%$search%' OR generasi LIKE '%$search%' OR deskripsi LIKE '%$search%'";
}

$cars = [];
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $cars = cari($keyword);
} else {
    $cars = query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../pages/cars.css">

    <title>Cars</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="service-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                    <path d="M2.827 8.25l.257-.018.076-.005c1.311 0 2.963 4.604 3.343 6.724.63-.22 1.272-.401 1.923-.545-.219-1.122-.637-2.472-1.06-3.562l.172.002c1.549 0 3.271-.571 4.464-2.016 1.191 1.444 2.914 2.016 4.463 2.016l.171-.002c-.424 1.09-.842 2.44-1.058 3.562.649.144 1.291.325 1.921.544.379-2.121 2.031-6.724 3.341-6.724l.076.005.256.018c.986.001 1.828-.803 1.828-1.832 0-1.013-.82-1.833-1.832-1.833-1.217 0-2.104 1.167-1.764 2.329.287.981-1.247 1.935-2.939 1.935-1.613 0-3.37-.867-3.83-3.405-.24-1.324.02-1.671.666-2.321.328-.329.533-.783.533-1.287 0-1.014-.82-1.835-1.834-1.835-1.012 0-1.833.821-1.833 1.833 0 .503.204.958.534 1.287.647.651.907.998.668 2.321-.461 2.539-2.218 3.406-3.831 3.406-1.692 0-3.227-.955-2.94-1.935.34-1.162-.549-2.329-1.764-2.329-1.012 0-1.834.821-1.834 1.834 0 1.029.842 1.833 1.827 1.833zm.033 9.735l2.343 3.335c-.89.769-1.664 1.668-2.277 2.68l-.566-3h-2.36c.807-1.167 1.771-2.136 2.86-3.015zm18.28 0l-2.343 3.335c.89.769 1.664 1.668 2.277 2.68l.566-3h2.36c-.807-1.167-1.771-2.136-2.86-3.015zm-1.383.228l-2.334 3.322c-1.603-.924-3.448-1.464-5.423-1.473-1.975.009-3.82.549-5.423 1.473l-2.334-3.322c2.266-1.386 4.912-2.202 7.757-2.211 2.845.009 5.491.825 7.757 2.211zm-10.908.561l.53-.511-.729-.101-.323-.662-.322.663-.729.101.531.511-.13.725.65-.348.65.348-.128-.726zm3.672-.5l.53-.511-.729-.101-.322-.662-.322.663-.729.101.531.511-.13.725.65-.348.65.348-.129-.726zm3.718.5l.53-.511-.729-.101-.322-.662-.322.663-.729.101.531.511-.131.725.65-.348.65.348-.128-.726z" />
                </svg>
                <span class="text-white">Cars<strong> Chevrolet</strong></span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="blog.php">Beranda</a>
                    </li>
                </ul>
                <form class="d-flex" id="searchForm" action="" method="GET">
                    <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Breadcrumb -->
    <div class="container">
        <nav aria-label="breadcrumb" style="background-color: #26284e" class="mt-3">
            <ol class="breadcrumb p-3">
                <li class="breadcrumb-item"><a href="blog.php" class="text-decoration-none">Beranda</a></li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb -->

    <!-- Single product -->
    <div class="container">
        <div class="row row-product" id="result">
            <?php if (!empty($cars)) : ?>
                <?php foreach ($cars as $car) : ?>
                    <div class="col-lg-5">
                        <figure class="figure">
                            <img src="../assets/<?= $car['foto']; ?>" class="figure-img img-fluid" width="300px" height="500px">
                            <figcaption class="figure-caption d-flex justify-content-evenly">
                            </figcaption>
                        </figure>
                    </div>

                    <div class="col-lg-7">
                        <h4><?= $car['nama_mobil']; ?> (<?= $car['generasi']; ?>)</h4>
                        <div class="garis-product"></div>
                        <p><?= $car['deskripsi']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Tidak ada data mobil yang ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Single product -->

    <!-- footer -->
    <footer class="bg-light p-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                        <path d="M2.827 8.25l.257-.018.076-.005c1.311 0 2.963 4.604 3.343 6.724.63-.22 1.272-.401 1.923-.545-.219-1.122-.637-2.472-1.06-3.562l.172.002c1.549 0 3.271-.571 4.464-2.016 1.191 1.444 2.914 2.016 4.463 2.016l.171-.002c-.424 1.09-.842 2.44-1.058 3.562.649.144 1.291.325 1.921.544.379-2.121 2.031-6.724 3.341-6.724l.076.005.256.018c.986.001 1.828-.803 1.828-1.832 0-1.013-.82-1.833-1.832-1.833-1.217 0-2.104 1.167-1.764 2.329.287.981-1.247 1.935-2.939 1.935-1.613 0-3.37-.867-3.83-3.405-.24-1.324.02-1.671.666-2.321.328-.329.533-.783.533-1.287 0-1.014-.82-1.835-1.834-1.835-1.012 0-1.833.821-1.833 1.833 0 .503.204.958.534 1.287.647.651.907.998.668 2.321-.461 2.539-2.218 3.406-3.831 3.406-1.692 0-3.227-.955-2.94-1.935.34-1.162-.549-2.329-1.764-2.329-1.012 0-1.834.821-1.834 1.834 0 1.029.842 1.833 1.827 1.833zm.033 9.735l2.343 3.335c-.89.769-1.664 1.668-2.277 2.68l-.566-3h-2.36c.807-1.167 1.771-2.136 2.86-3.015zm18.28 0l-2.343 3.335c.89.769 1.664 1.668 2.277 2.68l.566-3h2.36c-.807-1.167-1.771-2.136-2.86-3.015zm-1.383.228l-2.334 3.322c-1.603-.924-3.448-1.464-5.423-1.473-1.975.009-3.82.549-5.423 1.473l-2.334-3.322c2.266-1.386 4.912-2.202 7.757-2.211 2.845.009 5.491.825 7.757 2.211zm-10.908.561l.53-.511-.729-.101-.323-.662-.322.663-.729.101.531.511-.13.725.65-.348.65.348-.128-.726zm3.672-.5l.53-.511-.729-.101-.322-.662-.322.663-.729.101.531.511-.13.725.65-.348.65.348-.129-.726zm3.718.5l.53-.511-.729-.101-.322-.662-.322.663-.729.101.531.511-.131.725.65-.348.65.348-.128-.726z" />
                    </svg>
                    <span>copyright @2023 | Created and Develope by <a href="https://www.instagram.com/jojeyyy_/" class="text-decoration-none text-dark fw-bold">JMATULESSY</a></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->

    <!-- Custom JavaScript for AJAX -->
    <script>
      
        document.getElementById("searchInput").addEventListener("input", function() {
            var keyword = this.value.trim(); 
            sendAjaxRequest(keyword);
        });

        // Tambahkan event listener untuk form pencarian
        document.getElementById("searchForm").addEventListener("submit", function(event) {
            event.preventDefault(); 
            var keyword = document.getElementById("searchInput").value.trim(); 
            sendAjaxRequest(keyword);
        });

        // Fungsi untuk mengirim permintaan AJAX
        function sendAjaxRequest(keyword) {
            var xhr = new XMLHttpRequest();
            if (keyword.length >= 2 || keyword.length === 0) { 
                // Mengirim permintaan AJAX
                var url = keyword.length === 0 ? "../ajax/ajax.php" : "../ajax/ajax.php?keyword=" + keyword; 
                xhr.open("GET", url, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        document.getElementById("result").innerHTML = xhr.responseText; 
                    }
                };
                xhr.send();
            }
        }
    </script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+EtJ/6QDa5etfE9HDjC2abTk1tjFgERdknLPMO" crossorigin="anonymous"></script>
</body>

</html>