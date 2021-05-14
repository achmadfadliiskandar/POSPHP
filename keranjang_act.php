<?php
// session_start();
include 'koneksi.php';
include 'authcheckkasir.php';

function writeMsg() {
header("Location:kasir.php");
// cek debugging
// var_dump("no sistem");
}
writeMsg();

if (isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];
    //$qty = $_POST['qty'];
    $qty =   1;
    
    $data = mysqli_query($connect,"SELECT * FROM barang WHERE id_barang='$id_barang'");
    $b = mysqli_fetch_assoc($data);

    // berfungsi untuk mencari array column
    $key_id = array_search($b['id_barang'],array_column($_SESSION['cart'],'id'));

    // berfungsi untuk mencari ketika array yg bersangkutan di input/klik menjadi 2
    if ($key_id !== false) {
    $cekqty = $_SESSION['cart'][$key_id]['qty'];
    $_SESSION['cart'][$key_id]['qty'] = $cekqty + 1;
    }

    // output barangnya
    else {
    $barang = [
    'id'=>$b['id_barang'],
    'nama'=>$b['nama'],
    'harga'=>$b['harga'],
    'qty'=> $qty,
    ];
    $_SESSION['cart'][]= $barang;
    // krsort berfungsi untuk mengurutkan jadi yang baru di atas
    // // krsort($_SESSION['cart']);
    }
    // $barang = [
    // 'id'=>$b['id_barang'],
    // 'nama'=>$b['nama'],
    // 'harga'=>$b['harga'],
    // 'qty'=> 1,
    // ];
    // $_SESSION['cart'][]= $barang;
    
    header("Location:kasir.php");
    }
?>