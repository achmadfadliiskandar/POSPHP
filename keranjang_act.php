<?php
// session_start();
include 'koneksi.php';
include 'authcheckkasir.php';

error_reporting(0);

echo "lupa baca cara penggunaanya ya ? silahkan back to kasir";
echo "<a href='kasir.php'>back to kasir</a>";

if (isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];
    // $qty = $_POST['qty'];
    $qty =   1;
    
    $data = mysqli_query($connect,"SELECT * FROM barang WHERE id_barang='$id_barang'");
    $b = mysqli_fetch_assoc($data);

    $key_id = array_search($b['id_barang'],array_column($_SESSION['cart'],'id'));

    if ($key_id !== false) {
        $cekqty = $_SESSION['cart'][$key_id]['qty'];
        $_SESSION['cart'][$key_id]['qty'] = $cekqty + 1;
    }
    else {
    $barang = [
    'id'=>$b['id_barang'],
    'nama'=>$b['nama'],
    'harga'=>$b['harga'],
    'qty'=> $qty,
    ];
    $_SESSION['cart'][]= $barang;
    // krsort($_SESSION['cart']);
    }
        header("Location:kasir.php");
    }
?>