<?php
    $email_adm = $_SESSION['email'];
    $data_adm = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE email='$email_adm'");
    if (mysqli_num_rows($data_adm)==0)
    {
        echo "<script>window.alert('Anda bukan admin');</script>";
        echo '<script>window.location = "login.php";</script>';
    }
?>