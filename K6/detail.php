<!DOCTYPE html>
<html lang="en">

<?php
include("head.php");
require "koneksi.php";

$id = $_POST['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_pemesanan = '$id'");
$data = mysqli_fetch_array($query);
?>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Header Start -->
        <?php
        include("header.php");
        ?>
        <!-- Header End -->


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/biru.jpeg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Pemesanan</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Pemesanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Booking Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Pemesanan</h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase"></span>Detail Pemesanan</h1>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <h3 class="mb-3">Detail Pemesanan</h3>
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-2">Nama = <?php echo $data['name']; ?></p>
                                    <p class="mb-2">Jenis Kelamin = <?php echo $data['gender']; ?></p>
                                    <p class="mb-2">Tanggal Check-In = <?php echo $data['checkin']; ?></p>
                                    <p class="mb-2">Tanggal Check-Out = <?php echo $data['checkout']; ?></p>
                                    <p class="mb-2">Jumlah Dewasa = <?php echo $data['jml_dewasa']; ?></p>
                                    <p class="mb-2">Jumlah Anak = <?php echo $data['jml_anak']; ?></p>
                                    <p class="mb-2">Jenis Kamar = <?php echo $data['kamar']; ?></p>
                                    <p class="mb-2">Pesan = <?php echo $data['message']; ?></p>
                                    <p class="mb-2">Jemput = <?php echo ($data['jemput']=='yes')?'ya':'tidak'; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script>
        const checkbox = document.getElementById('chpic');

        const box = document.getElementById('pic');

        checkbox.addEventListener('click', function handleClick() {
            if (checkbox.checked) {
                box.style.display = 'block';
            } else {
                box.style.display = 'none';
            }
        });
    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>