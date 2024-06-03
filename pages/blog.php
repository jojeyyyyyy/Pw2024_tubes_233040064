<!DOCTYPE html>

<head lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>How to design car template using HTML & CSS</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">
        <link rel="stylesheet" type="text/css" href="style.css" </head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    </head>

<body>
    <section class="header" id="header">
        <div class="nav-bar">
            <div class="logo">
                <a href="#">Chevrolet</a>
            </div>
            <div class="menu">
                <ul>

                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="car.php">Cars</a></li>
                    <li><a href="register.php">register</a></li>

                </ul>
            </div>
        </div>
        <div class="hero">
            <div class="row">
                <div class="left-sec">
                    <div class="content">
                        <h2><span>chevrolet</span><br>camaro</h2>
                        <p>Chevrolet Camaro adalah mobil yang diproduksi oleh General Motors dengan merek Chevrolet.
                            Mobil ini diklasifikasikan sebagai mobil poni dan beberapa versinya dikategorikan sebagai
                            mobil berotot. Mobil ini pertama kali dijual pada tanggal 29 September 1967. Didesain untuk
                            berkompetisi dengan Ford Mustang. Mobil ini memakai platform dan beberapa komponen yang sama
                            dengan Pontiac Firebird.

                            Chevrolet Camaro (Generasi Pertama)</p>
                    </div>
                    <button class="discover-btn">
                        <a href="#">discover</a><span><i class="fa fa-arrow-circle-o-right"></i></span>
                    </button>
                    <div class="information">
                        <div class="production">

                        </div>
                        <div class="production">

                        </div>
                    </div>
                </div>
                <div class="right-sec">
                    <div class="my-car">
                        <div><img src="../assets/cm2 (1).png"></div>
                        <div><img src="../assets/cv6-removebg-preview.png"></div>
                        <div><img src="../assets/cm2 (2).png"></div>
                        <div><img src="../assets/m5-rill.png"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <script>
        $(document).ready(function() {
            $(".my-car").slick({
                autoplay: true,
                dots: true,
                speed: 1000,
                costumePaging: function(slider, i) {
                    var thumb = $(slider.$slides[i]).data();
                    return '<a>' + (i + i) + '</a>'
                }
            })
        })
    </script>
</body>

</html>