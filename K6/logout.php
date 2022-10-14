<?php
    session_start();
    unset($_SESSION['email']);
    unset($_COOKIE['LastCame']);
    echo '<script>window.location = "login.php";</script>';
    exit;
?>
