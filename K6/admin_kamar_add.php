<?php
session_start();
require ('koneksi.php');
$waktu = time() + 600;
setcookie('LastCame', date("G:i:s - m/d/Y"), $waktu);
require("Login_cek.php");
require("admin_cek.php");
//$namaProdukDir = 'product-details/product-info/';
$uploaddir = 'img/';

if (isset($_POST['submit'])) {
        //declare variables
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        //$email = $_POST['email'];
        $bintang = $_POST['bintang'];
        $kasur = $_POST['kasur'];
        $bathroom = $_POST['bathroom'];
        $wifi = $_POST['wifi'];
        $deskripsi = $_POST['deskripsi'];
        $imagename =  $_FILES['gambar']['name'];
        $uploadfile = $uploaddir . $_FILES['gambar']['name'];
        if (move_uploaded_file($_FILES['gambar']['tmp_name'],$uploadfile)) {
            $hasil = mysqli_query(
                $koneksi,
                "INSERT INTO kamar (nama,harga,bintang,kasur,bathroom,wifi,deskripsi,gambar) VALUES ('$nama',$harga,'$bintang','$kasur','$bathroom','$wifi','$deskripsi','$imagename')"
            );

            if ($hasil) {
                echo "<script>window.alert('Data berhasil disimpan');</script>";
            } else {
                echo "<script>window.alert('Data gagal disimpan');</script>";
            }
            echo '<script>window.location = "admin_kamar.php";</script>';
        } else {
            echo "<script>window.alert('gambar gagal upload');</script>";
        }
        // $fileNama = $namaProdukDir . str_replace(' ', '_', $name) . ".txt";
        // $openFileNama = fopen($fileNama, 'w') or die("File tidak bisa dibuka!");
        // fputs($openFileNama, $name);
        // fclose(($openFileNama));
}
