<?php
require ('koneksi.php');
session_start();
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $hasil = mysqli_query(
        $koneksi,
        "INSERT INTO users (email, password) VALUES ('$email','$password')"
    );

    if ($hasil) {
        $data = mysqli_query($koneksi,"SELECT * FROM users WHERE email='$email' AND password='$password'");
        $d = mysqli_fetch_array($data);

        if (mysqli_num_rows($data)==1)
        {
            $_SESSION['email']=$email;

            $waktu = time() + 600;
            setcookie('LastCame', date("G:i:s - m/d/Y"), $waktu);
        } else {
            echo '<script>window.alert("tidak dapat memuat sesi dan cookie")</script>';
            echo '<script>window.location = "daftar.php";</script>';
        }
        echo '<script>window.location = "booking.php";</script>';
    } else {
        echo '<script>window.alert("Data gagal disimpan")</script>';
    }

    // $fileNama = $namaProdukDir . str_replace(' ', '_', $name) . ".txt";
    // $openFileNama = fopen($fileNama, 'w') or die("File tidak bisa dibuka!");
    // fputs($openFileNama, $name);
    // fclose(($openFileNama));
}
?>