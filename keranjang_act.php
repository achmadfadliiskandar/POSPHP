<?php
// session_start();
include 'koneksi.php';
include 'authcheckkasir.php';

if (isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];
    $qty = $_POST['qty'];
    
    $data = mysqli_query($connect,"SELECT * FROM barang WHERE id_barang='$id_barang'");
    $b = mysqli_fetch_assoc($data);

    $barang = [
        'id'=>$b['id_barang'],
        'nama'=>$b['nama'],
        'harga'=>$b['harga'],
        'qty'=>1
    ];
    $_SESSION['cart'][]=$barang;
    krsort($_SESSION['cart']);

    header("Location:kasir.php");
}
?>