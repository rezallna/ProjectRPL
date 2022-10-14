<?php
require ('koneksi.php');
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $data = mysqli_query($koneksi,"SELECT * FROM users WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($data)==1)
    {
        $_SESSION['email']=$email;
        $waktu = time() + 600;
        setcookie('LastCame', date("G:i:s - m/d/Y"), $waktu);
        echo '<script>window.location = "booking.php";</script>';
    } else {
        $data = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE email='$email' AND password='$password'");
        if (mysqli_num_rows($data)==1)
        {
        $_SESSION['email']=$email;
        $waktu = time() + 600;
        setcookie('LastCame', date("G:i:s - m/d/Y"), $waktu);
        echo '<script>window.location = "admin_info.php";</script>';
        } else
        {
            echo '<script>window.alert("Kami tidak dapat menemukan akun anda")</script>';
            echo '<script>window.location = "login.php";</script>';
        }
    }
    // $fileNama = $namaProdukDir . str_replace(' ', '_', $name) . ".txt";
    // $openFileNama = fopen($fileNama, 'w') or die("File tidak bisa dibuka!");
    // fputs($openFileNama, $name);
    // fclose(($openFileNama));
}
?>