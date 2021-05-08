<?php 
include 'koneksi.php';
session_start();
include "authcheckkasir.php";
$id = $_GET['id'];
$cart = $_SESSION['cart'];
$k = array_filter($cart,function ($var) use ($id){
	return ($var['id']==$id);
});
print_r($k);
foreach ($k as $key => $value) {
	unset($_SESSION['cart'][$key]);
}
$_SESSION['cart'] = array_values($_SESSION['cart']);
header('location:kasir.php');
?>