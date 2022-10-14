<?php
include("head.php");
require ('koneksi.php');

$waktu = time() + 600;
setcookie('LastCame', date("G:i:s - m/d/Y"), $waktu);
include("header.php");
require("Login_cek.php");
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="container">
            <div class="row">

                <h1 class="text-center mb-5" style="padding-top:50px">Riwayat Pemesanan</h1>
                <div>
                    <?php
                    $email = $_SESSION['email'];
                    $data = mysqli_query($koneksi,"SELECT * FROM users WHERE email='$email'");

                    if (mysqli_num_rows($data)==1)
                    {
                        $hasil = mysqli_fetch_array($data);
                        $id = $hasil['id_user'];
                            $query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_user=$id");
                            while ($data = mysqli_fetch_array($query)) {
                                # code...
                            ?>
                                <div class="col-md-4 mb-4" style="display:inline-flex;vertical-align:top;">
                                    <div class="card h-100">
                                        <div style="overflow:hidden;width:100%;height:200"><img class="card-img-top" src="product-details/product-img/<?php echo $data['uploadfile']; ?>" alt="courses" /></div>
                                        <div class="card-body">
                                            <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1">
                                                <?php
                                                echo $data['name'];
                                                ?>
                                            </h5><br />
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <form class="mx-1" action="riwayat_pesan.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $data['id_pemesanan']; ?>">
                                                    <input type="hidden" name="id_email" value="<?php echo $_SESSION['email']; ?>">
                                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                                                </form>
                                                <form class="mx-1" action="detail.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $data['id_pemesanan']; ?>">
                                                    <input type="hidden" name="id_email" value="<?php echo $_SESSION['email']; ?>">
                                                    <input type="submit" name="detail" value="Detail" class="btn btn-primary btn-sm">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                    } else {
                        echo "<script>window.alert('Akun anda tidak terdaftar sebagai pengguna');</script>";
                        echo '<script>window.location = "booking.php";</script>';
                    }
                ?>
                </div>
                <?php
                if (isset($_POST['delete']) && $_SESSION['email']==$_POST['id_email']) {
                    $id = $_POST['id'];
                    $query = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id_pemesanan = '$id'");
                    if ($query) {
                        echo "<script>alert('Data berhasil dihapus');</script>";
                        echo "<script>location='riwayat_pesan.php';</script>";
                    } else {
                        echo "<script>alert('Data gagal dihapus');</script>";
                        echo "<script>location='riwayat_pesan.php';</script>";
                    }
                }
                ?>
            </div>
    </div>
    </div>
</div>
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