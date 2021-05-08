<?php
session_start();
if ($_SESSION['userid']) {
    if ($_SESSION['role_id']==2) {
        header("Location:kasir.php");
    }
}else {
    $_SESSION['error'] = "anda harus login terlebih dahulu";
    header("Location:login.php");
}
?>