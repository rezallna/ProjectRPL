<?php
   require ('koneksi.php');
   session_start();
   $waktu = time() + 600;
   setcookie('LastCame', date("G:i:s - m/d/Y"), $waktu);
   //require('Login_cek.php');
   echo "selamat anda berhasil masuk halaman admin<br>";
   echo "waktu cookie anda :".$_COOKIE['LastCame']."<br>";
   echo "session anda :".$_SESSION['email']."<br>";
   $email = $_SESSION['email'];
   $data = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE email='$email'");
   if (mysqli_num_rows($data)==1)
   {
      while ($hasil = mysqli_fetch_array($data)) {
         echo $hasil['id_admin'];
      }
   } else {
      echo "<script>window.alert('gagal mengambil id');</script>";
   }
?>