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

            <h1 class="text-center mb-5" style="padding-top:50px">Informasi kamar</h1>
                <div style="display:block">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Bintang</th>
                                            <th>Jml. Kasur</th>
                                            <th>Jml. Kamar mandi</th>
                                            <th>Wifi</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th colspan="2"></th>
                                        </tr>
                                        <?php
                                            if (isset($_POST['edit'])) {
                                                $id_edit=$_POST['id_edit'];
                                            } else {
                                                $id_edit=NULL;
                                            }                                            
                                            $data = mysqli_query($koneksi,"SELECT * FROM kamar");
                                            if (mysqli_num_rows($data)>=0)
                                            {
                                                while ($hasil = mysqli_fetch_array($data)) {
                                                    if ($hasil['id_kamar']==$id_edit) {
                                                    ?>
                                                    <form action="admin_kamar_edit.php" method="post" enctype="multipart/form-data">
                                                    <tr>
                                                        <input type="hidden" name="id_edit" value="<?= $hasil['id_kamar']?>" />
                                                        <td><input size="5" name="nama" value="<?= $hasil['nama']?>" type="text"></td>
                                                        <td><input size="5" name="harga" value="<?= $hasil['harga']?>" type="text"></td>
                                                        <td>
                                                            <select name="bintang">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td><input size="3" name="bathroom" value="<?= $hasil['bathroom']?>" type="text"></td>
                                                        <td><input size="3" name="kasur" value="<?= $hasil['kasur']?>" type="text"></td>
                                                        <td>
                                                            <select name="wifi">
                                                                <option value="yes">ada</option>
                                                                <option value="no">tidak</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <textarea rows="4" cols="15" name="deskripsi"><?= $hasil['deskripsi']?></textarea>
                                                        </td>
                                                        <td>
                                                            <input type="file" class="form-control" id="gambar" name="gambar">
                                                        </td>
                                                        <td colspan="2 "style="text-align:center;vertical-align:middle">
                                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </form>
                                                    <?php
                                                    }
                                                    else {
                                                    ?>
                                                    <tr>
                                                        <td><?= $hasil['nama']?></td>
                                                        <td><?= $hasil['harga']?></td>
                                                        <td><?= $hasil['bintang']?></td>
                                                        <td><?= $hasil['kasur']?></td>
                                                        <td><?= $hasil['bathroom']?></td>
                                                        <td><?php echo ($hasil['wifi']==1)?'ada':'tidak'; ?></td>
                                                        <td><?= $hasil['deskripsi']?></td>
                                                        <td>
                                                            <div style="overflow:hidden;width:200px;height:200px">
                                                                <img src="img/<?= $hasil['gambar'] ?>" width="200" height="200">
                                                            </div>
                                                        </td>
                                                        <td style="vertical-align:middle">
                                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                <form class="mx-1" action="admin_kamar.php" method="post">
                                                                    <input type="hidden" name="id_edit" value="<?php echo $hasil['id_kamar']; ?>">
                                                                    <input type="submit" name="edit" value="Edit" class="btn btn-primary btn-sm">
                                                                </form>
                                                            </div>
                                                        </td>
                                                        <td style="vertical-align:middle">
                                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                <form class="mx-1" action="admin_kamar.php" method="post">
                                                                    <input type="hidden" name="id_delete" value="<?php echo $hasil['id_kamar']; ?>">
                                                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                                                                </form>
                                                            </div>
                                                        </td>
                                    <!--    <form class="mx-1" action="detail.php" method="post">
                                            <input type="hidden" name="id" value="">
                                            <input type="submit" name="detail" value="Detail" class="btn btn-primary btn-sm">
                                        </form>
                                        <form class="mx-1" action="edit.php" method="post">
                                            <input type="hidden" name="id" value="">
                                            <input type="submit" name="edit" value="Edit" class="btn btn-primary btn-sm">
                                        </form>
                                    </div>-->
                                                    </tr>
                                                    <?php
                                                    }
                                                }
                                            } else {
                                            echo "<script>window.alert('gagal mengambil id');</script>";
                                            }
                                            if (isset($_POST['tambah'])) {
                                            ?>
                                            <form action="admin_kamar_add.php" method="post" enctype="multipart/form-data">
                                                <tr>
                                                    <td><input size="5" name="nama" type="text"></td>
                                                    <td><input size="5" name="harga" type="text"></td>
                                                    <td>
                                                        <select name="bintang">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><input size="3" name="bathroom" type="text"></td>
                                                    <td><input size="3" name="kasur" type="text"></td>
                                                    <td>
                                                        <select name="wifi">
                                                            <option value="yes">ada</option>
                                                            <option value="no">tidak</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <textarea rows="4" cols="15" name="deskripsi" placeholder="deskripsi"></textarea></td>
                                                    <td>
                                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                                    </td>
                                                    <td colspan="2 "style="text-align:center;vertical-align:middle">
                                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                            <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </form>
                                            <?php
                                            }
                                        ?>
                                    </table>
                                    <div>
                                        <div style="float:right;margin-top:10px;margin-bottom:10px;">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <form class="mx-1" action="admin_kamar.php" method="post">
                                                        <input type="submit" name="tambah" value="tambah" class="btn btn-success btn-sm">
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
                                            <input type="hidden" name="id" value="">
                                            <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                        <form class="mx-1" action="detail.php" method="post">
                                            <input type="hidden" name="id" value="">
                                            <input type="submit" name="detail" value="Detail" class="btn btn-primary btn-sm">
                                        </form>
                                        <form class="mx-1" action="edit.php" method="post">
                                            <input type="hidden" name="id" value="">
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
        $query = mysqli_query($koneksi, "DELETE FROM kamar WHERE id_kamar = '$id'");
        if ($query) {
            echo "<script>alert('Data berhasil dihapus');</script>";
            echo "<script>location='admin_kamar.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus');</script>";
            echo "<script>location='admin_kamar.php';</script>";
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