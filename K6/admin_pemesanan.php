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

            <h1 class="text-center mb-5" style="padding-top:50px">Informasi Pemesanan</h1>
                <div style="display:block">
                            <div class="card w-100" style="padding: 10px">
                                <div class="card-body">
                                <?php
                                    $data = mysqli_query($koneksi,"SELECT * FROM users");
                                    if (mysqli_num_rows($data)>0)
                                    {
                                        while ($hasil = mysqli_fetch_array($data)) {
                                            $id_user = $hasil['id_user'];
                                    ?>
                                    <div style="font-weight:bold;padding-bottom:10px">E-mail : <?= $hasil['email'] ?> </div>
                                    <table class="table table-striped" style="margin-bottom:50px;font-size:x-small;table-layout:fixed;">
                                        <tr>
                                            <th>Atas nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tgl. check-in</th>
                                            <th></th>
                                            <th>Tgl. check-out</th>
                                            <th></th>
                                            <th>Jml. dewasa</th>
                                            <th>Jml. anak-anak</th>
                                            <th>Jenis kamar</th>
                                            <th></th>
                                            <th>Pesan</th>
                                            <th>Dijemput</th>
                                            <th>Kartu Identitas</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <?php
                                            if (isset($_POST['edit'])) {
                                                $id_edit=$_POST['id_edit'];
                                            } else {
                                                $id_edit=NULL;
                                            }
                                            $data1 = mysqli_query($koneksi,"SELECT * FROM kamar INNER JOIN pemesanan ON kamar.id_kamar = pemesanan.kamar WHERE id_user = $id_user");
                                            if (mysqli_num_rows($data1)>0)
                                            {
                                                while ($hasil1 = mysqli_fetch_array($data1)) {
                                                    if ($hasil1['id_pemesanan']==$id_edit) {
                                                        ?> 
                                                    <form action="admin_pemesanan_edit.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_edit" value="<?= $hasil1['id_pemesanan']?>" />
                                                        <tr>
                                                            <td><input size="5" name="name" value="<?= $hasil1['name']?>" type="text"></td>
                                                            <td>
                                                                <select name="gender">
                                                                    <option value="pria">pria</option>
                                                                    <option value="wanita">wanita</option>
                                                                </select>
                                                            </td>
                                                            <td><input size="5" name="checkin" value="<?= $hasil1['checkin']?>" type="date"></td>
                                                            <td></td>
                                                            <td><input size="5" name="checkout" value="<?= $hasil1['checkout']?>"  type="date"></td>
                                                            <td></td>
                                                            <td>
                                                                <select name="jml_dewasa">
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="jml_anak">
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="kamar">
                                                                    <option value="1">Ruang Mawar</option>
                                                                    <option value="2">Ruang Kenanga</option>
                                                                    <option value="3">Ruang Tulip</option>
                                                                </select>
                                                            </td>
                                                            <td></td>
                                                            <td><textarea rows="4" cols="5" name="pesan" placeholder="message"><?= $hasil1['message']?></textarea></td>
                                                            <td>
                                                            <div class="col-12">
                                                                <input type="checkbox" id="jemput" name="jemput" value="yes" checked>
                                                            </div>
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" id="chpic" name="chpic" value="yes" checked>
                                                                <div>Change picture</div>
                                                                <div class="col-md-6" id="pic">
                                                                    <div>
                                                                        <input type="file" name="gambar" class="form-control" id="gambar" name="gambar" value="">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td colspan="2 "style="text-align:center;vertical-align:middle">
                                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-sm">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                        <?php
                                                    } else {
                                                    ?>
                                                    <tr>
                                                        <td><?= $hasil1['name']?></td>
                                                        <td><?= $hasil1['gender']?></td>
                                                        <td><?= $hasil1['checkin']?></td>
                                                        <td></td>
                                                        <td><?= $hasil1['checkout']?></td>
                                                        <td></td>
                                                        <td><?= $hasil1['jml_dewasa']?></td>
                                                        <td><?= $hasil1['jml_anak']?></td>
                                                        <td><?= $hasil1['nama']?></td>
                                                        <td><?= $hasil1['message']?></td>
                                                        <td></td>
                                                        <td><?php echo ($hasil1['jemput']=='yes')?'ya':'tidak'; ?></td>
                                                        <td>
                                                            <div style="overflow:hidden;width:75px;height:50px">
                                                                <img src="product-details/product-img/<?= $hasil1['uploadfile'] ?>" width="70" height="50">
                                                            </div>
                                                        </td>
                                                        <td style="vertical-align:middle">
                                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                <form class="mx-1" action="admin_pemesanan.php" method="post">
                                                                    <input type="hidden" name="id_edit" value="<?php echo $hasil1['id_pemesanan']; ?>">
                                                                    <input type="submit" name="edit" value="Edit" class="btn btn-primary btn-sm">
                                                                </form>
                                                            </div>
                                                        </td>
                                                        <td style="vertical-align:middle">
                                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                                <form class="mx-1" action="admin_pemesanan.php" method="post">
                                                                    <input type="hidden" name="id_delete" value="<?php echo $hasil1['id_pemesanan']; ?>">
                                                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                }
                                            } else {
                                                echo "<tr><td colspan='12' style='font-weight:bold;text-align:center;padding-top:30px;padding-bottom:30px;'>Tidak ada data</td></tr>";
                                            }
                                        ?>
                                    </table>
                                    <?php
                                        }
                                    } else {
                                        echo "<div style='text-align:center;font-weight:bold;font-size:60px'>Tidak terdapat Data</div>";
                                    } ?>
                                </div>
                                <!--<div class="card-body">
                                    <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1">
                                    </h5><br />
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form class="mx-1" action="riwayat_pesan.php" method="post">
                                            <input type="hidden" name="id" value="hp echo $data['id_pemesanan']; ?>">
                                            <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                        <form class="mx-1" action="detail.php" method="post">
                                            <input type="hidden" name="id" value="hp echo $data['id_pemesanan']; ?>">
                                            <input type="submit" name="detail" value="Detail" class="btn btn-primary btn-sm">
                                        </form>
                                        <form class="mx-1" action="edit.php" method="post">
                                            <input type="hidden" name="id" value="?php echo $data['id_pemesanan']; ?>">
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
        $query = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id_pemesanan = '$id'");
        if ($query) {
            echo "<script>alert('Data berhasil dihapus');</script>";
            echo "<script>location='admin_pemesanan.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus');</script>";
            echo "<script>location='admin_pemesanan.php';</script>";
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