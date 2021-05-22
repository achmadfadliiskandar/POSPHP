<?php
// session_start();
include 'koneksi.php';
include 'authcheckkasir.php';

$barang  =  mysqli_query($connect,"SELECT * FROM barang");

$sum = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        // kondisi if dan else 
        // yang if = di bawah 200 RB yang else diatas 200 RB
        if ($sum < 200000) {
            $sum += ((int)$value['harga'] * (int)$value['qty']);
        }else {
            $sum += ((int)$value['harga'] * (int)$value['qty']) - 50000 + 10000 ;
        }
    }
}
$ts = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $ts += ((int)$value['harga'] * (int)$value['qty']);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Kasir Starbhak Mart</title>
</head>
<body>
<div class="container">
<h1 class="text-center">Halaman Kasir Starbhak Mart</h1>
<h1>Kasir</h1>
<h2><?=$_SESSION['nama']?></h2>
<a href="keranjang_reset.php" class="btn btn-success">Reset Keranjang</a>
<a href="logout.php" class="btn btn-danger">Log Out</a>
<button class="btn btn-info" onclick="functionjs()">Cara Penggunaan</button>
<script>
function functionjs() {
    alert("silahkan klik reset keranjang terlebih dahulu untuk permulaan terima kasih");
}
</script>
<hr>
<div class="row">
<div class="col-md-7">
<div class="row">
    <?php
    while ($row = $barang->fetch_array()) {?>
    <div class="col-md-4 mt-2 mb-2">
    <div class="card" style="width: 100%;">
    <img src="<?= $row['gambar']?>" class="img-top" alt="">
    <div class="card-body">
    <p>Nama Barang : <?= $row['nama']?></p>
    <p>Harga Barang : <?= $row['harga']?></p>
    <p>Stok Barang : <?= $row['stok']?></p>
    <form action="keranjang_act.php" method="POST">
    <div class="input-group">
    <select name="id_barang" class="form-control" style="display:none;">
    <option value="<?=$row['id_barang']?>"><?=$row['nama']?></option>
    </select>
    <!-- <input type="number" name="qty" class="form-control" id=""> -->
    <!-- <span class="input-group-btn">
    <button class="btn btn-primary" type="submit">Tambah</button>
    </span> -->
    <button class="btn btn-primary w-100" type="submit">Tambah</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    <?php } ?>
</div>
</div>
<div class="col-md-5">
<form action="keranjang_update.php" method="post">
<table class="table table-bordered border-primary mt-3">
<tr>
<th>Nama</th>
<th>Harga</th>
<th>Qty</th>
<th>Total semua</th>
<th>Aksi</th>
</tr>
<?php if (isset($_SESSION['cart'])): ?>
<?php foreach ($_SESSION['cart'] as $key => $value) {?>
<tr>
<td><?=$value['nama']?></td>
<td><?=number_format($value['harga'])?></td>
<td><input type="number" name="qty[]" id="" class="form-control" value="<?=$value['qty']?>"></td>
<td><?=number_format((int)$value['qty']*(int)$value['harga'])?></td>
<td><a href="keranjang_hapus.php?id=<?=$value['id']?>" class="btn btn-danger">Hapus</a></td>
</tr>
<?php } ?>
<?php endif; ?>
</table>
<button type="submit" class="btn btn-success">Update</button>
</form>

<h3>Total Belanja Rp : <?=number_format($sum)?></h3>
<p>Harga Sebenarnya  : <?=number_format($ts)?></p>
<span>jika pembelanjaan customer
sampai 200 Rb maka customer tsb mendapatkan DISKON dadakan/kejutan(jika beruntung) sebesar 50 RB dan + PPN 10 RB  sekian terima kasih</span>
<form action="transaksi_act.php" method="post">
<input type="hidden" name="total" value="<?=$sum?>">
<div class="form-group mt-2">
<label for="bayar">Bayar</label>
<input type="text" id="bayar" name="bayar" class="form-control" min="<?php number_format($sum)?>">
</div>
<button class="btn btn-primary my-3 w-100">Bayar Sekarang</button>
</form>
</div>
</div>
</div>

<!-- js untuk membuat format rupiah -->
<script type="text/javascript">
var bayar = document.getElementById('bayar');
bayar.addEventListener('keyup', function (e) {
bayar.value = formatRupiah(this.value, 'Rp. ');
});
function formatRupiah(angka, prefix) {
var number_string = angka.replace(/[^,\d]/g, '').toString(),
split = number_string.split(','),
sisa = split[0].length % 3,
rupiah = split[0].substr(0, sisa),
ribuan = split[0].substr(sisa).match(/\d{3}/gi);
if (ribuan) {
separator = sisa ? '.' : '';
rupiah += separator + ribuan.join('.');
}
rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
function cleanRupiah(rupiah) {
var clean = rupiah.replace(/\D/g, '');
return clean;
}
</script>
<!-- end js untuk menjadi format rupiah -->
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