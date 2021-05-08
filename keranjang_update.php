<?php
include 'koneksi.php';
session_start();
include 'authcheckkasir.php';

$qty = $_POST['qty'];

foreach ($_SESSION['cart'] as $key => $value) {
    $_SESSION['cart'][$key]['qty'] = $qty[$key];
}
header("Location:kasir.php");
?>