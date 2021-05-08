<?php
include 'koneksi.php';
// session_start();
include 'authcheckkasir.php';

$id_trx = $_GET['idtrx'];

$data = mysqli_query($connect,"SELECT * FROM transaksi WHERE id_transaksi = '$id_trx'");
$trx = mysqli_fetch_assoc($data);

$detail = mysqli_query($connect,"SELECT transaksi_detail.*, barang.nama FROM `transaksi_detail` INNER JOIN barang ON transaksi_detail.id_barang=barang.id_barang WHERE transaksi_detail.id_transaksi='$id_trx'");
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
    <h1 class="text-center">Starbhak Mart</h1>
    <div class="container">
    <h2>Nama Kasir : <?=$trx['nama']?></h2>
    <p>Waktu Pembayaran :  <?=$trx['tanggal_waktu']?></p>
    
    <div class="col-md-8">
    <h4>Barang yang di beli</h4>
    <?php while ($row = mysqli_fetch_array($detail)) {?>
    <p> Nama Produk : <?=$row['nama']?> Harga Produk : <?=$row['harga']?> Jml beli : <?=$row['qty']?> = <?=number_format($row['qty']*$row['harga'])?></p>
    <?php } ?>
    </div>
    </div>
    </div>

    <div class="col-sm-12">
    <div class="container">
   <div class="alert alert-danger"> bayar : <?=number_format($trx['bayar'])?> - total : <?=number_format($trx['total'])?></div>
   <div class="alert alert-success">    kembalian : <?=number_format($trx['kembali'])?></div>
    </div>
    </div>

    <div class="col-lg-12">
    <div class="container">
    <a href="/posphp/kasir.php" class="btn btn-dark">Back</a>
    <button onclick="prints()" class="btn btn-primary">Print</button>
    </div>
    </div>

    <script>
    function prints(){
        window.print();
    }
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
</body>
</html>