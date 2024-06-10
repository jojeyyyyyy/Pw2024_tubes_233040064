<?php
include '../pages/functions.php';


$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

$cars = cari($keyword); 

// Tampilkan hasil pencarian
foreach ($cars as $car) {
    echo '<div class="col-lg-5">';
    echo '<figure class="figure">';
    echo '<img src="../assets/'. $car['foto'] .'" class="figure-img img-fluid" width="300px" height="500px">';
    echo '<figcaption class="figure-caption d-flex justify-content-evenly">';
    echo '</figcaption>';
    echo '</figure>';
    echo '</div>';
    
    echo '<div class="col-lg-7">';
    echo '<h4>'. $car['nama_mobil'] .' ('. $car['generasi'] .')</h4>';
    echo '<div class="garis-product"></div>';
    echo '<p>'. $car['deskripsi'] .'</p>';
    echo '</div>';
}
?>
