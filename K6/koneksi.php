<?php
$koneksi = mysqli_connect("localhost","root","","inap_insan");
//Check conncetion
if (mysqli_connect_errno()){
        echo "Koneksi gagal";
}
?>