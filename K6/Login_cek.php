<?php
If (!isset($_SESSION['email']))
{
    echo '<script>window.location = "login.php";</script>';
    exit;
} else if (!isset($_COOKIE['LastCame'])) {
    unset($_SESSION['email']);
    echo '<script>window.location = "login.php";</script>';
    exit;
}
?>