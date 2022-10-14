<?php
include("head.php");
require 'koneksi.php';
?>

<?php
include("header.php");
require 'admin_cek.php';
?>
<div class="container-fluid">
    <!-- Spinner Start
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    Spinner End -->
    <div class="row flex-nowrap">
        <?php include 'admin_sidebar.php';?>
        <div class="container" style="width:75%;">
            <div class="row">

                <h1 class="text-center mb-5" style="padding-top:50px">Informasi pegawai</h1>
                <div style="display:block">
                    <?php
                    $email = $_SESSION['email'];
                    $data = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE email='$email'");
                    if (mysqli_num_rows($data)==1)
                    {
                        while ($hasil = mysqli_fetch_array($data)) {
                            if (isset($_POST['edit'])) {
                                ?>
                                <div class="card w-100" style="padding: 10px">
                                    <div class="card-body">
                                    <form class="mx-1" action="admin_info_edit.php" method="post">
                                        <input type="hidden" name="id_edit" value="<?= $hasil['id_admin']?>" />       
                                        <table Style="table-layout:fixed;" class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td style="font-weight:bold">Nama</td>
                                                    <td><input name="nama_pegawai" value="<?= $hasil['nama_pegawai']?>" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Jabatan</td>
                                                    <td><input name="jabatan" value="<?= $hasil['jabatan']?>" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Tahun kelahiran</td>
                                                    <td><input name="date_birth" value="<?= $hasil['date_birth']?>" type="date"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">E-mail</td>
                                                    <td><input name="email" value="<?= $hasil['email']?>" type="email"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Password baru</td>
                                                    <td><input name="password" value="<?= $hasil['password']?>" type="password"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">Alamat</td>
                                                    <td><input name="alamat" value="<?= $hasil['alamat']?>" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight:bold">No. Telp</td>
                                                    <td><input name="telepon" value="<?= $hasil['telepon']?>" type="text"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div style="text-align:center">
                                            <div style="margin-top:10px;margin-bottom:10px;">
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                            <input type="submit" name="submit" value="submit" class="btn btn-success btn-sm">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    <!--<div class="card-body">
                                        <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1">
                                        </h5><br />
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <form class="mx-1" action="riwayat_pesan.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $data['id_pemesanan']; ?>">
                                                <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                                            </form>
                                            <form class="mx-1" action="detail.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $data['id_pemesanan']; ?>">
                                                <input type="submit" name="detail" value="Detail" class="btn btn-primary btn-sm">
                                            </form>
                                            <form class="mx-1" action="edit.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $data['id_pemesanan']; ?>">
                                                <input type="submit" name="edit" value="Edit" class="btn btn-primary btn-sm">
                                            </form>
                                        </div>
                                    </div>-->
                                </div>
                                <?php
                            } else {
                            $dateOfBirth = $hasil['date_birth'];
                            $today = date("Y-m-d");
                            $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        ?>
                            <div class="card w-100" style="padding: 10px">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight:bold">Nama</td>
                                                <td><?= $hasil['nama_pegawai']?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold">Jabatan</td>
                                                <td><?= $hasil['jabatan']?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold">Usia</td>
                                                <td><?= $diff->format('%y')?> tahun</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold">E-mail</td>
                                                <td><?= $hasil['email'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold">Alamat</td>
                                                <td><?= $hasil['alamat'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold">No. telepon</td>
                                                <td><?= $hasil['telepon'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="text-align:center">
                                        <div style="margin-top:10px;margin-bottom:10px;">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <form class="mx-1" action="admin_info.php" method="post">
                                                        <input type="submit" name="edit" value="edit" class="btn btn-primary btn-sm">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="card-body">
                                    <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1">
                                    </h5><br />
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form class="mx-1" action="riwayat_pesan.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $data['id_pemesanan']; ?>">
                                            <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                        <form class="mx-1" action="detail.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $data['id_pemesanan']; ?>">
                                            <input type="submit" name="detail" value="Detail" class="btn btn-primary btn-sm">
                                        </form>
                                        <form class="mx-1" action="edit.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $data['id_pemesanan']; ?>">
                                            <input type="submit" name="edit" value="Edit" class="btn btn-primary btn-sm">
                                        </form>
                                    </div>
                                </div>-->
                            </div>
                        <?php
                            }
                        }
                    } else {
                    echo "<script>window.alert('gagal mengambil id');</script>";
                    }
                    ?>
                </div>
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