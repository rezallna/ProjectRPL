<?php
include("head.php");
require 'koneksi.php';
?>

<?php
include("header.php");
require 'admin_cek.php';
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include 'admin_sidebar.php';?>
        <div class="container" style="width:75%;">
            <div class="row">
            <h1 class="text-center mb-5" style="padding-top:50px">Informasi Pengguna Terdaftar</h1>
                <div style="display:block">
                            <div class="card w-100" style="padding: 10px">
                                <div class="card-body">
                                    <table class="table table-striped" style="table-layout:fixed;">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">ID user</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $data = mysqli_query($koneksi,"SELECT * FROM users");
                                            if (mysqli_num_rows($data)>=0)
                                            {
                                                $i = 1;
                                                while ($hasil = mysqli_fetch_array($data)) {
                                                    ?>
                                                    <tr>
                                                        <td scope="row"><?= $i ?></td>
                                                        <td><?= $hasil['email']?></td>
                                                        <td><?= $hasil['id_user']?></td>
                                                        <td style="vertical-align:middle">
                                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                <form class="mx-1" action="admin_pengguna.php" method="post">
                                                                    <input type="hidden" name="id_delete" value="<?php echo $hasil['id_user']; ?>">
                                                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                            } else {
                                            echo "<script>window.alert('gagal mengambil data');</script>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--<div class="card-body">
                                    <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1">
                                    </h5><br />
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form class="mx-1" action="riwayat_pesan.php" method="post">
                                            <input type="hidden" name="id" value="]; ?>">
                                            <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                        <form class="mx-1" action="detail.php" method="post">
                                            <input type="hidden" name="id" value="hp echo $data['id_pemesanan']; ?>">
                                            <input type="submit" name="detail" value="Detail" class="btn btn-primary btn-sm">
                                        </form>
                                        <form class="mx-1" action="edit.php" method="post">
                                            <input type="hidden" name="id" value="hp echo $data['id_pemesanan']; ?>">
                                            <input type="submit" name="edit" value="Edit" class="btn btn-primary btn-sm">
                                        </form>
                                    </div>
                                </div>-->
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['delete'])) {
        $id = $_POST['id_delete'];
        $query = mysqli_query($koneksi, "DELETE FROM users WHERE id_user = '$id'");
        if ($query) {
            echo "<script>alert('Data berhasil dihapus');</script>";
            echo "<script>location='admin_pengguna.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus');</script>";
            echo "<script>location='admin_pengguna.php';</script>";
        }
    }
?>
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