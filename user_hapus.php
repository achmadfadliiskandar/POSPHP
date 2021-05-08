<?php
include 'koneksi.php';
include 'authcheck.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    mysqli_query($connect,"DELETE FROM user WHERE id_user='$id'");

    $_SESSION['success'] = "user sudah di hapus";

    header("Location:user.php");
}
?>
