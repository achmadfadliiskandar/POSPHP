<?php
include 'koneksi.php';
include 'authcheck.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    mysqli_query($connect,"DELETE FROM barang WHERE id_barang='$id'");

    header("Location:barang.php");
}
session_start();
$_SESSION['success'] = "barang berhasil di hapus";
?>