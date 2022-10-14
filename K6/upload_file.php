<?php
session_start();
require ('koneksi.php');
$waktu = time() + 600;
setcookie('LastCame', date("G:i:s - m/d/Y"), $waktu);
require("Login_cek.php");
//$namaProdukDir = 'product-details/product-info/';
$uploaddir = 'product-details/product-img/';

if (isset($_POST['submit'])) {
    //declare variables
    $email = $_SESSION['email'];
    $data = mysqli_query($koneksi,"SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($data)==1)
    {
        while ($hasil = mysqli_fetch_array($data)) {
            $id = $hasil['id_user'];
        }
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        //$email = $_POST['email'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $jml_dewasa = $_POST['jml_dewasa'];
        $jml_anak = $_POST['jml_anak'];
        $kamar = $_POST['kamar'];
        $message = $_POST['message'];
        $jemput = $_POST['jemput'];
        $namafile = $_FILES['gambar']['name'];

        $uploadfile = $uploaddir . $_FILES['gambar']['name'];
        if (move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            $uploadfile
        )) {
            $hasil = mysqli_query(
                $koneksi,
                "INSERT INTO pemesanan (name, gender, checkin, checkout, jml_dewasa, jml_anak, kamar, message, jemput, uploadfile, id_user) 
            VALUES ('$name', '$gender', '$checkin', '$checkout', '$jml_dewasa', '$jml_anak', '$kamar', '$message', '$jemput', '$namafile', '$id')"
            );

            if ($hasil) {
                echo "<script>window.alert('Data berhasil disimpan');</script>";
            } else {
                echo "<script>window.alert('Data gagal disimpan');</script>";
            }
            echo '<script>window.location = "riwayat_pesan.php";</script>';
        } else {
            echo "Error uploading file.\n";
        }
        // $fileNama = $namaProdukDir . str_replace(' ', '_', $name) . ".txt";
        // $openFileNama = fopen($fileNama, 'w') or die("File tidak bisa dibuka!");
        // fputs($openFileNama, $name);
        // fclose(($openFileNama));
    } else {
      echo "<script>window.alert('Akun anda tidak terdaftar sebagai pengguna');</script>";
      echo '<script>window.location = "booking.php";</script>';
    }
}
