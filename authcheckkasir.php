<?php
session_start();
// auth checkkasir
if ($_SESSION['userid']) {
    if ($_SESSION['role_id']==1) {
        header("Location:index.php");
    }
}else {
    $_SESSION['error'] = "anda harus login terlebih dahulu";
    header("Location:login.php");
}
// end check
?>