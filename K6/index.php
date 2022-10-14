<!DOCTYPE html>
<html lang="en">

<?php
include ("head.php");
require 'koneksi.php';
$data = mysqli_query($koneksi,"SELECT * FROM kamar");
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
            include ("header.php");
            ?>
        <!-- Header End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/biru.jpeg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">INAP INSAN</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Semua Nyaman, Jadilah Tentram </h1>
                                <a href="room.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Ruang Kami</a>
                                <a href="booking.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Pesan Kamar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Tentang Kami Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">Tentang kami</h6>
                        <h1 class="mb-4">Selamat Datang di <span class="text-primary text-uppercase">INAP INSAN</span></h1>
                        <p class="mb-4">Inap Insan menawarkan 3 jenis ruangan dengan fasilitas yang berbeda namun tetap yang terbaik, memiliki taman bermain anak, 2 kolam renang, 250 meter dari pantai, hot tub dalam ruangan, restoran makanan khas Indonesia, gazebo, dan fasilitas kendaraan sepeda kayuh dan Wi-Fi gratis</p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">30</h2>
                                        <p class="mb-0">Kamar</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">150</h2>
                                        <p class="mb-0">Karyawan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">545</h2>
                                        <p class="mb-0">Pelanggan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a> -->
                    </div>
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
                </div>
            </div>
        </div>
        <!-- Tentang Kami End -->


        <!-- Ruangan Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Ruangan kami</h6>
                    <h1 class="mb-5">Jelajahi <span class="text-primary text-uppercase">Ruangan</span></h1>
                </div>
                <div class="row g-4">
                <?php if (mysqli_num_rows($data)>=0) {
                    $i=1;
                    while ($hasil = mysqli_fetch_array($data)) {
                ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.<?= $i ?>s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/<?= $hasil['gambar'] ?>" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp<?= number_format($hasil['harga'],2,',','.'); ?>/24 jam</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"><?= $hasil['nama']?></h5>
                                    <div class="ps-2">
                                        <?php
                                        for ($x = 0; $x < $hasil['bintang']; $x++) {
                                         echo '<small class="fa fa-star text-primary"></small>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i><?= $hasil['kasur'] ?> Kasur</small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i><?= $hasil['bathroom'] ?> Kamar Mandi</small>
                                    <small><i class="fa fa-wifi text-primary me-2"<?php echo ($hasil['wifi']==0)?'style="color:grey !important;"':'';?>></i>Wifi</small>
                                </div>
                                <p class="text-body mb-3"><?= $hasil['deskripsi'] ?></p>
                                <div class="d-flex justify-content-between">
                                    <!-- <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">View Detail</a> -->
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="booking.php">Pesan sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/room-2.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp1.000.000,-/24 jam</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Ruang Kenanga</h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 Kasur</small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>1 Kamar mandi</small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                </div>
                                <p class="text-body mb-3">Ruang Kenanga terdapat 10 kamar, memiliki fasilitas 1 kasur, 1 kamar mandi, Wifi gratis, TV, ruang tamu, dan meja kerja </p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="booking.php">Pesan sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!--<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/room-3.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp 1.500.000,-/24 jam</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Ruang Tulip</h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 kamar</small>
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i>2 kamar mandi</small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                </div>
                                <p class="text-body mb-3">Ruang Tulip terdapat 6 kamar, memiliki fasilitas 1 kasur, 2 kamar mandi, Wifi gratis, TV, ruang tamu, dan meja kerja </p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="booking.php">Pesan sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>-->
                <?php
                    $i=$i+2;
                    }
                } else {
                    echo "gagal entah kenapa";
                }
                ?>
                </div>
            </div>
        </div>
        <!-- Ruangan End -->

        <!-- Fasilitas Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Fasilitas kami</h6>
                    <h1 class="mb-5">Jelajahi <span class="text-primary text-uppercase">Fasilitas</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded" href="room.php">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-hotel fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Kamar</h5>
                            <p class="text-body mb-0">Tersedia 30 kamar dengan 3 jenis kamar yang memiliki fasilitas yang berbeda - beda</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-utensils fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Restoran</h5>
                            <p class="text-body mb-0">Penginapan ini memiliki restoran yang mempunyai masakan dengan citra rasa budaya khas Indonesia</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-spa fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Spa</h5>
                            <p class="text-body mb-0">Fasilitas spa yang dimiliki penginapan ini disediakan bagi berbagai kalangan yang menginap dengan menambah biaya tersendiri di luar pemesanan kamar</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <a class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-swimmer fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Kolam Renang</h5>
                            <p class="text-body mb-0">Penginapan Inap Insan memiliki 2 kolam renang dengan spesifikasi kolam renang dewasa dan anak-anak</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-glass-cheers fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Acara & Pesta</h5>
                            <p class="text-body mb-0">Inap Insan menyediakan fasilitas bagi pelanggan yang memesan kamar ataupun tidak untuk mengadakan acara indoor dan outdoor</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <a class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-dumbbell fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">GYM & Yoga</h5>
                            <p class="text-body mb-0">Pelanggan Inap Insan dapat menggunakan fasilitas GYM dan Yoga selama menginap tanpa biaya tambahan</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fasilitas End -->


        <!-- Ulasan Start -->
        <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="owl-carousel testimonial-carousel py-5">
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Gambar dengan realita sama persis tidak ada yang dibuat-buat. Bintang kejora buat Inap Insan semoga dipertahankan kualitasnya. MBL MBL Mantab Banget Loooch</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Barbara</h6>
                                <small>Pelanggan</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Kebersihan di sini sangat patut diacungi jempol 4. Pelayanan seluruh karyawan terjamin juga. Pokoknya gak bakal nyesel nginep disini</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Joni</h6>
                                <small>Vlogger</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Semua yang disediakan sangat mantap, keren, gak tau lagi mau bilang apa asalkan kualitas selalu dipertahankan dan tidak menurun saja. Sukses selalu buat Inap Insan</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Kevin</h6>
                                <small>Wiraswasta</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ulasan End -->

        <!-- Kritik dan Saran Start -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4"> Tulis <span class="text-primary text-uppercase">Kritik dan Saran</span></h4>
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Kritik dan saran anda">
                                <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kritik dan Saran End -->

        <!-- Footer Start -->
        <?php
        include ("footer.php");
        ?>
        <!-- Footer End -->

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>