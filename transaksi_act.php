<?php
include 'koneksi.php';
session_start();
include 'authcheckkasir.php';

$bayar = preg_replace('/\D/','', $_POST['bayar']);

$tanggal_waktu = date('Y-m-d H:i:s');
$nomor = rand(111111,999999);
$total = $_POST['total'];
$nama = $_SESSION['nama'];
$kembali = (int)$bayar - (int)$total;

mysqli_query($connect,"INSERT INTO transaksi (id_transaksi,tanggal_waktu,nomor,total,nama,bayar,kembali) VALUES (NULL,'$tanggal_waktu','$nomor','$total','$nama','$bayar','$kembali')");

$id_transaksi = mysqli_insert_id($connect);

foreach ($_SESSION['cart'] as $key => $value) {
$id_barang = $value['id'];
$harga = $value['harga'];
$qty = $value['qty'];
$tot = $harga*$qty;

mysqli_query($connect,"INSERT INTO transaksi_detail (id_transaksi_detail,id_transaksi,id_barang,harga,qty,total) VALUES (NULL,'$id_transaksi','$id_barang','$harga','$qty','$tot')");
}

$_SESSION['cart'] = [];

header("Location:transaksi_selesai.php?idtrx=".$id_transaksi);
?>