<!DOCTYPE html>
<html lang="en">

<?php
include("head.php");
require ('koneksi.php');

$waktu = time() + 600;
setcookie('LastCame', date("G:i:s - m/d/Y"), $waktu);

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
        require("Login_cek.php");
        if ($_SESSION['email']!=$_POST['id_email']) {
            echo "<script>alert('Permintaan ditolak');</script>";
            echo "<script>window.location = 'riwayat_pesan.php';</script>";
        }
        ?>
        <!-- Header End -->


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/biru.jpeg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Edit Pesanan</h1>
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
                    <h6 class="section-title text-center text-primary text-uppercase">Edit Pesan Kamar</h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase"></span>Edit Formulir</h1>
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
                        <form enctype="multipart/form-data" method="post" action="upload_edit.php">
                                <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                                <div class="row g-3">
                                    <div style="width:100%" class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama anda" value="<?php echo $data['name'] ?>">
                                            <label for="name">Nama Lengkap</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input id="pria" name="gender" value="pria" type="radio" class="form-check-input" checked>
                                        <label class="form-check-label" for="credit">Pria</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="wanita" name="gender" value="wanita" type="radio" class="form-check-input">
                                        <label class="form-check-label" for="debit">Wanita</label>
                                    </div>
                              
                                    <div class="col-md-6">
                                        <div class="form-floating" id="date3" data-target-input="nearest">
                                            <input type="date" class="form-control" id="checkin" name="checkin" placeholder="Check In" data-target="#date3" data-toggle="datetimepicker" value="<?php echo $data['checkin'] ?>" />
                                            <label for="checkin">Check In</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating" id="date4" data-target-input="nearest">
                                            <input type="date" class="form-control" id="checkout" name="checkout" placeholder="Check Out" data-target="#date4" data-toggle="datetimepicker" value="<?php echo $data['checkout'] ?>" />
                                            <label for="checkout">Check Out</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="select1" name="jml_dewasa">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                            <label for="select1">Jumlah Dewasa</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="select2" name="jml_anak">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                            <label for="select2">Jumlah anak-anak</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="select3" name="kamar">
                                                <option value="1">Kamar Mawar</option>
                                                <option value="2">Kamar Kenanga</option>
                                                <option value="3">Kamar Tulip</option>
                                            </select>
                                            <label for="select3">Pilih jenis kamar</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Special Request" id="message" name="message" style="height: 100px" value="<?php echo $data['message'] ?>"></textarea>
                                            <label for="message">Permintaan khusus</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="checkbox" id="chpic" name="chpic" value="yes" checked>
                                        <label for="chpic"> Change picture?</label><br>
                                    </div>
                                    <div class="col-md-6" id="pic">
                                        <div class="form-floating">
                                            <input type="file" name="gambar" class="form-control" id="gambar" name="gambar" value="<?php echo $data['gambar'] ?>">
                                            <label for="gambar">Foto Kartu Identitas</label>
                                        </div>
                                    </div>

                                     <div class="col-12">
                                        <input class="form-check-input" type="checkbox" value="yes" id="jemput" name="jemput">
                                        <label class="form-check-label" for="flexCheckDefault">Perlu jemputan?</label>
                                        </div>
                                    </div> <br />

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Terapkan Perubahan</button>
                                    </div>
                                </div>
                            </form>
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