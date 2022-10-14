<?php
session_start();
require ('koneksi.php');
$waktu = time() + 600;
setcookie('LastCame', date("G:i:s - m/d/Y"), $waktu);
require("Login_cek.php");
require("admin_cek.php");
//$namaProdukDir = 'product-details/product-info/';
$uploaddir = 'product-details/product-img/';

if (isset($_POST['submit'])) {
        $id = $_POST['id_edit'];
        //declare variables
        $nama = $_POST['nama_pegawai'];
        $jabatan = $_POST['jabatan'];
        //$email = $_POST['email'];
        $date_birth = $_POST['date_birth'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

/**        $uploadfile = $uploaddir . $_FILES['gambar']['name'];
*        if (move_uploaded_file(
*            $_FILES['gambar']['tmp_name'],
*            $uploadfile
*        )) {
**/

            $hasil = mysqli_query(
                $koneksi,
                "UPDATE pegawai SET nama_pegawai = '$nama', jabatan = '$jabatan', date_birth = '$date_birth', email = '$email', password = '$password', alamat = '$alamat', telepon = '$telepon' WHERE id_admin = '$id'"
            );

            if ($hasil) {
                echo "<script>window.alert('Data berhasil disimpan');</script>";
            } else {
                echo "<script>window.alert('Data gagal disimpan');</script>";
            }

            echo '<script>window.location = "admin_info.php";</script>';
/**        } else {
*            echo "Error uploading file.\n";
*        }
*/
        // $fileNama = $namaProdukDir . str_replace(' ', '_', $name) . ".txt";
        // $openFileNama = fopen($fileNama, 'w') or die("File tidak bisa dibuka!");
        // fputs($openFileNama, $name);
        // fclose(($openFileNama));
}
