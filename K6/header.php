<?php
session_start();
if (!isset($_SESSION['email'])||!isset($_COOKIE['LastCame'])){
    echo '<script>window.onload = function()
    {
        var user = document.getElementById("pengguna");
        user.setAttribute("href","login.php");
        user.innerHTML="Login<i class=\"fa fa-arrow-right ms-3\" ></i>";
    };
    </script>';
} else {
    echo '<script>window.onload = function()
    {
        var user = document.getElementById("pengguna");
        user.setAttribute("href","logout.php");
        user.innerHTML="Logout<i class=\"fa fa-arrow-right ms-3\" ></i>";
    };
    </script>';
}
?>
<div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Inap Insan</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                            <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <p class="mb-0">inapinsan@gmail.com</p>
                            </div>
                            <div class="h-100 d-inline-flex align-items-center py-2">
                                <i class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">(021) 6995103</p>
                            </div>
                        </div>
                        <div class="col-lg-5 px-5 text-end">
                            <div class="d-inline-flex align-items-center py-2">
                                <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                                <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                                <a class="" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.php" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Inap Insan</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index.php" class="nav-item nav-link active">Beranda</a>
                                <a href="about.php" class="nav-item nav-link active">Tentang kami</a>
                                <a href="service.php" class="nav-item nav-link active">Fasilitas</a>
                                <a href="room.php" class="nav-item nav-link active">Ruangan</a>
                                <div class="nav-item dropdown">
                                    <a href="booking.php" class="nav-link active dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">Pemesanan</a>
                                    <div class="dropdown-menu rounded-0 m-0" data-bs-popper="none">
                                        <a href="booking.php" class="dropdown-item">Pesan Kamar</a>
                                        <a href="riwayat_pesan.php" class="dropdown-item">Riwayat Pemesanan</a>
                                    </div>
                                </div>
                                <a href="contact.php" class="nav-item nav-link active">Hubungi</a>
                            </div>
                            <a id="pengguna" href="login.php" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>