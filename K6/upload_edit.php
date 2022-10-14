<?php
session_start();
require ('koneksi.php');
$waktu = time() + 600;
setcookie('LastCame', date("G:i:s - m/d/Y"), $waktu);
require("Login_cek.php");
//$namaProdukDir = 'product-details/product-info/';
$uploaddir = 'product-details/product-img/';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_pemesanan = $id");
    $data = mysqli_fetch_array($query);
    //declare variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $chpic = $_POST['chpic'];
    echo $_POST['chpic'];
    //$email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $jml_dewasa = $_POST['jml_dewasa'];
    $jml_anak = $_POST['jml_anak'];
    $kamar = $_POST['kamar'];
    $message = $_POST['message'];
    $jemput = $_POST['jemput'];
    $namafile = $_FILES['gambar']['name'];

    if ($chpic == 'yes') {
    $uploadfile = $uploaddir . $_FILES['gambar']['name'];
        if (move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            $uploadfile
        )) {
            echo "File berhasil diupload \n";
        } else {
            echo "Error uploading file.\n";
        }
    } else {
        $uploadfile = $data['uploadfile'];
    }

    $hasil = mysqli_query(
        $koneksi,
        "UPDATE pemesanan SET name = '$name', gender = '$gender', checkin = '$checkin', checkout = '$checkout', jml_dewasa = '$jml_dewasa', jml_anak = '$jml_anak', kamar = '$kamar', message = '$message', jemput= '$jemput', uploadfile = '$namafile' WHERE id_pemesanan = '$id'"
    );

    if ($hasil) {
        echo "<script>window.alert('Data berhasil disimpan');</script>";
    } else {
        echo "<script>window.alert('Data gagal disimpan');</script>";
    }

    echo '<script>window.location = "riwayat_pesan.php";</script>';
    
    // $fileNama = $namaProdukDir . str_replace(' ', '_', $name) . ".txt";
    // $openFileNama = fopen($fileNama, 'w') or die("File tidak bisa dibuka!");
    // fputs($openFileNama, $name);
    // fclose(($openFileNama));
}
